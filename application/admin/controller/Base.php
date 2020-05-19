<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
    use \app\admin\builder\BuilderBase;
	use \app\admin\builder\BuilderForm;
	use \app\admin\builder\BuilderLists;
	
	public function _initialize()
    {
        $uid = is_logged();
		if(!$uid){
			return error(lang('need_login'), url('auth/login'));
		}
		
		check_permission($uid);
		
		$this->callout();
    }
	
}
