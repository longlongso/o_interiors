<?php
namespace app\home\controller;
use app\home\model\Media as MediaModel;

class Media extends Base
{
	  public function index()
    {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		$MediaModel = new MediaModel;
		$lists = $MediaModel->getList($limit=12, $order = ['sort'=>'desc', 'date'=>'desc', 'id'=>'desc'], $map = ['status'=>1]);
		$this->assign(['lists'=>$lists, 'lang_id'=>$lang_id]);
		return view('media/index');
    }
	
}
