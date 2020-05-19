<?php
namespace app\admin\model\admin;
use app\admin\model\Model;
use app\admin\model\admin\AdminGroup;
use app\admin\model\admin\AdminNgroup;

class Admin extends Model
{
	
	//表名（不用加前綴）
	protected $name = 'admin';
	//自動完成字段
	//protected $auto = ['password'];
	protected $insert = ['password'];
	
	//用戶名長度
	public $usernameLength = 16;
	
	//自動完成 password 字段設置
	protected function setPasswordAttr($value)
    {
        return password_md5($value);
    }
	
	public function getUserList($limit=9, $order = ['id']){
		$list = $this::field('id, username, last_login_time, last_login_ip, status')->order($order)->paginate($limit);
		return ['list'=>$list, 'page'=>$list->render()];
	}
	
	public function getUser($id){
		$data = $this::find($id);
		unset($data['password']);
		
		$data['admin_group'] = $this->getAdminNgroup($id);
		
		return $data;
	}
	
	public function setUser($data){
		if(empty($data['id'])){
			unset($data['id']);
			$data['reg_time'] = time();
			$data['reg_ip'] = get_client_ip(1);
		}else{
			$data['update_time'] = time();
		}
		if(empty($data['password'])){
			unset($data['password']);
		}

		$rule = [
			'username'  => 'require|unique:' . $this->name . '|max:' . $this->usernameLength,
			'email' => 'require|unique:' . $this->name . '|email',
			//'password' => 'require'
		];
		$msg = [
			'username.require' => -1,
			'username.max' => -2,
			'username.unique' => -3,
			'email.require'=> -4,
			'email.email'=> -5,
			'email.unique' => -6,
			//'password.require' => -7
		];
		
		if(empty($data['id'])){
			$res = $this::validate($rule, $msg)->allowField(true)->save($data);
		}else{
			$res = $this::validate($rule, $msg)->isUpdate()->allowField(true)->save($data);
		}
        
        if($res){
            $id = $this->id;
            if(isset($data['admin_group'])){
                $this->setAdminNgroup($id, $data['admin_group']);
            }
            return $id;
        }else{
            return $this::getError();
        }
        
		return 0;
	}
	
	public function deleteUser($id){
		return $this::destroy($id);
	}
	
	public function getAdminNgroup($uid){
		$AdminNgroup = new AdminNgroup;
		$g = $AdminNgroup->field('gid')->where(['uid'=>$uid])->select();
        $g = json_decode(json_encode($g), true);
		return empty($g)?[]:array_column($g, 'gid');
	}
	
	public function setAdminNgroup($uid, $gids){
		$AdminNgroup = new AdminNgroup;
		$AdminNgroup->where(['uid'=>$uid])->delete();
		foreach($gids as $gid){
			$AdminNgroup->insert(['uid'=>$uid, 'gid'=>$gid]);
		}
		return true;
	}
	
	public function getAdminPermission($uid){
		$AdminNgroup = new AdminNgroup;
		$group = $AdminNgroup->field('gid')->where(['uid'=>$uid])->select();
		$permission = [];
		$AdminGroup = new AdminGroup;
		foreach($group as $g){
			$p = $AdminGroup->where(['id'=>$g['gid']])->find();
			if(!empty($p['permission'])){
				$pp = json_decode($p['permission'], true);
				$permission = array_merge($permission, $pp);
			}
		}
		return $permission;
	}
	
}