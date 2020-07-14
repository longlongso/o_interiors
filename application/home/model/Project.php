<?php
namespace app\home\model;
use app\home\model\Model;

class Project extends Model
{
	//表名（不用加前綴）
	protected $name = 'z_project';
	
	public function getList($limit=9, $order = ['id'=>'desc'], $map = []){
		if($limit=='*'){
			$list = $this::where($map)->order($order)->select();
		}else{
			$list = $this::where($map)->order($order)->paginate($limit);
		}
        
        return ['list'=>$list, 'page'=>$limit=='*'?'':$list->render()];
	}
	
	public function getDetail($id){
		$data = $this::find($id);
		$data['image'] = empty($data['image'])?[]:json_decode($data['image'], true);
		return $data;
	}
	
	public function getListAll($map = ['status'=>1], $order = ['sort'=>'desc', 'id'=>'desc'])
	{
		return $this::field('id, title, title_hk, category_id, cover, image, sort')->where($map)->order($order)->select();
	}

	public function setDetail($data){
		if(empty($data['id'])){
			unset($data['id']);
		}
		
		$rule = [
			'title'  => 'require|max:255|unique:' . $this->name,
		];
		$msg = [
			'title.require' => -1,
			'title.max' => -2,
			'title.unique' => -3,
		];
		$data['image'] = json_encode($data['image']);
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