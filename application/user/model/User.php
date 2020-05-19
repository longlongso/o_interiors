<?php
namespace app\user\model;
use think\Db;
//register action has checked database space

class User extends Model
{
	//表（要寫全前綴）
	//protected $table = 'luc_user';
	//表名（不用加前綴）
	protected $name = 'user';
	//自動完成字段
	protected $auto = ['password'];
	
	//token expire 有效時長 3600 * 24 * 7
	protected $tokenExpire = 604800;
	//用戶名長度
	protected $usernameLength = 16;
	
	//自動完成 password 字段設置
	protected function setPasswordAttr($value)
    {
        return password_md5($value);
    }
	
	protected function passwordResetModel()
	{
		return Db::name('user_password_reset');
	}
	
	protected function tokenModel()
	{
		return Db::name('user_token');
	}
	
	protected function profileModel()
	{
		return Db::name('user_profile');
	}
	
	protected function fbModel()
	{
		return Db::name('user_fb');
	}
	
	public function login($username='', $password='', $type = 1, $remember = 0)
	{
		$map = array();
        switch ($type) {
            case 1:
                $map['username'] = $username;
                break;
            case 2:
                $map['email'] = $username;
                break;
            case 3:
                $map['mobile'] = $username;
                break;
            case 4:
                $map['id'] = $username;
                break;
            default:
                return 0; //$type 参数错误
        }
		
		$user = $this::get($map);
		if(!empty($user) && $user['status']){
			if($this->setPasswordAttr($password) === $user['password'] || isset($map['id'])){
				
				if(empty(cache('user_' . $user['id']))){
					cache('user_' . $user['id'], [
						'username'=>$user['username'], 
						'email'=>$user['email'], 
						//'mobile'=>$user['mobile']
					]);
				}
				
				$this->loginLog($user['id']);
				$this->rememberLogin($user['id'], $remember);
				
				return $user['id'];
			}else{
				return -2;
			}
		}else{
			return -1;
		}
		
	}
	
	protected function loginLog($uid)
	{
		//keep login
		session('user_logged', $uid);
		//write log
		$this::where(['id'=>$uid])->update([
            'last_login_time' => time(),
            'last_login_ip' => get_client_ip(1),
		]);
	}
	
	protected function rememberLogin($uid, $remember = 0, $exrire = 0)
	{
		$data['token'] = build_token();
		session('user_token', $data['token']);
		cache('user_token_'.$uid, $data['token']);
		$data['time'] = time();
		$res = $this->tokenModel()->where('uid',$uid)->find();
		if(!empty($res)){
			$this->tokenModel()->where('uid',$res['uid'])->update($data);
		}else{
			$data['uid'] = $uid;
			$this->tokenModel()->insert($data);
		}
		if($remember){
			cookie('OL_LOGGED_USER',  ol_encrypt($uid . '.' . $data['token'] . '.' . (($exrire?$exrire:$this->tokenExpire) + $data['time'])), $exrire?$exrire:$this->tokenExpire);
		}
	}
	
	public function autoLogin()
	{
		$data = cookie('OL_LOGGED_USER');
		if(!empty($data)){
			$data = explode('.', ol_decrypt($data));
			if($data[2]>time()){
				$res = $this->tokenModel()->where('uid', $data[0])->find();
				if(!empty($res) && $res['token']==$data[1] && $res['time']+$this->tokenExpire > time()){
					//do login
					$this->loginLog($res['uid']);
					$this->rememberLogin($res['uid'], 1, $data[2] - time());
					
					return $res['uid'];
				}else{
					cookie('OL_LOGGED_USER', null);
				}
			}
			
		}
		return 0;
	}
	
	public function logout()
	{
		//clear table token, but cache must has token
		$uid = session('user_logged');
		$this->tokenModel()->where('uid',$uid)->delete();
		//clear session
		session('user_logged', null);
		session('user_token', null);
		session(null);
		//clear cookie
		cookie('OL_LOGGED_USER', null);
		cookie(null);
		return 1;
	}
	
	public function register($data)
	{
		$data['mobile'] = '';
		$data['reg_time'] = time();
		$data['reg_ip'] = get_client_ip(1);
		$data['status'] = 1;
		$rule = [
			'username'  => 'require|unique:' . $this->name . '|max:' . $this->usernameLength,
			'email' => 'require|unique:' . $this->name . '|email',
			'password' => 'require'
		];
		$msg = [
			'username.require' => -1,
			'username.max' => -2,
			'username.unique' => -3,
			'email.require'=> -4,
			'email.email'=> -5,
			'email.unique' => -6,
			'password.require' => -7
		];
		$res = $this::validate($rule, $msg)->allowField(true)->save($data);
		if($res){
			$uid = $this->id;
			if(empty(cache('user_' .$uid))){
				cache('user_' . $uid, [
					'username'=>$data['username'], 
					'email'=>$data['email'], 
					//'mobile'=>$user['mobile']
				]);
			}
			$this->loginLog($uid);
			$this->rememberLogin($uid);
			return $uid;
		}else{
			return $this::getError();
		}
	}
	
