<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;

class Contact extends Base
{

	public function index(){
		$title = lang('contact');
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
				'href'=>url('cms.contact/index'),
				'title'=>lang('contact'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		
		$form_keys = [
			'user'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'text',
							'name'=>'contact_company',
							'title'=>'Company Name'
						],
						[
							'type'=>'textarea',
							'name'=>'contact_address',
							'title'=>'Company Name'
						],
						[
							'type'=>'text',
							'name'=>'contact_address_link',
							'title'=>'GMap Link'
						],
                        [
							'type'=>'text',
							'name'=>'contact_address_link_zh',
							'title'=>'GMap Link (中文)'
						],
						[
							'type'=>'text',
							'name'=>'contact_tel',
							'title'=>'Company TEL'
						],
						[
							'type'=>'text',
							'name'=>'contact_fax',
							'title'=>'Company Fax'
						],
						[
							'type'=>'text',
							'name'=>'contact_facebook_name',
							'title'=>'Facebook Name'
						],
						[
							'type'=>'text',
							'name'=>'contact_facebook_link',
							'title'=>'Facebook Link'
						],
						[
							'type'=>'text',
							'name'=>'contact_whatsapp',
							'title'=>'Whatsapp'
						],
						[
							'type'=>'email',
							'name'=>'contact_email',
							'title'=>'Email'
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
		// print_r(json_encode($keys));exit;
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
				// 'home.require' => lang('home') . ' : ' . lang('required')
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
