<?php
namespace app\user\model;

class UserAuth extends Model
{
	protected $name = 'user_auth';
	
	//token expire 有效時長 3600 * 3
	protected $tokenExpire = 7200;
	
	public function createUserAuth($uid)
	{
		if(!empty($uid)){
			$this::where(['uid'=>$uid])->delete();
			$token = build_token();
			$this::allowField(true)->save(['uid'=>$uid, 'token'=>$token, 'time'=>time()]);
			return $token;
		}
		return false;
	}
	
	public function getUserAuth($uid)
	{
		$data = $this::where(['uid'=>$uid])->find();
		if(!empty($data) && time()-$data['time']<$this->tokenExpire){
			return $data['token'];
		}
		
		return $this->createUserAuth($uid);
	}
	
	public function checkUserAuth($token)
	{
		if(!empty($token)){
			$data = $this::where(['token'=>$token])->find();
			if(!empty($data) && time()-$data['time']<$this->tokenExpire){
				return $data['uid'];
			}
		}
		return false;
	}
	
}