	public function getUserProfile($uid)
	{
		if(empty(cache('user_' . $uid))){
			$user = $this::field('id,username,email')->find($uid);
			$user = [
				'username'=>$user['username'], 
				'email'=>$user['email']
			];
			cache('user_' . $uid, $user);
		}else{
			$user = cache('user_' . $uid);
			$user['id'] = $uid;
		}
		
		if(empty(cache('user_profile_' . $uid))){
			$user_profile = $this->profileModel()->field('real_name,gender,mobile,facebook,line,wechat,qq,whatsapp')->where(['uid'=>$uid])->find();
			$user_profile = [
				'real_name'=> isset($user_profile['real_name'])?$user_profile['real_name']:'', 
				'gender'=> isset($user_profile['gender'])?$user_profile['gender']:0,
				'mobile'=> isset($user_profile['mobile'])?$user_profile['mobile']:'',
				
				'facebook'=> isset($user_profile['facebook'])?$user_profile['facebook']:'',
				'line'=> isset($user_profile['line'])?$user_profile['line']:'',
				'wechat'=> isset($user_profile['wechat'])?$user_profile['wechat']:'',
				'qq'=> isset($user_profile['qq'])?$user_profile['qq']:'',
				'whatsapp'=> isset($user_profile['whatsapp'])?$user_profile['whatsapp']:'',
			];
			cache('user_profile_' . $uid, $user_profile);
		}else{
			$user_profile = cache('user_profile_' . $uid);
		}
		
		return array_merge($user, $user_profile);
	}
	
	public function setUserProfile($uid, $data)
	{
		$data['real_name'] = isset($data['real_name'])?$data['real_name']:'';
		$data['gender'] = isset($data['gender'])?$data['gender']:0;
		$data['mobile'] = isset($data['mobile'])?$data['mobile']:'';
		
		$data['facebook'] = isset($data['facebook'])?$data['facebook']:'';
		$data['line'] = isset($data['line'])?$data['line']:'';
		$data['wechat'] = isset($data['wechat'])?$data['wechat']:'';
		$data['qq'] = isset($data['qq'])?$data['qq']:'';
		$data['whatsapp'] = isset($data['whatsapp'])?$data['whatsapp']:'';
		
		$data['email'] = isset($data['email'])?$data['email']:'';
		
		$user_profile = $this->profileModel()->field('uid')->where(['uid'=>$uid])->find();
		if($user_profile){
			$data['update_time'] = time();
			$this->profileModel()->where(['uid'=>$uid])->update($data);
		}else{
			$data['uid'] = $uid;
			$data['create_time'] = time();
			$data['update_time'] = time();
			$this->profileModel()->insert($data);
		}
		$user_profile = $this->profileModel()->field('real_name,gender,mobile,facebook,line,wechat,qq,whatsapp')->where(['uid'=>$uid])->find();
		cache('user_profile_' . $uid, [
			'real_name'=>$user_profile['real_name'], 
			'gender'=>$user_profile['gender'], 
			'mobile'=>$user_profile['mobile'],
			
			'facebook'=>$user_profile['facebook'],
			'line'=>$user_profile['line'],
			'wechat'=>$user_profile['wechat'],
			'qq'=>$user_profile['qq'],
			'whatsapp'=>$user_profile['whatsapp'],
		]);
	}
	
	public function getUserData($map)
	{
		if(!empty($map)){
			if(!is_array($map)){
				$map = ['id'=>$map];
			}
			return $this::field('id,username,email,mobile')->where($map)->find();
		}
		return [];
	}
	
	public function setPasswordResetToken($uid, $data){
		$this->passwordResetModel()->where(['uid'=>$uid])->delete();
		$this->passwordResetModel()->insert($data);
	}
	
	public function getPasswordResetToken($uid)
	{
		return $this->passwordResetModel()->where(['uid'=>$uid])->find();
	}
	
	public function clearPasswordResetToken($uid){
		$this->passwordResetModel()->where(['uid'=>$uid])->delete();
	}
	
	public function passwordReset($uid, $password)
	{
		return $this::where(['id'=>$uid])->update(['password'=>$this->setPasswordAttr($password), 'update_time'=>time()]);
	}
	
	public function modifyPassword($uid, $old_password, $new_password)
	{
		$user = $this::where(['id'=>$uid])->find();
		if(!empty($user) && $user['password']==$this->setPasswordAttr($old_password)){
			$this::where(['id'=>$uid])->update(['password'=>$this->setPasswordAttr($new_password), 'update_time'=>time()]);
			return 1;
		}else{
			return 0;
		}
	}
	
	public function getFbUser($fb_id)
	{
		return $this->fbModel()->where(['fb_id'=>$fb_id])->find();
	}
	
	public function setFbUser($data)
	{
		$fb['fb_id'] = isset($data['fb_id'])?$data['fb_id']:'';
		$fb['first_name'] = isset($data['first_name'])?$data['first_name']:'';
		$fb['last_name'] = isset($data['last_name'])?$data['last_name']:'';
		$fb['name'] = isset($data['name'])?$data['name']:'';
		$fb['gender'] = isset($data['gender'])?$data['gender']:'';
		$fb['birth'] = isset($data['birth'])?$data['birth']:'';
		$fb['email'] = isset($data['email'])?$data['email']:'';
		$fb['mobile'] = isset($data['mobile'])?$data['mobile']:'';
		$fb['link'] = isset($data['link'])?$data['link']:'';
		$fb['locale'] = isset($data['locale'])?$data['locale']:'';
		$fb['timezone'] = isset($data['timezone'])?$data['timezone']:'';
		$fb['create_time'] = time();
		$fb['status'] = 1;
		$fb['uid'] = 0;
		
		$id = $this->fbModel()->insertGetId($fb);
		return $id;
	}
	
	public function setFbUserUid($id, $uid)
	{
		return $this->fbModel()->where(['id'=>$id])->update(['uid'=>$uid]);
	}
	
}