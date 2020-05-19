<?php
namespace app\admin\model\admin;
use app\admin\model\Model;

class AdminGroup extends Model
{
	//表名
	protected $name = 'admin_group';
	
	public function getUserGroupList($limit=9, $order = ['id']){
		if($limit=='*'){
			return $this::field('id,name')->order('name')->select();
		}else{
			$list = $this::order($order)->paginate($limit);
			return ['list'=>$list, 'page'=>$list->render()];
		}
	}
	
	public function getUserGroup($id){
		$data = $this::find($id);
		if(!empty($data['permission'])){
			$data['permission'] = json_decode($data['permission'], true);
		}
		return $data;
	}
	
	public function setUserGroup($data){
		if(empty($data['id'])){
			unset($data['id']);
		}

		$rule = [
			'name'  => 'require|unique:' . $this->name . '|max:16',
		];
		$msg = [
			'name.require' => -1,
			'name.max' => -2,
			'name.unique' => -3,
		];
		
		$data['permission'] = isset($data['permission'])?json_encode($data['permission']):'[]';
		
		if(empty($data['id'])){
			$res = $this::validate($rule, $msg)->allowField(true)->save($data);
		}else{
			$res = $this::validate($rule, $msg)->isUpdate()->allowField(true)->save($data);
		}
        if($res){
            return $this->id;
        }else{
            return $this::getError();
        }
        
		return 0;
	}
	
	public function deleteUserGroup($id){
		return $this::destroy($id);
	}
	
}