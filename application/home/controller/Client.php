<?php
namespace app\home\controller;
use app\home\model\Client as ClientModel;

class Client extends Base
{
	  public function index()
    {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		$ClientModel = new ClientModel;
		$list = $ClientModel->getListAll(['status'=>1, 'lang_id'=>$lang_id]);
		$this->assign(['list'=>$list]);
		return view('client/index');
    }
	
}
