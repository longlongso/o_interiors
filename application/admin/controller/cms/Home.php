<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;
use app\admin\model\cms\Project as ProjectModel;

class Home extends Base
{

	public function index(){
		$title = lang('home');
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
				'href'=>url('cms.home/index'),
				'title'=>lang('home'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		$ProjectModel = new ProjectModel;
		$project_lists = $ProjectModel->getList('*', ['title']);
		$project_options = [];
		if(!empty($project_lists['list'])){
			foreach($project_lists['list'] as $opt){
				$opt = json_decode(json_encode($opt), true);
				// print_r($opt);exit;
				$project_options[] = ['title'=>$opt['title'], 'value'=>$opt['id']];
			}
		}
		$form_keys = [
			'user'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'html',
							'html'=>'<b>' . lang('home_banner') . '</b>'
						],
						[
							'type'=>'image',
							'name'=>'home_banner_1_img',
							'title'=>'1',
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_banner_1_link',
							'title'=>'Link'
						],
						
						[
							'type'=>'image',
							'name'=>'home_banner_2_img',
							'title'=>'2',
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_banner_2_link',
							'title'=>'Link'
						],
						
						[
							'type'=>'image',
							'name'=>'home_banner_3_img',
							'title'=>'3',
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_banner_3_link',
							'title'=>'Link'
						],
						
						[
							'type'=>'image',
							'name'=>'home_banner_4_img',
							'title'=>'4',
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_banner_4_link',
							'title'=>'Link'
						],
						
						[
							'type'=>'image',
							'name'=>'home_banner_5_img',
							'title'=>'5',
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_banner_5_link',
							'title'=>'Link'
						],
						
						[
							'type'=>'html',
							'html'=>'<hr><b>About</b>'
						],
						
						[
							'type'=>'image',
							'name'=>'home_about_image',
							'title'=>lang('about') . ' ( Image )',
							'length'=>1
						],
						[
							'type'=>'textarea',
							'name'=>'home_about_en',
							'title'=>lang('about') . ' (EN)',
						],
						[
							'type'=>'textarea',
							'name'=>'home_about_zh',
							'title'=>lang('about') . ' (ZH)',
						],
						
						[
							'type'=>'html',
							'html'=>'<hr><b>Features Project</b>'
						],
						[
							'type'=>'select2',
							'name'=>'home_project_list[]',
							'title'=>lang('project'),
							'options'=>$project_options,
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
