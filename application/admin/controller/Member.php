<?php
namespace app\admin\controller;
use app\admin\model\Member as MemberModel;

class Member extends Base
{
	
	public function index(){
		$sort = ['id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		$map = [];
		if(request()->has('code', 'get')){
			$map['username|email'] = ['like', '%'. request()->get('code') .'%'];
		}
		
		$MemberModel = new MemberModel;
		$lists = $MemberModel->getMemberList(9, $sort, $map);
		
		$keys = [
			[
				'key'=>'id',
				'title'=>'ID',
				//'hide'=>1,
			],
			[
				'key'=>'username',
				'title'=>lang('username'),
				'sort'=>1,
			],
			[
				'key'=>'email',
				'title'=>lang('email'),
				'sort'=>1,
			],
			[
				'key'=>'last_login_time',
				'title'=>lang('last_login_time'),
				'sort'=>1,
				'type'=>'date',
			],
			[
				'key'=>'last_login_ip',
				'title'=>lang('last_login_ip'),
				'sort'=>1,
				'type'=>'ip',
			],
			[
				'key'=>'status',
				'title'=>lang('status'),
				'sort'=>1,
				'option'=>[0=>lang('disabled'), 1=>lang('normal')],
			],
			[
				'key'=>'do',
				'title'=>lang('manager'),
				'do'=>[
					[
						'key'=>'id',
						'title'=>'<i class="fa fa-pencil-square" aria-hidden="true"></i>', 
						'href'=>url('edit')
					],
				],
			],
		];
		$this->listsKeys($keys);
		
		$lists['list'] = $this->listContent($lists['list'], $keys);
		if(request()->isAjax()){
			return $lists;
		}
		
		$this->metaTitle(lang('member'));
		$this->title(lang('member_manager'));
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('member'),
			],
			[
				'href'=>url('member/index'),
				'title'=>lang('member_manager'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		
		$buttons = [
			[
				'title'=>lang('refresh'),
				'type'=>'refresh',
			],
			[
				'title'=>lang('search'),
				'type'=>'search',
				'option'=>[
					[
						'title'=>lang('username_or_email'),
						'name'=>'code',
						'value'=>request()->get('code'),
					]
				],
				'active'=>empty($map)?0:1 ,
			],
		];
		$this->buttons($buttons);
		
		$this->data($lists);
		return $this->lists();
	}
	
	public function edit(){
		$this->metaTitle(lang('member'));
		$this->title(lang('member_manager'));
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('member'),
			],
			[
				'href'=>url('member/index'),
				'title'=>lang('member_manager'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$buttons = [
			[
				'title'=>lang('save'),
				'type'=>'submit',
			],
			[
				'title'=>lang('back'),
				'type'=>'back',
			],
		];
		$this->buttons($buttons);
		
		$this->actionUrl(url('save'));
		
		if(request()->has('id', 'get')){
			$id = request()->get('id');
			$MemberModel = new MemberModel;
			$data = $MemberModel->getMemberData($id);
			$this->tabsData($data);
		}
		$tabs_lable = [
			[
				'code'=>'user',
				'title'=>lang('general'),
			],
			[
				'code'=>'profile',
				'title'=>lang('profile'),
			],
			[
				'code'=>'facebook',
				'title'=>lang('facebook'),
			],
		];
		$this->tabsLable($tabs_lable);
		
		$tabs_content = [
			'user'=>[
				'form'=>[
					'action'=>'',
					'keys'=>[
						[
							'type'=>'hidden',
							'name'=>'id',
						],
						[
							'type'=>'text',
							'name'=>'username',
							'title'=>lang('username'),
							'only_read'=>1,
						],
						[
							'type'=>'email',
							'name'=>'email',
							'title'=>lang('email'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'mobile',
							'title'=>lang('mobile'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'reg_time',
							'title'=>lang('reg_time'),
							'only_read'=>1,
						],
						[
							'type'=>'ip',
							'name'=>'reg_ip',
							'title'=>lang('reg_ip'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'last_login_time',
							'title'=>lang('last_login_time'),
							'only_read'=>1,
						],
						[
							'type'=>'ip',
							'name'=>'last_login_ip',
							'title'=>lang('last_login_ip'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'update_time',
							'title'=>lang('update_time'),
							'only_read'=>1,
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>'1',
									'title'=>lang('normal'),
								],
								[
									'value'=>'0',
									'title'=>lang('disabled'),
								],
							],
							'name'=>'status',
							'title'=>lang('status'),
						]
					]
				],
			],
			'profile'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'text',
							'name'=>'real_name',
							'title'=>lang('real_name'),
							'only_read'=>1,
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>0,
									'title'=>lang('not_set'),
								],
								[
									'value'=>1,
									'title'=>lang('male'),
								],
								[
									'value'=>2,
									'title'=>lang('female'),
								],
							],
							'name'=>'gender',
							'title'=>lang('gender'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'line',
							'title'=>lang('line'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'facebook',
							'title'=>lang('facebook'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'wechat',
							'title'=>lang('wechat'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'qq',
							'title'=>lang('qq'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'whatsapp',
							'title'=>lang('whatsapp'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'create_time',
							'title'=>lang('create_time'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'update_time',
							'title'=>lang('update_time'),
							'only_read'=>1,
						],
					]
				]
			],
			'facebook'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'text',
							'name'=>'fb_id',
							'title'=>lang('facebook'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'first_name',
							'title'=>lang('first_name'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'last_name',
							'title'=>lang('last_name'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'name',
							'title'=>lang('name'),
							'only_read'=>1,
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>0,
									'title'=>lang('not_set'),
								],
								[
									'value'=>1,
									'title'=>lang('male'),
								],
								[
									'value'=>2,
									'title'=>lang('female'),
								],
							],
							'name'=>'gender',
							'title'=>lang('gender'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'birth',
							'title'=>lang('birth'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'email',
							'title'=>lang('email'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'mobile',
							'title'=>lang('mobile'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'link',
							'title'=>lang('link'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'locale',
							'title'=>lang('locale'),
							'only_read'=>1,
						],
						[
							'type'=>'text',
							'name'=>'timezone',
							'title'=>lang('timezone'),
							'only_read'=>1,
						],
						[
							'type'=>'date',
							'name'=>'create_time',
							'title'=>lang('create_time'),
							'only_read'=>1,
						],
						[
							'type'=>'select',
							'options'=>[
								[
									'value'=>'1',
									'title'=>lang('normal'),
								],
								[
									'value'=>'0',
									'title'=>lang('disabled'),
								],
							],
							'name'=>'status',
							'title'=>lang('status'),
							'only_read'=>1,
						]
					]
				]
			]
		];
		$this->tabsContent($tabs_content);
		
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			$MemberModel = new MemberModel;
			$res = $MemberModel->setMemberStatus($data['id'], $data['status']);
			
			return success(lang('save_success'));
		}
	}
	
}
