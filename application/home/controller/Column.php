<?php
namespace app\home\controller;
use app\home\model\Column as ColumnModel;

class Column extends Base
{
	  public function index()
    {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		$ColumnModel = new ColumnModel;
		$id = input('id');
		if($id){
			$data = $ColumnModel->getDetail($id);
			// $image_arr = $data['image'];
			// krsort($image_arr);
			// $data['image'] = $image_arr;
			$this->assign(['data'=>$data, 'lang_id'=>$lang_id]);
			return view('column/detail');
		}else{
			$lists = $ColumnModel->getList($limit=12, $order = ['sort'=>'desc', 'id'=>'desc'], ['status'=>1]);
			$this->assign(['lists'=>$lists, 'lang_id'=>$lang_id]);
			return view('column/index');
		}
    }
	
}
