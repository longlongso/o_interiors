<?php
namespace app\home\controller;
use think\Controller;

class Base extends Controller
{
	public function _initialize()
    {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		
        $this->assign(['meta_title'=>config('site_meta_title'), 'meta_description'=>config('site_meta_description'), 'meta_keywords'=>config('site_meta_keywords'), 'lang_id'=>$lang_id, 'site_logo'=>config('site_logo'), 'site_meta_icon'=>config('site_meta_icon')]);
    }
}
