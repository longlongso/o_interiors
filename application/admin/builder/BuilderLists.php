<?php

/**
 * form builder 
**/
namespace app\admin\builder;

trait BuilderLists
{
	protected $_primary_key = '';
	
	/**
	 * table title, and key 
	**/
	protected function listsKeys($keys){
		$this->assign('keys', $keys);
	}
	
	protected function listContent($lists, $keys, $primary_key='', $tpl = 'builder/builder_lists_content'){
		$view = new \think\View();
		if(!$primary_key){
			$primary_key = $this->_primary_key;
		}
		$view->assign(['keys'=>$keys, 'lists'=>$lists, 'primary_key'=>$primary_key]);
		return $view->fetch($tpl);
	}
	
	protected function listsPrimaryKey($key){
		$this->_primary_key = $key;
	}
	
	protected function isGridView(){
		$this->assign('isGridView', 1);
	}
	
	protected function gridContent($lists, $keys,  $primary_key='', $tpl = 'builder/builder_grid_content'){
		$view = new \think\View();
		if(!$primary_key){
			$primary_key = $this->_primary_key;
		}
		$view->assign(['keys'=>$keys, 'lists'=>$lists, 'primary_key'=>$primary_key]);
		$this->assign('isGridView', 1);
		return $view->fetch($tpl);
	}
	
	/**
	 * build lists
	**/
	protected function lists($tpl = 'builder/builder_lists'){
		$this->assign('_meta_title', lang('cms'));
		return view($tpl);
	}
	
}