<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;
use app\admin\model\cms\Projectcategory as ProjectcategoryModel;

class Projectcategory extends Base
{

	public function index(){
		
		$sort = ['sort', 'id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		$map = [];
		if(request()->has('name', 'get')){
			$map['name'] = ['like', '%'. request()->get('name') .'%'];
		}
		
		$ProjectcategoryModel = new ProjectcategoryModel;
		$lists = $ProjectcategoryModel->getList(15, $sort, $map);
		
		$keys = [
			[
				'key'=>'id',
				'title'=>'ID',
				'sort'=>1,
			],
			[
				'key'=>'name',
				'title'=>lang('name'),
				'sort'=>1,
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
		
		$this->metaTitle(lang('project_category'));
		$this->title(lang('project_category'));
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
				'href'=>url('cms.projectcategory/index'),
				'title'=>lang('project_category'),
			]
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
			[
				'title'=>lang('search'),
				'type'=>'search',
				'option'=>[
					[
						'title'=>lang('name'),
						'name'=>'name',
						'value'=>request()->get('name'),
					]
				],
				'active'=>empty($map)?0:1 ,
			]
		];
		$this->buttons($buttons);
		
		$this->data($lists);
		return $this->lists();
	}
	
	public function edit(){
		$title = lang('project_category') . ' ' . (isset($_GET['id'])?lang('edit'):lang('add'));
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
				'href'=>url('cms.projectcategory/index'),
				'title'=>lang('project_category'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		
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
							'title'=>lang('name') . '(EN)',
						],
						[
							'type'=>'text',
							'name'=>'name_hk',
							'title'=>lang('name') . '(ZH)',
						],
						[
							'type'=>'number',
							'name'=>'sort',
							'title'=>lang('sort'),
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
			$ProjectcategoryModel = new ProjectcategoryModel;
			$data = $ProjectcategoryModel->getDetail($id);
			$this->data($data);
		}
		
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			$rule = [
				'name'  => 'require|max:255',
				'sort' => 'number',
			];
			$msg = [
				'name.require' => lang('name') . ' : ' . lang('required'),
				'name.max' => lang('name') . ' : ' . lang('code_max_error', [255]),
				'sort.number'=> lang('sort') . ' : ' . lang('type_number'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$ProjectcategoryModel = new ProjectcategoryModel;
			$res = $ProjectcategoryModel->setDetail($data);
			
			if($res > 0){
				return success(lang('save_success'), 'index');
			}else{
				switch ($res) {
                    case -1:
                        $err['name'] = lang('name') . ' : ' . lang('required');
                        break;
                    case -2:
                        $err['name'] = lang('name') . ' : ' . lang('code_max_error', [255]);
                        break;
					case -3:
                        $err['name'] = lang('name') . ' : ' . lang('in_use');
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
			$ProjectcategoryModel = new ProjectcategoryModel;
			$ProjectcategoryModel->deleteData($id);
			return success(lang('delete_success'));
		}else{
			return error(lang('please_select_delete_object'));
		}
	}
	
}
