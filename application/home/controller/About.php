<?php
namespace app\home\controller;

class About extends Base
{

	  public function index()
    {
		if (get_lang() == 'zh-hk') {
			$this->assign(['about'=>config('about_hk')]);
		} else {
			$this->assign(['about'=>config('about')]);
		}
		
		return view('about/index');
    }
	
}
