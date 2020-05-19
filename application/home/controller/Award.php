<?php
namespace app\home\controller;
use app\home\model\Award as AwardModel;

class Award extends Base
{
	  public function index()
    {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		$AwardModel = new AwardModel;
		$award_list = $AwardModel->getListAll(['status'=>1]);
		$this->assign(['award_list'=>$award_list, 'lang_id'=>$lang_id]);
	    return view('award/index');
    }
	
}
