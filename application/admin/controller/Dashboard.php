<?php
namespace app\admin\controller;

class Dashboard extends Base
{
	
	public function index(){
		$this->assign('meta_title', lang('dashboard'));
		return view();
	}
	
}
