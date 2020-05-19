<?php
namespace app\home\model;
use app\home\model\Model;

class Projectcategory extends Model
{
	//表名（不用加前綴）
	protected $name = 'z_project_category';
	
	public function getList($limit=9, $order = ['id'], $map = []){
		if($limit=='*'){
			$list = $this::where($map)->order($order)->select();
		}else{
			$list = $this::where($map)->order($order)->paginate($limit);
		}
        
        return ['list'=>$list, 'page'=>$limit=='*'?'':$list->render()];
	}
	
	public function getListAll($map = [], $order = ['sort', 'id'])
	{
		return $this::field('id, name, name_hk, sort')->where($map)->order($order)->select();
	}

	public function getDetail($id){
		$data = $this::find($id);
		return $data;
	}
	
	public function setDetail($data){
		if(empty($data['id'])){
			unset($data['id']);
		}
		
		$rule = [
			'name'  => 'require|max:255|unique:' . $this->name,
		];
		$msg = [
			'name.require' => -1,
			'name.max' => -2,
			'name.unique' => -3,
		];
		
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
	/*
	public function deleteData($id){
		return $this::destroy($id);
	}
	*/
}