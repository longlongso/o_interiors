<?php
/**
 * common function 
**/

//setting database table
define('SETTING_TABLE', 'setting');

/**
 * init custom setting 
**/
function init_custom_setting()
{
	think\Cookie::prefix(think\Config::get('cookie.prefix'));
	set_language_load();
}

/**
 * set language load
**/
function set_language_load()
{
	$request = think\Request::instance();
	$m = $request->module();
	//默認語言
	$default_lang = think\Config::get('default_lang');
	$cookie_lang = think\Cookie::get('think_var');
	if(isset($_GET['lang'])){
		$lang_list = think\Config::get('lang_list');
		$lang = in_array($_GET['lang'], $lang_list)?$_GET['lang']:$default_lang;
		think\Cookie::set('think_var', $lang);
	}else{
		if(empty($cookie_lang)){
			$lang = $default_lang;
			think\Cookie::set('think_var', $lang);
		}else{
			$lang = $cookie_lang;
		}
	}
	
	if(is_file( APP_PATH . $m . DS . 'lang' . DS . $lang . '.php' )){
		think\Lang::load(APP_PATH . $m . DS . 'lang' . DS . $lang . '.php');
	}else{
		think\Lang::load(APP_PATH . 'common' . DS . 'lang' . DS . $lang . '.php');
	}
	
}

function get_lang() {
	return think\Cookie::get('think_var');
}


/**
 * Not allowed jump url
**/
function not_jump_url($url){
	$not_jump_url_arr = [url('user/auth/login'), url('user/auth/register'), url('user/auth/fblogin'), url('user/auth/fbRegister'), url('user/auth/recovery'), url('user/auth/passwordreset'), url('user/account/modifypassword')];
	
	if(in_array($url, $not_jump_url_arr) || strpos($url, 'admin/')!==false){
		return true;
	}else{
		return false;
	}
}

/**
 * check login 
 * return $uid
**/
function logged(){
	if(!not_jump_url(url())){
		session('jump_url', url());
	}
	$uid = session('user_logged')?session('user_logged'):0;
	if($uid && session('user_token') != cache('user_token_'.$uid)){
		//其他地方登入
		$User = new app\user\model\User;
		$User->logout();
		return success(lang('login_timeout_or_login_other_device'), url('user/auth/login'));
	}
	return $uid;
}

/**
 * get | set jump url
**/
function jump_url($url = ''){
	if($url === null){
		session('jump_url', null);
		return '';
	}
	if(!empty($url) && !not_jump_url($url)){
		session('jump_url', $url);
		
	}
	
	return empty(session('jump_url'))?'':(session('jump_url')!=url('user/auth/login')?session('jump_url'):'');
}


//密碼加密
function password_md5($str)
{
	$key = defined('AUTH_PW_KEY')?AUTH_PW_KEY:'eg_UserKey';
	return '' === $str ? '' : md5(sha1($str) . $key);
}

function build_token(){
    $chars  = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chars  = str_shuffle($chars);
    return substr($chars, 0, 40);
}

/**
 * 加密函数
 * @param string $txt 需加密的字符串
 * @param string $key 加密密钥，默认读取SECURE_CODE配置
 * @return string 加密后的字符串
 */
function ol_encrypt($txt, $key = null)
{
	if(!empty($key)){
		preg_match_all('/\w/', defined('DATA_AUTH_KEY')?DATA_AUTH_KEY:'eg_DataKey', $sss);
		$str1 = '';
		foreach ($sss[0] as $v) {
			$str1 .= $v;
		}
		$key = $str1;
	}

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
	$nh = rand(0, 64);
	$ch = $chars[$nh];
	$mdKey = md5($key . $ch);
	$mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
	$txt = base64_encode($txt);
	$tmp = '';
	$i = 0;
	$j = 0;
	$k = 0;
	for ($i = 0; $i < strlen($txt); $i++) {
		$k = $k == strlen($mdKey) ? 0 : $k;
		$j = ($nh + strpos($chars, $txt [$i]) + ord($mdKey[$k++])) % 64;
		$tmp .= $chars[$j];
	}
	return $ch . $tmp;
}

