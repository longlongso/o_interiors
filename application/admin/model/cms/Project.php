<?php
namespace app\admin\model\cms;
use app\admin\model\Model;

class Project extends Model
{
	//表名（不用加前綴）
	protected $name = 'z_project';
	
	public function getList($limit=9, $order = ['id'], $map = []){
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
	
	public function setDetail($data){
		if(empty($data['id'])){
			unset($data['id']);
		}
		
		$rule = [
			'title'  => 'require|max:255',
		];
		$msg = [
			'title.require' => -1,
			'title.max' => -2,
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
	
	public function deleteData($id){
		return $this::destroy($id);
	}
	
}