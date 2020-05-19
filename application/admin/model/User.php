<?php
namespace app\admin\model;
use think\Db;

class User extends Model
{
	//表（要寫全前綴）
	//protected $table = 'luc_user';
	//表名（不用加前綴）
	protected $name = 'admin';
	//自動完成字段
	protected $auto = ['password'];
	
	//token expire 有效時長 3600 * 24 * 7
	protected $tokenExpire = 604800;
	//用戶名長度
	public $usernameLength = 16;
	
	//自動完成 password 字段設置
	protected function setPasswordAttr($value)
    {
        return password_md5($value);
    }
	
	protected function passwordResetModel(){
		return Db::name('admin_password_reset');
	}
	
	protected function tokenModel(){
		return Db::name('admin_token');
	}
	
	public function login($username='', $password='', $type = 1, $remember = 0){
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
				
				cache('eg_user_' . $user['id'], [
					'username'=>$user['username'], 
					'email'=>$user['email'], 
					//'mobile'=>$user['mobile'],
					'last_login_time'=>$user['last_login_time'],
					'last_login_ip'=>$user['last_login_ip']						
				]);
				
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
	
	protected function loginLog($uid){
		//keep login
		session('eg_user_logged', $uid);
		//write log
		$this::where(['id'=>$uid])->update([
            'last_login_time' => time(),
            'last_login_ip' => get_client_ip(1),
		]);
	}
	
	protected function rememberLogin($uid, $remember = 0, $exrire = 0){
		$data['token'] = build_token();
		session('eg_user_token', $data['token']);
		cache('eg_user_token_'.$uid, $data['token']);
		$data['time'] = time();
		$res = $this->tokenModel()->where('uid',$uid)->find();
		if(!empty($res)){
			$this->tokenModel()->where('uid',$res['uid'])->update($data);
		}else{
			$data['uid'] = $uid;
			$this->tokenModel()->insert($data);
		}
		if($remember){
			cookie('EG_LOGGED',  ol_encrypt($uid . '.' . $data['token'] . '.' . (($exrire?$exrire:$this->tokenExpire) + $data['time'])), $exrire?$exrire:$this->tokenExpire);
		}
	}
	
	public function autoLogin(){
		$data = cookie('EG_LOGGED');
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
					cookie('EG_LOGGED', null);
				}
			}
			
		}
		return 0;
	}
	
	public function logout(){
		//clear table token, but cache must has token
		$uid = session('eg_user_logged');
		$this->tokenModel()->where('uid',$uid)->delete();
		//clear session
		session('eg_user_logged', null);
		session('eg_user_token', null);
		session(null);
		//clear cookie
		cookie('EG_LOGGED', null);
		cookie(null);
		return 1;
	}
	
	public function register($data){
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
			$this->loginLog($uid);
			$this->rememberLogin($uid);
			return $uid;
		}else{
			return $this::getError();
		}
	}
	
	public function getUserProfile($uid){
		if(empty(cache('eg_user_' . $uid))){
			$user = $this::field('id,username,email')->find($uid);
			$user = [
				'username'=>$user['username'], 
				'email'=>$user['email'],
				'last_login_time'=>$user['last_login_time'],
				'last_login_ip'=>$user['last_login_ip']	
			];
			cache('eg_user_' . $uid, $user);
		}else{
			$user = cache('eg_user_' . $uid);
			$user['id'] = $uid;
		}
		
		return array_merge($user);
	}
	
	public function getUserData($map){
		return $this::field('id,username,email,mobile')->where($map)->find();
	}
	
	public function setPasswordResetToken($uid, $data){
		$this->passwordResetModel()->where(['uid'=>$uid])->delete();
		$this->passwordResetModel()->insert($data);
	}
	
	public function getPasswordResetToken($uid){
		return $this->passwordResetModel()->where(['uid'=>$uid])->find();
	}
	
	public function clearPasswordResetToken($uid){
		$this->passwordResetModel()->where(['uid'=>$uid])->delete();
	}
	
	public function passwordReset($uid, $password){
		return $this::where(['id'=>$uid])->update(['password'=>$this->setPasswordAttr($password), 'update_time'=>time()]);
	}
	
	public function modifyPassword($uid, $old_password, $new_password){
		$user = $this::where(['id'=>$uid])->find();
		if(!empty($user) && $user['password']==$this->setPasswordAttr($old_password)){
			$this::where(['id'=>$uid])->update(['password'=>$this->setPasswordAttr($new_password), 'update_time'=>time()]);
			return 1;
		}else{
			return 0;
		}
	}
	
}