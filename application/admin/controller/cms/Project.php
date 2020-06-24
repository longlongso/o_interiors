<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;
use app\admin\model\cms\Project as ProjectModel;
use app\admin\model\cms\Projectcategory as ProjectcategoryModel;

class Project extends Base
{

	public function index(){
		
		$sort = ['sort', 'id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		$map = [];
		if(request()->has('title', 'get')){
			$map['title'] = ['like', '%'. request()->get('title') .'%'];
		}
		
		$ProjectModel = new ProjectModel;
		$lists = $ProjectModel->getList(15, $sort, $map);
		
		$keys = [
			[
				'key'=>'id',
				'title'=>'ID',
				'sort'=>1,
			],
			[
				'key'=>'title',
				'title'=>lang('title'),
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
		
		$this->metaTitle(lang('project'));
		$this->title(lang('project'));
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
				'href'=>url('cms.project/index'),
				'title'=>lang('project'),
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
						'title'=>lang('title'),
						'name'=>'title',
						'value'=>request()->get('title'),
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
		$title = lang('project') . ' ' . (isset($_GET['id'])?lang('edit'):lang('add'));
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
				'href'=>url('cms.project/index'),
				'title'=>lang('project'),
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
		
		$ProjectcategoryModel = new ProjectcategoryModel;
		$cate_list = $ProjectcategoryModel->getListAll(['status'=>1]);
		$cate_options = [['value'=>0, 'title'=>'']];
		if(!empty($cate_list)){
			foreach($cate_list as $cate){
				$cate_options[] = [
					'value'=>$cate['id'],
					'title'=>$cate['name']
				];
			}
		}

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
							'type'=>'combobox',
							'options'=>$cate_options,
							'name'=>'category_id',
							'title'=>lang('category'),
							'required'=>1
						],
						[
							'type'=>'text',
							'name'=>'title',
							'title'=>lang('title') . '(EN)',
							'required'=>1
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
							'name'=>'is_new',
							'title'=>lang('is_new'),
						],
						[
							'type'=>'number',
							'name'=>'sort',
							'title'=>lang('sort'),
						],
						[
							'type'=>'editor',
							'name'=>'content',
							'title'=>lang('content') . '(EN)',
						],
						[
							'type'=>'text',
							'name'=>'video',
							'title'=> 'Video ( Embed URL/Link of Youtube Video )',
						],
						[
							'type'=>'image',
							'name'=>'image',
							'title'=>lang('image'),
							'length'=>100,
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
			'user_hk'=>[
				'form'=>[
					'action'=>'', 
					'keys'=>[
						[
							'type'=>'text',
							'name'=>'title_hk',
							'title'=>lang('title') . '(ZH)',
							'required'=>1
						],
						[
							'type'=>'editor',
							'name'=>'content_hk',
							'title'=>lang('content') . '(ZH)',
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
			$ProjectModel = new ProjectModel;
			$data = $ProjectModel->getDetail($id);
			$this->data($data);
		}
		
		return $this->form();
	}
	
	public function save(){
		if(request()->isPost()){
			
			$data = request()->post();
			$rule = [
				'title'  => 'require|max:255',
				'title_hk'  => 'require|max:255',
				'sort' => 'number',
			];
			$msg = [
				'title.require' => lang('title') . ' : ' . lang('required'),
				'title.max' => lang('title') . ' : ' . lang('code_max_error', [255]),
				'sort.number'=> lang('sort') . ' : ' . lang('type_number'),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$ProjectModel = new ProjectModel;
			$res = $ProjectModel->setDetail($data);
			
			if($res > 0){
				return success(lang('save_success'), 'index');
			}else{
				switch ($res) {
                    case -1:
                        $err['title'] = lang('title') . ' : ' . lang('required');
                        break;
                    case -2:
                        $err['title'] = lang('title') . ' : ' . lang('code_max_error', [255]);
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
			$ProjectModel = new ProjectModel;
			$ProjectModel->deleteData($id);
			return success(lang('delete_success'));
		}else{
			return error(lang('please_select_delete_object'));
		}
	}
	
}