/**
 * 解密函数
 * @param string $txt 待解密的字符串
 * @param string $key 解密密钥，默认读取SECURE_CODE配置
 * @return string 解密后的字符串
 */
function ol_decrypt($txt, $key = null)
{
	if(!empty($key)){
		preg_match_all('/\w/', defined('DATA_AUTH_KEY')?DATA_AUTH_KEY:'eg_DataKey', $sss);
		$str1 = '';
		foreach ($sss[0] as $v) {
			$str1 .= $v;
		}
		$key = $str1;
	}
	
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
	$ch = $txt[0];
	$nh = strpos($chars, $ch);
	$mdKey = md5($key . $ch);
	$mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
	$txt = substr($txt, 1);
	$tmp = '';
	$i = 0;
	$j = 0;
	$k = 0;
	for ($i = 0; $i < strlen($txt); $i++) {
		$k = $k == strlen($mdKey) ? 0 : $k;
		$j = strpos($chars, $txt[$i]) - $nh - ord($mdKey[$k++]);
		while ($j < 0) {
			$j += 64;
		}
		$tmp .= $chars[$j];
	}

	return base64_decode($tmp);
}

/**
 * 获取和设置配置参数
 * @param string|array  $name 参数名
 * @param mixed         $value 参数值
 * @param string        $range 作用域
 * @return mixed
 */
function config($name = '', $value = null, $range = '')
{
	if (is_null($value) && is_string($name)) {
		
		if(strpos($name, '.')){
			$name_arr = explode('.', $name);
			$config = think\Db::name(SETTING_TABLE)->where(['key'=>$name_arr[0]])->find();
			if(!empty($config)){
				if($config['serialized']==1){
					$config_value =  json_decode($config['value'], true);
					if(!empty($config_value[$name_arr[1]])){
						return $config_value[$name_arr[1]];
					}
				}
			}
		}else{
			$config = think\Db::name(SETTING_TABLE)->where(['key'=>$name])->find();
			if(!empty($config)){
				if($config['serialized']==1){
					return json_decode($config['value'], true);
				}else{
					return $config['value'];
				}
			}
		}
		
		return think\Config::get($name, $range);
		
	} else {
		return think\Config::set($name, $value, $range);
	}
}

/**
 * 设置配置参数
 * @param string|array  $name 参数名
 * @param mixed         $value 参数值
 * @param string        $range 作用域
 * @return mixed
 */
function config_set($name = '', $value = null, $range = '')
{
	if(!empty($name)){
		$settingModel = think\Db::name(SETTING_TABLE);
		if(is_string($name) ){
			
			$settingModel->where('key',$name)->delete();
			
			if(is_string($value) || is_bool($value)){
				$settingModel->insert(['key'=>$name, 'value'=>$value, 'serialized'=>0]);
			}else if(is_array($value)){
				$settingModel->insert(['key'=>$name, 'value'=>json_encode($value), 'serialized'=>1]);
			}
			
			$config = $settingModel->select();
			foreach($config as $k=>$v){
				if($v['serialized']==1){
					$config[$k] = json_decode($v['value'], true);
				}
			}
			think\Cache::set('config', $config, 0);
			
		}else if(is_array($name)){
			foreach($name as $k=>$v){
				$settingModel->where('key',$k)->delete();
				
				if(is_string($v)){
					$settingModel->insert(['key'=>$k, 'value'=>$v, 'serialized'=>0]);
				}else if(is_array($v)){
					$settingModel->insert(['key'=>$k, 'value'=>json_encode($v), 'serialized'=>1]);
				}
				
				$config = $settingModel->select();
				foreach($config as $k=>$v){
					if($v['serialized']==1){
						$config[$k] = json_decode($v['value'], true);
					}
				}
				think\Cache::set('config', $config, 0);
			}
		}
	}
	
	return think\Config::set($name, $value, $range);
	
}

