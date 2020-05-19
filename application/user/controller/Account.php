<?php
namespace app\user\controller;
use think\Controller;
use think\Validate;
use app\user\model\User;

class Account extends Controller
{
    public function _initialize()
    {
        if(!logged()){
			return error(lang('need_login'), url('auth/login'));
		}
    }
	
	public function index()
	{
		$User = new User;
		$data = $User->getUserProfile(logged());
		
		$err = get_error();
		if(!empty($err)){
			$this->assign('error_msg', isset($err['msg'])?$err['msg']:'');
			error_clear();
		}
		$suc = get_success();
		if(!empty($suc)){
			$this->assign('success_msg', isset($suc['msg'])?$suc['msg']:'');
			if(logged()){
				$this->assign('error_msg', '');
			}
			success_clear();
		}
		$this->assign('data', $data);
		$this->assign(['meta_title'=>lang('user_center'), 'meta_description'=>lang('user_center'), 'meta_keywords'=>lang('user_center')]);
		return view();
	}
	
	public function save()
	{
		if(request()->isPost()){
			$data = request()->post(); 
			$User = new User;
			$User->setUserProfile(logged(), $data);
			return success(lang('save_success'), url('index'));
		}
		$this->redirect('index');
	}
	
	public function modifyPassword()
	{
		
		if(request()->isPost()){
			$data = request()->post(); 
			$rule = [
				'old_password' => 'require',
				'password' => 'require',
				'captcha' => 'require|captcha',
			];
			$msg = [
				'old_password.require' => lang('old_password_required'),
				'password.require' => lang('new_password_required'),
				'captcha.require' => lang('captcha_required'),
				'captcha.captcha' => lang('captcha_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err]);
			}
			
			if($data['old_password']==$data['password']){
				return error(lang('new_password_error'), null, ['error'=>$err]);
			}
			
			$User = new User;
			$uid = logged();
			if($User->modifyPassword($uid, $data['old_password'], $data['password'])){
				
				$content = '<div style="width:640px; margin-left:auto;margin-right:auto;text-align:center;"> <img style="width:120px;height:120px;" src="' . SERVER_URL . INPUT_PATH . '/static/image/log.png"/> <br>' . lang('modify_password_success') . '! <br>' . lang('password_reset_help') .' <a href="' . SERVER_URL . url('auth/recovery') . '">' . lang('click') . '</a> ' .lang('recovery');
				
				$user_data = $User->getUserProfile($uid);
				send_mail($user_data['email'], lang('modify_password_success'), $content);
				
				return success(lang('modify_password_success') . ' <a href="' . url('auth/logout') . '">' . lang('logout_and_relogin') . '</a>', url('modifyPassword'));
			}else{
				return error(lang('old_password_error'));
			}
			
		}
		
		$err = get_error();
		if(!empty($err)){
			$this->assign('error_msg', isset($err['msg'])?$err['msg']:'');
			error_clear();
		}
		$suc = get_success();
		if(!empty($suc)){
			$this->assign('success_msg', isset($suc['msg'])?$suc['msg']:'');
			success_clear();
		}
		$this->assign(['meta_title'=>lang('modify_password'), 'meta_description'=>lang('modify_password'), 'meta_keywords'=>lang('modify_password')]);
		return view('modifypassword');
	}
	
}
