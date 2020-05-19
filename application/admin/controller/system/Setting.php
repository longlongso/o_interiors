<?php
namespace app\admin\controller\system;
use app\admin\controller\Base;

class Setting extends Base
{
	public function index(){
		$this->metaTitle(lang('settings'));
		$this->title(lang('settings'));
		
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('system'),
			],
			[
				'href'=>url('system.setting/index'),
				'title'=>lang('settings'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$buttons = [
			[
				'title'=>lang('save'),
				'type'=>'submit',
			],
		];
		$this->buttons($buttons);
		
		$this->actionUrl(url('save'));
		
		$tabs_lable = [
			[
				'code'=>'general',
				'title'=>lang('general'),
			],
			[
				'code'=>'email',
				'title'=>lang('email'),
			],
		];
		$this->tabsLable($tabs_lable);
		
		$tabs_content = [
			'general'=>[
				'form'=>[
					'action'=>'',//url('save', 'tab=general'),
					'keys'=>[
						[
							'type'=>'text',
							'name'=>'site_name',
							'title'=>lang('site_name'),
						],
						[
							'type'=>'image',
							'length'=>1, // 0, 'auto' is unlimited >0 is limited 
							'name'=>'site_logo',
							'title'=>lang('site_logo'),
						],
						[
							'type'=>'text',
							'name'=>'site_url',
							'title'=>lang('site_url'),
						],
						[
							'type'=>'image',
							'length'=>1,
							'name'=>'site_meta_icon',
							'title'=>lang('meta_icon'),
						],
						[
							'type'=>'text',
							'name'=>'map_url',
							'title'=>lang('map_url'),
						],
						[
							'type'=>'text',
							'name'=>'site_meta_title',
							'title'=>lang('meta_title'),
						],
						[
							'type'=>'textarea',
							'name'=>'site_meta_description',
							'title'=>lang('meta_description'),
						],
						[
							'type'=>'textarea',
							'name'=>'site_meta_keywords',
							'title'=>lang('meta_keywords'),
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>'release',
									'title'=>lang('release'),
								],
								[
									'value'=>'development',
									'title'=>lang('development'),
								],
								[
									'value'=>'maintenance',
									'title'=>lang('maintenance'),
								],
							],
							'name'=>'site_status',
							'title'=>lang('site_status'),
						]
					]
				],
			],
			'email'=>[
				'form'=>[
					'action'=>'',//url('save', 'tab=email'),
					'keys'=>[
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>'smtp',
									'title'=>'SMTP',
								],
							],
							'name'=>'email_type',
							'title'=>lang('mail_protocol'),
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>0,
									'title'=>'false',
								],
								[
									'value'=>1,
									'title'=>'true',
								],
							],
							'name'=>'email_debug',
							'title'=>lang('debug') . ' (true: send email to self)',
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>'none',
									'title'=>'None',
								],
								[
									'value'=>'ssl',
									'title'=>'SSL',
								],
							],
							'name'=>'smtp_secure',
							'title'=>lang('Secure'),
						],
						[
							'type'=>'text',
							'name'=>'smtp_host',
							'title'=>lang('smtp_hostname'),
						],
						[
							'type'=>'text',
							'name'=>'smtp_port',
							'title'=>lang('smtp_port'),
						],
						[
							'type'=>'text',
							'name'=>'smtp_username',
							'title'=>lang('smtp_username'),
						],
						[
							'type'=>'password',
							'name'=>'smtp_password',
							'title'=>lang('smtp_password'),
						],
						[
							'type'=>'email',
							'name'=>'smtp_reply_to_email',
							'title'=>lang('reply_to_email'),
						],
						[
							'type'=>'textarea',
							'name'=>'extra_alert_email',
							'title'=>lang('extra_alert_email'),
						],
					]
				]
			]
		];
		$this->tabsContent($tabs_content);
		
		$keys = array_merge(array_column($tabs_content['general']['form']['keys'], 'name'),array_column($tabs_content['email']['form']['keys'], 'name'));
		
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
			config_set($data);
			return success(lang('save_success'), url('index'));
		}
	}
	
}
