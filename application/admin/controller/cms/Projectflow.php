<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;

class Projectflow extends Base
{

	public function index(){
		$title = lang('project_flow');
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
				'href'=>url('cms.projectflow/index'),
				'title'=>lang('project_flow'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		
		$form_keys = [
			'user'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'html',
							'html'=>'<b>' . lang('project_flow') . '</b>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_1_en',
							'title'=>'Step 1 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_1_zh',
							'title'=>'Step 1 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_2_en',
							'title'=>'Step 2 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_2_zh',
							'title'=>'Step 2 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_3_en',
							'title'=>'Step 3 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_3_zh',
							'title'=>'Step 3 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_4_en',
							'title'=>'Step 4 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_4_zh',
							'title'=>'Step 4 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_5_en',
							'title'=>'Step 5 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_5_zh',
							'title'=>'Step 5 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_6_en',
							'title'=>'Step 6 (EN)'
						],
						[
							'type'=>'text',
							'name'=>'project_flow_title_6_zh',
							'title'=>'Step 6 (ZH)'
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'html',
							'html'=>'<b>' . lang('background_image') . '</b>'
						],
						[
							'type'=>'image',
							'name'=>'project_flow_img',
							'title'=>'',
							'length'=>1
						],
					]
				],
			]
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
		
		$keys = array_column($form_keys['user']['form']['keys'], 'name');
		$keys[] = 'home_project_list';
		$settings = db('setting')->where('key', 'in', $keys)->select();
		$data = [];
		// print_r($settings);exit;
		foreach($settings as $setting){
			$data[$setting['key']] = $setting['serialized']==1?json_decode($setting['value'], true):$setting['value'];
		}
		// print_r($data);exit;
		$this->data($data);

		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			
			$rule = [
				//'home'  => 'require',
			];
			$msg = [
				'home.require' => lang('home') . ' : ' . lang('required')
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
