<?php

/**
 * form builder 
**/
namespace app\admin\builder;

trait BuilderForm
{
	/**
	 * @$lables array (code, titile, active) (first one is active) 
	**/
	protected function tabsLable($lables){
		$this->assign('tabs_lable', $lables);
	}
	
	/**
	 * @$contents array (code, titile, active) (first one is active) 
	**/
	protected function tabsContent($contents){
		$this->assign('tabs_content', $contents);
	}

	/**
	 * @ tabs form data 
	**/
	protected function tabsData($data){
		$this->assign('tabs_data', $data);
	}
	
	/**
	 * @ where
	**/
	protected function formKeys($form_keys){
		$this->assign('form_keys', $form_keys);
	}
	
	/**
	 * build form
	**/
	protected function form($tpl = 'builder/builder_form'){
		$this->assign('_meta_title', lang('cms'));
		return view($tpl);
	}
	
}