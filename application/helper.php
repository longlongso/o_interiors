<?php
/**
 * helper function 
**/

/**
 * 驗證並返回所有錯誤
 * @param array $rule
 * @param array $msg
 * @param array $data
**/
function validate_error($rule, $msg, $data, $type = 1){
	$validate = new think\Validate($rule, $msg);
	$err = [];
	foreach($data as $k=>$v){
		if(!empty($rule[$k]) && !$validate->check([$k=>$v], [$k=>$rule[$k]])){
			$err[$k] = $validate->getError();
		}
	}
	return ($type!=2)?$err:implode(', ', $err);
}

/**
 * 發送錯誤，並跳轉
 * @param mixed $msg
 * @param string $url
 * @param mixed $data
 * @param integer $wait 跳转等待时间
 * @return void
**/
function error($msg = '', $url = null, $data = '', $wait = 3){
	$code = 0;
	if (is_numeric($msg)) {
		$code = $msg;
		$msg  = '';
	}
	if(is_array($msg)){
		$msg  = implode(',', $msg);
	}
	$result = [
		'code' => $code,
		'msg'  => $msg,
		'data' => $data,
		'url'  => is_null($url) && isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $url,
		'wait' => $wait,
	];

	$isAjax = think\Request::instance()->isAjax();
    $type = $isAjax ? think\Config::get('default_ajax_return') : think\Config::get('default_return_type');
	if ('html' == strtolower($type)) {
		session('error_data', ['msg'=>$msg, 'data'=>$data]);
		$response = new think\response\Redirect($result['url']);
        $response->code(302)->params($data);
	}else{
		$response = think\Response::create($result, $type);
	}
	
	throw new think\exception\HttpResponseException($response);
}
/**
 * get error send data
 * @param integer 1 clear cache, 0 keep
 * @return array
**/
function get_error($c = 0){
	$data = session('error_data')?session('error_data'):[];
	if($c){
		session('error_data', null);
	}
	return $data;
}
function error_clear(){
	session('error_data', null);
}

/**
 * 發送成功並跳轉
 * @access protected
 * @param mixed $msg 提示信息
 * @param string $url 跳转的URL地址
 * @param mixed $data 返回的数据
 * @param integer $wait 跳转等待时间
 * @return array
**/
function success($msg = '', $url = null, $data = '', $wait = 3){
	$code = 1;
	if (is_numeric($msg)) {
		$code = $msg;
		$msg  = '';
	}
	$result = [
		'code' => $code,
		'msg'  => $msg,
		'data' => $data,
		'url'  => is_null($url) && isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $url,
		'wait' => $wait,
	];

	$isAjax = think\Request::instance()->isAjax();
    $type = $isAjax ? think\Config::get('default_ajax_return') : think\Config::get('default_return_type');
	if ('html' == strtolower($type)) {
		session('success_data', ['msg'=>$msg, 'data'=>$data]);
		$response = new think\response\Redirect($result['url']);
        $response->code(302)->params($data);
		throw new think\exception\HttpResponseException($response);
	}else{
		return think\Response::create($result, $type);
	}
}
/**
 * get success send data
 * @param integer 1 clear cache, 0 keep
 * @return array
**/
function get_success($c = 0){
	$data = session('success_data')?session('success_data'):[];
	if($c){
		session('success_data', null);
	}
	return $data;
}
function success_clear(){
	session('success_data', null);
}

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0, $adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}