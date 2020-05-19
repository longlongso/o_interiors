<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;

class About extends Base
{

	public function index(){
		$title = lang('about');
		$this->metaTitle($title);
		$this->title($title);
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('cms'),
			],
			[
				'href'=>url('cms.about/index'),
				'title'=>lang('about'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		
		$tabs_lable = [
			[
				'code'=>'user',
				'title'=>'EN',
			],
			[
				'code'=>'user_hk',
				'title'=>'ZH',
			],
		];
		$this->tabsLable($tabs_lable);
		
		$form_keys = [
			'user'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'editor',
							'name'=>'about',
							'title'=>lang('about') . '（EN）',
						]
					]
				],
			],
			'user_hk'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'editor',
							'name'=>'about_hk',
							'title'=>lang('about') . '（ZH）',
						]
					]
				],
			],
		];
		$this->formKeys($form_keys);
		
		$buttons = [
			[
				'title'=>lang('save'),
				'type'=>'submit',
			],
		];
		$this->buttons($buttons);
		$this->actionUrl(url('save'));
		$this->data(['about'=>config('about'),'about_hk'=>config('about_hk')]);
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			
			$rule = [
				'about'  => 'require',
				'about_hk'  => 'require',
			];
			$msg = [
				'about.require' => lang('about') . ' : ' . lang('required'),
				'about_hk.require' => lang('about') . ' : ' . lang('required')
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			config_set($data);
			return success(lang('save_success'), url('index'));
			
		}
	}
	
}
