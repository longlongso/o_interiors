<?php
namespace app\admin\controller;
use think\Controller;
use think\Validate;
use app\admin\model\User;

class Auth extends Controller
{
    //用戶名長度
	protected $usernameLength = 16;
	//token expire 有效時長
	protected $tokenExpire = 3600;
	
	//public function _initialize(){}
	
	public function index(){
		$this->redirect('login');
	}
	
	protected function autoLogin(){
		$uid = is_logged();
		if($uid){
			return $this->loginDo($uid);
		}
		$User = new User;
		$uid = $User->autoLogin();
		if($uid){
			return $this->loginDo($uid);
		}
	}
	
	protected function loginDo($uid){
		check_permission($uid);
		$url = redirect_url()?redirect_url():url('index/index');
		redirect_url(null);
		return success(lang('login_success'), $url);
	}
	
	public function login(){
		$this->autoLogin();
		
		$get_data = request()->get();
		if(!empty($get_data['redirect'])){
			redirect_url($get_data['redirect']);
		}
		
		if(request()->isPost()){
			$data = request()->post(); 
			$rule = [
				'username'  => 'require',
				'password' => 'require',
				'captcha' => 'require|captcha',
			];
			$msg = [
				'username.require' => lang('username_or_email_required'),
				'password.require' => lang('password_required'),
				'captcha.require' => lang('captcha_required'),
				'captcha.captcha' => lang('captcha_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$type = 1; //login with : 1 username 2 email 3 mobile 4 id 
			
			$validate = new Validate(['username'  => 'email']);
			if($validate->check(['username'=>$data['username']])){
				$type = 2;
			}
			
			$User = new User;
			$res = $User->login($data['username'], $data['password'], $type, isset($data['remember'])?1:0);
			
			if($res > 0){
				return $this->loginDo($res);
			}else{
				 switch ($res) {
                    case -1:
                        $err['username'] = lang('username_error');
                        break;
                    case -2:
                        $err['password'] = lang('password_error');
                        break;
                    default:
                        $err[] = lang('type_error');
                        break; // 0-介面參數錯誤（調試階段使用）
                }
                return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
		$err = get_error();
		if(!empty($err)){
			$this->assign('error_msg', $err['msg']);
			$this->assign('error', isset($err['data']['error'])?$err['data']['error']:'');
			$this->assign('data', isset($err['data']['post'])?$err['data']['post']:'');
			error_clear();
		}
		$suc = get_success();
		if(!empty($suc)){
			$this->assign('success_msg', isset($suc['msg'])?$suc['msg']:'');
			success_clear();
		}
		
		$this->assign('meta_title', lang('welcome_login'));
		return view('login');
	}
	
	public function recovery(){
		
		if(request()->isPost()){
			$data = request()->post();
			$rule = [
				'username'  => 'require',
				'captcha' => 'require|captcha',
			];
			$msg = [
				'username.require' => lang('username_required'),
				'captcha.require' => lang('captcha_required'),
				'captcha.captcha' => lang('captcha_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			//find password with : 1 username 2 email 3 mobile  
			$validate = new Validate(['username'  => 'email']);
			if($validate->check(['username'=>$data['username']])){
				$map['email'] = $data['username'];
			}else{
				$map['username'] = $data['username'];
			}
			
			$User = new User;
			$res = $User->getUserData($map);
			if(!empty($res['email'])){
				//send token email
				$time = time();
				$token = ol_encrypt($res['id'] . '.' . md5($res['username'] . $res['email']) . '.' . ($this->tokenExpire + $time));
				
				$User->setPasswordResetToken($res['id'], ['uid'=>$res['id'], 'token'=>$token, 'time'=>$time]);
				
				$content = '<div style="width:640px; margin-left:auto;margin-right:auto;text-align:center;"> <img style="width:120px;height:120px;" src="' . SERVER_URL . INPUT_PATH . '/static/image/log.png"/> <br>' . lang('recovery') .' : <a href="' . SERVER_URL . url('passwordReset', ['token'=>$token]) . '">' . lang('click') . '</a>';
				
				send_mail($res['email'], lang('recovery'), $content);
				return success(lang('submit_success') . ', ' . lang('please_check_youe_email'));
			}else{
				$err['username'] = lang('username_error');
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
		
		$err = get_error();
		if(!empty($err)){
			$this->assign('error_msg', $err['msg']);
			$this->assign('error', isset($err['data']['error'])?$err['data']['error']:'');
			$this->assign('data', isset($err['data']['post'])?$err['data']['post']:'');
			error_clear();
		}
		$suc = get_success();
		if(!empty($suc)){
			$this->assign('success_msg', isset($suc['msg'])?$suc['msg']:'');
			success_clear();
		}
		$this->assign(['meta_title'=>lang('recovery'), 'meta_description'=>lang('recovery'), 'meta_keywords'=>lang('recovery')]);
		return view('recovery');
	}
	
	public function passwordReset(){
		$User = new User;
		
		$msg = lang('token_error');
		$check = 0;
		
		if(request()->isPost()){
			$uid = session('pw_reset_uid');
			$data = request()->post();
			if($uid && !empty($data['password'])){
				$User->passwordReset($uid, $data['password']);
				$User->clearPasswordResetToken($uid);
				session('pw_reset_uid', null);
				session('pw_reset_check', null);
				$msg = lang('password_reset_success');
				$check = 2;
			}

		}
		
		$data = request()->param();
		if(!empty($data['token'])){
			$token_data = explode('.', ol_decrypt($data['token']));
			
			$res = $User->getUserData(['id'=>$token_data[0]]);
			if(!empty($res)){
				if(md5($res['username'] . $res['email']) == $token_data[1]){
					$res_data = $User->getPasswordResetToken($res['id']);
					if($res_data['token']==$data['token'] && $res_data['time']+$this->tokenExpire>time()){
						session('pw_reset_check', 1);
						session('pw_reset_uid', $res['id']);
						$check = 1;
					}
				}
			}
			
		}
		
		$this->assign(['msg'=>$msg, 'check'=>$check]);
		$this->assign(['meta_title'=>lang('password_reset'), 'meta_description'=>lang('password_reset'), 'meta_keywords'=>lang('password_reset')]);
		return view('passwordreset');
	}
	
	public function logout(){
		$User = new User;
		$User->logout();
		return success(lang('logout_success'), url('login'));
	}
	
}
