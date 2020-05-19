<?php
namespace app\admin\model;
use think\Db;
// This model have no insert action, so without check database space

class Member extends Model
{
	
	//table name
	protected $name = 'user';
	
	public function profileModel(){
		return Db::name('user_profile');
	}
	
	public function facebookModel(){
		return Db::name('user_fb');
	}
	
	public function getMemberList($limit=9, $order = ['id'], $map = []){
		if($limit=='*'){
			return $this::field('id,username')->where($map)->order('username')->select();
		}else{
			$list = $this::field('id,username,email,last_login_time,last_login_ip,status')->where($map)->order($order)->paginate($limit);
			return ['list'=>$list, 'page'=>$list->render()];
		}
	}
	
	public function getMemberData($id){
		$user = $this::find($id);
		if(!empty($user)){
			$user = $user->toArray();
			unset($user['password']);
		}
		$profile = $this->profileModel()->where(['uid'=>$id])->find();
		$facebook = $this->facebookModel()->where(['uid'=>$id])->find();
		return ['user'=>$user, 'profile'=>$profile, 'facebook'=>$facebook];
	}
	
	public function setMemberStatus($id, $status){
		return $this::where('id', $id)->update(['status'=>$status]);
	}
	
}