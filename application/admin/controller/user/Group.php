<?php
namespace app\admin\controller\user;
use app\admin\controller\Base;
use app\admin\model\admin\AdminGroup;

class Group extends Base
{

	public function index(){
		
		$sort = ['id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		
		$AdminGroup = new AdminGroup;
		$lists = $AdminGroup->getUserGroupList(9, $sort);
		
		$keys = [
			[
				'key'=>'id',
				'hide'=>1,
			],
			[
				'key'=>'name',
				'title'=>lang('user_group_name'),
				'sort'=>1,
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
		
		$this->metaTitle(lang('user_group'));
		$this->title(lang('user_group'));
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
				'href'=>url('user.group/index'),
				'title'=>lang('user_group'),
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
		$title = isset($_GET['id'])?lang('edit_user_group'):lang('add_user_group');
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
				'href'=>'',
				'title'=>lang('user_manager'),
			],
			[
				'href'=>url('user.group/index'),
				'title'=>lang('user_group'),
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
			$AdminGroup = new AdminGroup;
			$data = $AdminGroup->getUserGroup($id);
			$this->data($data);
		}
		
		$ignore = config('permission_ignore');
		$ignore = json_decode( strtolower( json_encode($ignore) ) );
		
		$permissions = [];
		$path = array(APP_PATH . request()->module() . DS . 'controller/*');
		while (count($path) != 0) {
			$next = array_shift($path);

			foreach (glob($next) as $file) {
				if (is_dir($file)) {
					$path[] = $file . '/*';
				}

				if (is_file($file)) {
					
					$controller = substr($file, strlen(APP_PATH . request()->module() . DS . 'controller/'));
					$permission = substr($controller, 0, strrpos($controller, '.'));
					$permission = str_replace('/', '.', $permission);
					$permission = str_replace(DS, '.', $permission);
					$permission = strtolower($permission);
					
					if (!in_array($permission, $ignore)) {
						$permissions[] = ['title'=>$permission, 'value'=>$permission];
					}
				}
			}
		}
		sort($permissions);
		
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
							'name'=>'name',
							'title'=>lang('user_group_name'),
						],
						[
							'type'=>'checkbox',
							'name'=>'permission[]',
							'title'=>lang('permission'),
							'options'=>$permissions,
						],
						
					]
				],
			]
		];
		$this->formKeys($form_keys);
		
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			$rule = [
				'name'  => 'require|max:16',
			];
			$msg = [
				'name.require' => lang('name_required'),
				'name.max' => lang('name_max_error', [16]),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$AdminGroup = new AdminGroup;
			$res = $AdminGroup->setUserGroup($data);
			
			if($res > 0){
				return success(lang('save_success'));
			}else{
				switch ($res) {
                    case -1:
                        $err['name'] = lang('name_required');
                        break;
                    case -2:
                        $err['name'] = lang('name_max_error', [16]);
                        break;
					case -3:
                        $err['name'] = lang('name_in_use');
                        break;
                    default:
                        $err['not_modified'] = lang('not_modified');
                        break;
                }
                return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
		}
	}
	
	public function delete($id=''){
		if(!empty($id)){
			$AdminGroup = new AdminGroup;
			if(is_array($id)){
				$id = implode(',', $id);
			}
			$AdminGroup->deleteUserGroup($id);
			return success(lang('delete_success'));
		}else{
			return error(lang('please_select_delete_object'));
		}
	}
	
}