/**
 * get image by id
**/
function get_image_by_id($id){
	if($id){
		$setting = config('upload');
		if(empty($setting['image']['path'])){
			return error(lang('upload_image_config_error'));
		}
		$imageModel = new app\common\model\Image;
		$res = $imageModel->where('id', $id)->find();
		return empty($res)?'':$setting['image']['path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	return '';
}

/**
 * get image thumbnail by id
**/
function get_thumb_by_id($id, $width = 100, $height = 100){
	if($id){
		$imageModel = new app\common\model\Image;
		$res = $imageModel->where('id', $id)->find();
		if(!empty($res)){
			$thumb_config = config('thumb');
			$setting = config('upload');
			
			$size = in_array($width . '_' . $height, $thumb_config['size'])?$width . '_' . $height:'100_100';
			$thumb_dir = $thumb_config['save_path'] . DS . $size . DS . 'image'. DS . $res['path'];
			$thumb_name = $res['name']; //str_replace('.gif', '.png', $res['name']);
			$thumb_file = $thumb_dir . DS . $thumb_name;
			
			$img_file = $setting['image']['save_path'] . DS . $res['path'] . DS . $res['name'];
			
			if(!is_file($thumb_file) && is_file($img_file)){
				if(!is_dir($thumb_dir)){
					mkdir($thumb_dir, 0777, true);
				}
				if(strpos($res['name'], '.gif')===false){
					$image = \think\Image::open($img_file);
					$image->thumb($width, $height, \think\Image::THUMB_CENTER)->save($thumb_file);
				}else{
					$Image = new \Tools\Image($img_file);
					$Image->thumb($width, $height);
					$Image->save(str_replace('.gif', '', $res['name']), $thumb_dir);
				}
			}
			
			return $thumb_config['path'] . '/' . $size . '/' . 'image'. '/' . $res['path'] . '/' . $thumb_name;
		}
		
	}
	return '';
}

/**
 * get image by path and name
**/
function get_image_by_path_name($path = '', $name = ''){
	$setting = config('upload');
	if(empty($setting['image']['path'])){
		return error(lang('upload_image_config_error'));
	}
	if(!empty($path) && !empty($name)){
		return $setting['image']['path'] . '/' . $path . '/' .$name;
	}else if(!empty($path)){
		return $setting['image']['path'] . '/' . $path;
	}
	return $path . '/' .$name;
}

/**
 * get image local path
**/
function get_image_local_path_by_id($id){
	if($id){
		$setting = config('upload');
		if(empty($setting['image']['path'])){
			return error(lang('upload_image_config_error'));
		}
		$imageModel = new app\common\model\Image;
		$res = $imageModel->where('id', $id)->find();
		return empty($res)?'':$setting['image']['local_path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	return '';
}

/**
 * get video by id
**/
function get_video_by_id($id){
	if($id){
		$setting = config('upload');
		if(empty($setting['video']['path'])){
			return error(lang('upload_video_config_error'));
		}
		$VideoModel = new app\common\model\Video;
		$res = $VideoModel->where('id', $id)->find();
		return empty($res)?'':$setting['video']['path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	return '';
}

/**
 * get video by path and name
**/
function get_video_by_path_name($path = '', $name = ''){
	$setting = config('upload');
	if(empty($setting['video']['path'])){
		return error(lang('upload_video_config_error'));
	}
	if(!empty($path) && !empty($name)){
		return $setting['video']['path'] . '/' . $path . '/' .$name;
	}else if(!empty($path)){
		return $setting['video']['path'] . '/' . $path;
	}
	return $path . '/' .$name;
}

/**
 * get video local path
**/
function get_video_local_path_by_id($id){
	if($id){
		$setting = config('upload');
		if(empty($setting['video']['path'])){
			return error(lang('upload_video_config_error'));
		}
		$VideoModel = new app\common\model\Video;
		$res = $VideoModel->where('id', $id)->find();
		return empty($res)?'':$setting['video']['local_path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	return '';
}

// get dir size
function get_dir_size($dir)
{
	$sizeResult = 0;
	$handle = opendir($dir);
	while (false!==($FolderOrFile = readdir($handle)))
	{
		if($FolderOrFile != "." && $FolderOrFile != "..")
		{
			if(is_dir($dir . DS . $FolderOrFile))
			{
				$sizeResult += get_dir_size($dir . DS . $FolderOrFile);
			}
			else
			{
				$sizeResult += filesize($dir . DS . $FolderOrFile);
			}
		}   
	}
	closedir($handle);
	return $sizeResult;
}

// get Real Size
function get_real_size($size)
{
	$kb = 1024;         // Kilobyte
	$mb = 1024 * $kb;   // Megabyte
	$gb = 1024 * $mb;   // Gigabyte
	$tb = 1024 * $gb;   // Terabyte
   
	if($size < $kb)
	{
		return $size." B";
	}
	else if($size < $mb)
	{
		return round($size/$kb,2)." KB";
	}
	else if($size < $gb)
	{
		return round($size/$mb,2)." MB";
	}
	else if($size < $tb)
	{
		return round($size/$gb,2)." GB";
	}
	else
	{
		return round($size/$tb,2)." TB";
	}
}

function web_disk_space()
{
	if(is_file(ROOT_PATH . 'etc' . DS . 'disk_space')){
		$ds_str = file_get_contents(ROOT_PATH . 'etc' . DS . 'disk_space');
		$ds_arr = explode('*', $ds_str);
		$ds_total = 1;
		foreach($ds_arr as $d){
			$ds_total *= $d;
		}
		return $ds_total;
	}else{
		return 1024*1024*1024*3;
	}
}

function get_web_disk_space(){
	//this OL obj
	return '10 GB';
	
	return get_real_size(web_disk_space());
}

function get_web_disk_space_usage(){
	//this OL obj
	return '3 GB';
	
	check_web_disk_usage();
	return get_real_size(get_dir_size(ROOT_PATH));
}

/**
 * whhen upload file check web disk usage 
**/
function check_web_disk_usage(){
	//this OL obj
	return true;
	
	$dsu = session('disk_space_usage');
	if(!empty($dsu)){
		if(!$dsu['status']){
			return false;
		}else if(time()-$dsu['time']<60){
			return true;
		}
	}
	$total = web_disk_space();
	$usage = get_dir_size(ROOT_PATH);
	if($usage>$total-1024){
		session('disk_space_usage', ['status'=>0, 'time'=>0]);
		return false;
	}
	session('disk_space_usage', ['status'=>1, 'time'=>time()]);
	return true;
}


// mysql database usage
function mysql_db_size()
{        
	$sql = "SHOW TABLE STATUS FROM " . config('database.database');
	$tb_prefix = config('database.prefix');
	if($tb_prefix != null) {
		$sql .= ' LIKE "' . $tb_prefix . '%"';
	}
	$row = think\Db::query($sql);
	$size = 0;
	foreach($row as $value) {
		$size += $value["Data_length"] + $value["Index_length"];
	}
	return $size;
}

function get_mysql_db_space_usage()
{
	//this OL obj
	return '1 MB';
	
	return get_real_size(mysql_db_size());
}

function database_space()
{
	if(is_file(ROOT_PATH . 'etc' . DS . 'database_space')){
		$ds_str = file_get_contents(ROOT_PATH . 'etc' . DS . 'database_space');
		$ds_arr = explode('*', $ds_str);
		$ds_total = 1;
		foreach($ds_arr as $d){
			$ds_total *= $d;
		}
		return $ds_total;
	}else{
		return 1024*1024*1024*0.5;
	}
}

function get_database_space(){
	//this OL obj
	return '5 GB';
	
	return get_real_size(database_space());
}

/**
 * whhen database insert or update check database space usage 
**/
function check_database_space_usage(){
	//this OL obj
	return true;
	
	$dbu = session('database_space_usage');
	if(!empty($dbu)){
		if(!$dbu['status']){
			return false;
		}else if(time()-$dbu['time']<60){
			return true;
		}
	}
	$usage = mysql_db_size();
	$total = database_space();
	if($usage>$total-128){
		session('database_space_usage', ['status'=>0, 'time'=>0]);
		return false;
	}
	session('database_space_usage', ['status'=>1, 'time'=>time()]);
	return true;
}

/**
 * check OL data 
**/
function check_orderlook_data()
{
	$uid = logged();
	if($uid){
		$OL_data = think\Cookie::get('_OL_DATA_');
		$OL_data = json_decode($OL_data, true);
		if(!empty($OL_data['face']['images'])){
			$OrderlookFace = new app\orderlook\model\Face;
			$face_id = $OrderlookFace->createFace($uid);
			foreach($OL_data['face']['images'] as $k=>$img){
				$OrderlookFace->setFaceDetail(['face_id'=>$face_id, 'pic_id'=>$img, 'sort'=>$k]);
			}
		}
		if(!empty($OL_data['clothes']['image'])){
			if($OL_data['clothes']['id'] == 'c'){
				$OrderlookClothes = new app\orderlook\model\Clothes;
				$OrderlookClothes->createClothes($uid, $OL_data['clothes']['image']);
			}else{
				$ClothesSelected = new app\orderlook\model\ClothesSelected;
				$ClothesSelected->setClothesSelected($uid, $OL_data['clothes']['id']);
			}
			
		}
		think\Cookie::delete('_OL_DATA_');
	}
}


/*
 * remove dir 
**/
function deldir($dir) {
  //先删除目录下的文件：
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }
 
  closedir($dh);
  //删除当前文件夹：
  if(rmdir($dir)) {
    return true;
  } else {
    return false;
  }
}

/*
 * page copy rights
**/
function copy_rights()
{
	echo ' © ' . date('Y') . ' ' . config('site_name') . ' All rights reserved. ';
}

function gearman_email_work(){
	if(class_exists('GearmanWorker')){
		$worker = new GearmanWorker();
		$gearman_config = config('gearman');
		if($worker->addServer(empty($gearman_config['ip'])?'127.0.0.1':$gearman_config['ip'], empty($gearman_config['port'])?4730:$gearman_config['port'])){
			$worker->addFunction(empty($gearman_config['email_worker'])?'send_email':$gearman_config['email_worker'], function(GearmanJob $job) {
				$workload = json_decode($job->workload());
				if($workload){
					if(config('email.type')!='smtp'){
						//TODO
					}else{
						smtp_send_mail($workload->to, $workload->subject, $workload->body, $workload->attachment, $workload->from, $workload->send_to_admin);
					}
				}
			});
		}
		while ($worker->work());
	}
	
}

/**
 * @$to mixd 邊個手電郵 t@t.t [t@t.t, 'name']
 * @$subject string
 * @$body string
 * @$attachment string file_path
 * @form mixd 來自電郵 f@f.f [f@f.f, 'name']
**/
function send_mail($to = '', $subject = '', $body = '', $attachment = null, $from = '', $send_to_admin = 0){
	if(class_exists('GearmanClient')){
		$client = new GearmanClient();
		$gearman_config = config('gearman');
		if($client->addServer(empty($gearman_config['ip'])?'127.0.0.1':$gearman_config['ip'], empty($gearman_config['port'])?4730:$gearman_config['port'])){
			$result = $client->doBackground(empty($gearman_config['email_worker'])?'send_email':$gearman_config['email_worker'], json_encode([
				'to'=>$to,
				'subject'=>$subject,
				'body'=>$body,
				'attachment'=>$attachment,
				'from'=>$from,
				'send_to_admin'=>$send_to_admin
			]));
			return 1;
		}
	}
	
	if(config('email.type')!='smtp'){
		//TODO
	}else{
		return smtp_send_mail($to, $subject, $body, $attachment, $from, $send_to_admin);
	}
}
/**
 * @$to mixd 邊個手電郵 t@t.t [t@t.t, 'name']
 * @$subject string
 * @$body string
 * @$attachment string file_path
 * @form mixd 來自電郵 f@f.f [f@f.f, 'name']
**/
function smtp_send_mail($to = '', $subject = '', $body = '', $attachment = null, $from = '', $send_to_admin = 0){
	if(!$to || !$body){
		return false;
	}
	
	$smtp = config('email.smtp');
	
	$smtp_host = config('smtp_host');
	$smtp_port = config('smtp_port');
	$smtp_username = config('smtp_username');
	$smtp_password = config('smtp_password');
	$smtp_reply_to_email = config('smtp_reply_to_email');
	
	$smtp['host'] = $smtp_host?$smtp_host:(empty($smtp['host'])?'':$smtp['host']);
	$smtp['port'] = $smtp_port?$smtp_port:(empty($smtp['port'])?25:$smtp['port']);
	$smtp['username'] = $smtp_username?$smtp_username:(empty($smtp['username'])?'':$smtp['username']);
	$smtp['password'] = $smtp_password?$smtp_password:(empty($smtp['password'])?'':$smtp['password']);
	$smtp['reply_to_email'] = $smtp_reply_to_email?$smtp_reply_to_email:(empty($smtp['reply_to_email'])?$smtp['username']:$smtp['reply_to_email']);
	
	if(empty($smtp['host']) || empty($smtp['username'])){
		return 'ERROR: SMTP CONFIG FALSE';
	}
	
	//require_once VENDOR_PATH . '/phpmailer/phpmailer/PHPMailerAutoload.php';
	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	
	$mail->CharSet = 'utf-8';
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = $smtp['host'];
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = $smtp['port'];
	
	
	if(config('smtp_secure')=='ssl'){
		$mail->SMTPSecure = 'ssl';
	}else if(config('smtp_secure')=='tls'){
		$mail->SMTPSecure = 'tls';
	}
	
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = $smtp['username'];
	//Password to use for SMTP authentication
	$mail->Password = $smtp['password'];
	
	$from_email = $from_name = '';
	if($from){
		if(is_array($from)){
			$from_email = isset($from[0])?$from[0]:$smtp['username'];
			$from_name = isset($from[1])?$from[1]:'';
		}else{
			$from_email = $from;
			$from_name = '';
		}
	}else{
		$from_email = $smtp['username'];
		$from_name = '';
	}
	//Set who the message is to be sent from
	$mail->setFrom($smtp['username'], $from_name);
	
	//Set an alternative reply-to address
	$reply_to_email = ($from_email && $from_email!=$smtp['reply_to_email'])?$from_email:$smtp['reply_to_email'];
	$mail->addReplyTo($reply_to_email, $from_name);
	
	//Set who the message is to be sent to
	$to_email = $to_name = '';
	if(is_array($to)){
		$to_email = isset($to[0])?$to[0]:'';
		$to_name = isset($to[1])?$to[1]:'';
	}else{
		$to_email = $to;
		$to_name = '';
	}
	if(!$to_email){
		return false;
	}
	//check email debug
	if(config('email_debug') || config('email.debug')){
		$to_email = $smtp['username'];
	}
	$mail->addAddress($to_email, $to_name);
	
	//Set the subject line
	$mail->Subject = $subject;
	
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('email.html'), APP_PATH . 'common' . DS . 'view' .DS . 'public' );
	
	$view = new think\View;
	$view->assign(['subject'=>$subject, 'content'=>$body]);
	$html = $view->fetch('common@public/email');
	
	$mail->msgHTML($html);
	
	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	if($attachment){
		if(is_array($attachment)){
			foreach ($attachment as $file) {
				is_file($file) && $mail->AddAttachment($file);
			}
		}else{
			is_file($attachment) && $mail->addAttachment($attachment);
		}
	}
	
	if($send_to_admin){
		$res = $mail->send();
		//alert emails
		$extra_alert_email = explode(',', config('extra_alert_email'));
		if(empty($extra_alert_email)){
			$extra_alert_email = config('email.extra_alert');
		}
		foreach($extra_alert_email as $email){
			//send email to admin
			smtp_send_mail(trim($email), $subject, $body, $attachment, $from, 0);
		}
		return $res;
	}else{
		//send the message, check for errors
		return $mail->send() ? true : $mail->ErrorInfo;
	}
}