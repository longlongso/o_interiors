<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;

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
		
		$form_keys = [
			'user'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'image',
							'name'=>'home_banner',
							'title'=>lang('home_banner'),
							'length'=>10
						],
						[
							'type'=>'editor',
							'name'=>'home_description',
							'title'=>lang('home_description') . '（EN）',
						],
						[
							'type'=>'editor',
							'name'=>'home_description_hk',
							'title'=>lang('home_description') . '（ZH）',
						],
						[
							'type'=>'text',
							'name'=>'home_description_link',
							'title'=>lang('home_description_link')
						],
						[
							'type'=>'html',
							'html'=>'<hr> Item 1'
						],
						[
							'type'=>'image',
							'name'=>'home_item1_image1',
							'title'=>lang('home_item1_image1'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item1_link1',
							'title'=>lang('home_item1_link1')
						],
						[
							'type'=>'image',
							'name'=>'home_item1_image2',
							'title'=>lang('home_item1_image2'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item1_link2',
							'title'=>lang('home_item1_link2')
						],
						[
							'type'=>'html',
							'html'=>'<hr> Item 2'
						],
						[
							'type'=>'image',
							'name'=>'home_item2_image1',
							'title'=>lang('home_item2_image1'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item2_link1',
							'title'=>lang('home_item2_link1')
						],
						[
							'type'=>'image',
							'name'=>'home_item2_image2',
							'title'=>lang('home_item2_image2'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item2_link2',
							'title'=>lang('home_item2_link2')
						],
						[
							'type'=>'html',
							'html'=>'<hr> Item 3'
						],
						[
							'type'=>'image',
							'name'=>'home_item3_image1',
							'title'=>lang('home_item3_image1'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item3_link1',
							'title'=>lang('home_item3_link1')
						],
						[
							'type'=>'image',
							'name'=>'home_item3_image2',
							'title'=>lang('home_item3_image2'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item3_link2',
							'title'=>lang('home_item3_link2')
						],
						[
							'type'=>'image',
							'name'=>'home_item3_image3',
							'title'=>lang('home_item3_image3'),
							'length'=>1
						],
						[
							'type'=>'text',
							'name'=>'home_item3_link3',
							'title'=>lang('home_item3_link3')
						],
						[
							'type'=>'html',
							'html'=>'<hr>'
						],
						[
							'type'=>'text',
							'name'=>'home_item_link',
							'title'=>lang('home_item_link')
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
		
		$settings = db('setting')->where('key', 'in', $keys)->select();
		$data = [];
		foreach($settings as $setting){
			$data[$setting['key']] = $setting['serialized']==1?json_decode($setting['value'], true):$setting['value'];
		}
		
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
