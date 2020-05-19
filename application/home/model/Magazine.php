<?php
namespace app\home\model;
use app\home\model\Model;

class Magazine extends Model
{
	//表名（不用加前綴）
	protected $name = 'z_magazine';
	
	public function getList($limit=12, $order = ['sort'=>'desc', 'date'=>'desc', 'id'=>'desc'], $map = ['status'=>1]){
		if($limit=='*'){
			$list = $this::where($map)->order($order)->select();
		}else{
			$list = $this::where($map)->order($order)->paginate($limit);
		}
        
        return ['list'=>$list, 'page'=>$limit=='*'?'':$list->render()];
	}
	
	public function getListAll($map = ['status'=>1], $order = ['sort'=>'desc', 'id'=>'desc'])
	{
		return $this::where($map)->order($order)->select();
	}

	public function getDetail($id){
		$data = $this::find($id);
		$data['image'] = json_decode($data['image'], true);
		return $data;
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
		$data['date'] = strtotime($data['date']);
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