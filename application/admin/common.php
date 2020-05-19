<?php
/*
 * module common function
**/
use think\Config;
use think\Cookie;
use think\Request;
use think\View;
use app\admin\model\User;
use app\admin\model\admin\Admin;

Cookie::prefix(Config::get('cookie.prefix'));

define('MODULE_NAME', Request::instance()->module());

//默認語言
$default_lang = Config::get('default_lang');
$cookie_lang = Cookie::get('think_var');
if(isset($_GET['language'])){
	$lang_list = Config::get('lang_list');
	$lang = in_array($_GET['language'], $lang_list)?$_GET['language']:$default_lang;
	Cookie::set('think_var', $lang);
}else{
	if(empty($cookie_lang)){
		$lang = $default_lang;
		Cookie::set('think_var', $lang);
	}else{
		$lang = $cookie_lang;
	}
}
think\Lang::load(__DIR__ . DS . 'lang' . DS . $lang . '.php'); 

function is_logged(){
	if(!not_redirect_url(url())){
		session('eg_redirect_url', url());
	}
	$uid = session('eg_user_logged')?session('eg_user_logged'):0;
	if($uid && session('eg_user_token') != cache('eg_user_token_'.$uid)){
		//其他地方登入
		$User = new User;
		$User->logout();
		return success(lang('login_timeout_or_login_other_device'), url(MODULE_NAME . '/auth/login'));
	}
	return $uid;
}

function redirect_url($url = ''){
	if($url === null){
		session('eg_redirect_url', null);
		return '';
	}
	if(!empty($url) && !not_redirect_url(url())){
		session('eg_redirect_url', $url);
	}
	return empty(session('eg_redirect_url'))?'':(session('eg_redirect_url')!=url(MODULE_NAME . '/auth/login')?session('eg_redirect_url'):'');
}

function not_redirect_url($url){
	$not_jump_url_arr = [url(MODULE_NAME . '/auth/login'), url(MODULE_NAME . '/auth/recovery'), url(MODULE_NAME . '/auth/passwordreset'), url('user/auth/login'), url('user/auth/register'), url('user/auth/fblogin'), url('user/auth/recovery'), url('user/auth/passwordreset')];
	
	if(in_array($url, $not_jump_url_arr) || strpos($url, '/user/account/')!==false){
		return true;
	}else{
		return false;
	}
}

function check_permission($uid){
	
	if($uid==1){
		return true;
	}else{
		$request = Request::instance();
		$c = $request->controller();
		$Admin = new Admin;
		$g = $Admin->getAdminPermission($uid);
		
		if(empty($g)){
			$User = new User;
			$User->logout();
			return error(lang('no_permission'), url(MODULE_NAME . '/auth/login'));
		}
		
		$ignore = config('permission_ignore');
		$ignore = json_decode( strtolower( json_encode($ignore) ) );
		
		$c = strtolower($c);
		if(in_array($c, $g) || in_array($c, $ignore)){
			return true;
		}
		
		$url = null;
		if(isset($_SERVER['HTTP_REFERER'])){
			$h_url = strtolower( str_replace(SERVER_URL, '', $_SERVER['HTTP_REFERER']) );
			$h_m = str_replace(INPUT_PATH . '/' . MODULE_NAME . '/', '', $h_url);
			$h_c = explode('/', $h_m)[0];
			
			if($h_c== 'auth' || !in_array($h_c, $g)){
				$url = url(MODULE_NAME . '/' . $g[0] . '/index');
			}
			
		}else{
			$url = url(MODULE_NAME . '/' . $g[0] . '/index');
		}
		
		return error(lang('no_permission'), $url);
	}
	
}

function get_menu(){
	$menu_data = [];
	$view = new View();
	$view->assign('data', $menu_data);
	$html = $view->fetch(MODULE_NAME . '@base/menu');
	return $html;
}