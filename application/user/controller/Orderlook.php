<?php
namespace app\user\controller;
use think\Controller;
use think\Validate;
use app\user\model\User;
use app\user\model\UserAuth;

class Orderlook extends Controller
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
		if(logged()){
			return $this->loginDo();
		}
		$User = new User;
		if($User->autoLogin()){
			return $this->loginDo();
		}
	}
	
	protected function loginDo(){
		$uid = logged();
		$UserAuth = new UserAuth;
		$token = $UserAuth->createUserAuth($uid);
		check_orderlook_data();
		$url = jump_url()?jump_url():url('account/index');
		jump_url(null);
		if(!empty(session('callback_token'))){
			if(strpos($url, '?')!==false){
				$url = $url . '&token=' . $token;
			}else{
				$url = $url . '?&token=' . $token;
			}
		}
		return success(lang('login_success'), $url);
	}
	
	//:: check email
	public function checkEmail()
	{
		$data = input();
		
		$rule = [
			'email'  => 'require|email',
			//'captcha' => 'require|captcha',
		];
		$msg = [
			'email.require' => lang('email_required'),
			'email.email' => lang('email_error'),
			//'captcha.require' => lang('captcha_required'),
			//'captcha.captcha' => lang('captcha_error'),
		];
		
		$err = validate_error($rule, $msg, $data);
		if($err){
			return error($err, null, ['error'=>$err, 'post'=>$data]);
		}
		
		$User = new User;
		$res = $User->where(['email'=>$data['email']])->find();
		$register = 0;
		if(!empty($res)){
			$register = 1;
		}
		return success('', null, ['register'=>$register]);
	}
	
	public function login(){
		$this->autoLogin();
		
		$get_data = request()->get();
		if(!empty($get_data['redirect'])){
			jump_url($get_data['redirect']);
			session('callback_token', 1);
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
				return $this->loginDo();
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
		
		$this->assign(['meta_title'=>lang('login_or_register'), 'meta_description'=>lang('login_or_register'), 'meta_keywords'=>lang('login_or_register')]);
		return view('login');
	}
	
	public function fbLogin(){
		
		if(request()->isPost()){
			
			$fb = new \Facebook\Facebook([
				'app_id' => FB_APP_ID,
				'app_secret' => FB_APP_SECRET,
				'default_graph_version' => 'v2.2',
			]);
			
			$helper = $fb->getJavaScriptHelper();
			
			try {
				$accessToken = $helper->getAccessToken();
			  
				if (isset($accessToken)) {
					
					try {
						// Returns a `Facebook\FacebookResponse` object
						$response = $fb->get('/me', $accessToken);
					} catch( \Facebook\Exceptions\FacebookResponseException $e) {
						echo 'Graph returned an error: ' . $e->getMessage(); exit;
					} catch( \Facebook\Exceptions\FacebookSDKException $e) {
						echo 'Facebook SDK returned an error: ' . $e->getMessage(); exit;
					}
					
					$user = $response->getGraphUser();
					$user_arr = json_decode($user,true);
					
					if(!empty($user_arr)){
						$user_arr['fb_id'] = $user_arr['id'];
						unset($user_arr['id']);
						
						$User = new User;
						$res = $User->getFbUser($user_arr['fb_id']);
						
						$need_set_info = 0;
						if(empty($res)){
							$user_arr['mobile'] = isset($user_arr['mobile'])?$user_arr['mobile']:'';
							$user_arr['phone'] = isset($user_arr['phone'])?$user_arr['phone']:'';
							$user_arr['mobile'] = $user_arr['mobile']?$user_arr['mobile']:$user_arr['phone'];
							$user_fb_id = $User->setFbUser($user_arr);
							$need_set_info = 1;
							session('user_fb_id', $user_fb_id);
						}else if(empty($res['uid'])){
							$need_set_info = 1;
							session('user_fb_id', $res['id']);
						}
						
						if($need_set_info){
							$first_name = isset($user_arr['first_name'])?$user_arr['first_name']:'';
							$last_name = isset($user_arr['last_name'])?$user_arr['last_name']:'';
							$email = isset($user_arr['email'])?$user_arr['email']:'';
							$fb_data = [
								'username'=>$first_name . $last_name,
								'email'=>$email
							];
							return error(lang('need_set_info'), null, ['fb_data'=>$fb_data]);
						}
						
						$User->login($res['uid'], '', 4);
						return $this->loginDo();
					}else{
						echo 'error_token_false'; exit;
					}
					
				}else{
					echo 'error_token_false'; exit;
				}
				
			} catch( \Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				echo 'Graph returned an error: ' . $e->getMessage(); exit;
			} catch( \Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				echo 'Facebook SDK returned an error: ' . $e->getMessage(); exit;
			}
		
		}
		
		$this->redirect('login');
	}
	
	public function fbRegister()
	{
		$this->autoLogin();
		if(request()->isPost()){
			$user_fb_id = session('user_fb_id');
			if(empty($user_fb_id)){
				return error(lang('type_error'));
			}
			
			$data = request()->post(); 
			$rule = [
				'username'  => 'require|max:' . $this->usernameLength,
				'email' => 'require|email',
			];
			$msg = [
				'username.require' => lang('username_required'),
				'username.max' => lang('username_max_error', [$this->usernameLength]),
				'email.require'=> lang('email_required'),
				'email.email'=> lang('email_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$data['password'] = md5(uniqid());
			$User = new User;
			//register FB user 
			$res = $User->register($data);
			
			if($res > 0){
				//set FB uid
				$User->setFbUserUid($user_fb_id, $res);
				session('user_fb_id', null);
				session('send_register_email', 1);
				return $this->loginDo();
			}else{
				 switch ($res) {
                    case -1:
                        $err['username'] = lang('username_required');
                        break;
                    case -2:
                        $err['username'] = lang('username_max_error', [$this->usernameLength]);
                        break;
					case -3:
                        $err['username'] = lang('username_has_reigster');
                        break;
					case -4:
                        $err['email'] = lang('email_required');
                        break;
					case -5:
                        $err['email'] = lang('email_error');
                        break;
					case -6:
                        $err['email'] = lang('email_has_register');
                        break;
					case -7:
                        $err['password'] = lang('password_required');
                        break;
                    default:
                        $err[] = lang('type_error');
                        break;
                }
                return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
		$this->redirect('login');
	}
	
	public function register(){
		$this->autoLogin();
		if(request()->isPost()){
			$data = request()->post(); 
			$rule = [
				'username'  => 'require|max:' . $this->usernameLength,
				'email' => 'require|email',
				'password' => 'require',
				'captcha' => 'require|captcha',
			];
			$msg = [
				'username.require' => lang('username_required'),
				'username.max' => lang('username_max_error', [$this->usernameLength]),
				'email.require'=> lang('email_required'),
				'email.email'=> lang('email_error'),
				'password.require' => lang('password_required'),
				'captcha.require' => lang('captcha_required'),
				'captcha.captcha' => lang('captcha_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$User = new User;
			$res = $User->register($data);
			
			if($res > 0){
				session('send_register_email', 1);
				return $this->loginDo();
			}else{
				 switch ($res) {
                    case -1:
                        $err['username'] = lang('username_required');
                        break;
                    case -2:
                        $err['username'] = lang('username_max_error', [$this->usernameLength]);
                        break;
					case -3:
                        $err['username'] = lang('username_has_reigster');
                        break;
					case -4:
                        $err['email'] = lang('email_required');
                        break;
					case -5:
                        $err['email'] = lang('email_error');
                        break;
					case -6:
                        $err['email'] = lang('email_has_register');
                        break;
					case -7:
                        $err['password'] = lang('password_required');
                        break;
                    default:
                        $err[] = lang('type_error');
                        break;
                }
                return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
		$this->redirect('login');
	}
	
	public function registerEmail()
	{
		if(!empty(session('send_register_email'))){
			session('send_register_email', null);
			$content = '<div style="width:640px; margin-left:auto;margin-right:auto;text-align:center;"> <img style="width:120px;height:120px;" src="' . SERVER_URL . INPUT_PATH . '/static/image/log.png"/> <br>' . lang('register_send_email_content');
			
			$User = new User;
			$user_data = $User->getUserProfile(logged());
			send_mail($user_data['email'], lang('register_send_email_title'), $content);
		}
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
