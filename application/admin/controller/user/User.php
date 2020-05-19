<?php
namespace app\admin\controller\user;
use app\admin\controller\Base;
use app\admin\model\admin\Admin;
use app\admin\model\admin\AdminGroup;

class User extends Base
{

	public function index(){
		$sort = ['id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		
		$admin = new Admin;
		$lists = $admin->getUserList(9, $sort);
		
		$keys = [
			[
				'key'=>'id',
				'hide'=>1,
			],
			[
				'key'=>'username',
				'title'=>lang('username'),
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
					[
						'key'=>'id',
						'title'=>'<i class="fa fa-trash" aria-hidden="true"></i>', 
						'class'=>'alert delete',
						'href'=>url('delete')
					],
				],
			],
		];
		$this->listsKeys($keys);
		
		$lists['list'] = $this->listContent($lists['list'], $keys);
		if(request()->isAjax()){
			return $lists;
		}
		
		$this->metaTitle(lang('user_list'));
		$this->title(lang('user_list'));
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
				'href'=>'',
				'title'=>lang('user_manager'),
			],
			[
				'href'=>url('user.user/index'),
				'title'=>lang('user_list'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$buttons = [
			[
				'title'=>lang('add'),
				'type'=>'a',
				'href'=>url('edit'),
				'class'=>'fa fa-plus-circle',
			],
			[
				'title'=>lang('delete'),
				'type'=>'delete',
				'href'=>url('delete'),
			],
			[
				'title'=>lang('refresh'),
				'type'=>'refresh',
			],
		];
		$this->buttons($buttons);
		
		$this->data($lists);
		return $this->lists();
	}
	
	public function edit(){
		$title = isset($_GET['id'])?lang('edit_user'):lang('add_user');
		$this->metaTitle($title);
		$this->title($title);
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
				'href'=>url('user.user/index'),
				'title'=>lang('user_manager'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$AdminGroup = new AdminGroup;
		$admin_group = $AdminGroup->getUserGroupList('*');
		
		$form_keys = [
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
						],
						[
							'type'=>'text',
							'name'=>'email',
							'title'=>lang('email'),
						],
						[
							'type'=>'text',
							'name'=>'mobile',
							'title'=>lang('mobile'),
						],
						[
							'type'=>'password',
							'name'=>'password',
							'title'=>lang('new_password'),
						],
						[
							'type'=>'checkbox',
							'name'=>'admin_group[]',
							'title'=>lang('user_group'),
							'options'=>$admin_group,
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
			]
		];
		$this->formKeys($form_keys);
		
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
			$admin = new Admin;
			$data = $admin->getUser($id);
			$this->data($data);
		}
		
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			$User = new Admin;
			
			$data = request()->post();
			$rule = [
				'username'  => 'require|max:' . $User->usernameLength,
				'email' => 'require|email',
			];
			$msg = [
				'username.require' => lang('username_required'),
				'username.max' => lang('username_max_error', [$User->usernameLength]),
				'email.require'=> lang('email_required'),
				'email.email'=> lang('email_error'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$res = $User->setUser($data);
			
			if($res > 0){
				return success(lang('save_success'));
			}else{
				switch ($res) {
                    case -1:
                        $err['username'] = lang('username_required');
                        break;
                    case -2:
                        $err['username'] = lang('username_max_error', [$this->usernameLength]);
                        break;
					case -3:
                        $err['username'] = lang('username_has_reigster');
                        break;
					case -4:
                        $err['email'] = lang('email_required');
                        break;
					case -5:
                        $err['email'] = lang('email_error');
                        break;
					case -6:
                        $err['email'] = lang('email_has_register');
                        break;
					case -7:
                        $err['password'] = lang('password_required');
                        break;
                    default:
                        $err[] = lang('type_error');
                        break;
                }
                return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
	}
	
	public function delete($id=''){
		if(!empty($id)){
			$User = new Admin;
			if(is_array($id)){
				$id = implode(',', $id);
			}
			$User->deleteUser($id);
			return success(lang('delete_success'));
		}else{
			return error(lang('please_select_delete_object'));
		}
	}
	
}
