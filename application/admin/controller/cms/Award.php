<?php
namespace app\admin\controller\cms;
use app\admin\controller\Base;
use app\admin\model\cms\Award as AwardModel;

class Award extends Base
{

	public function index(){
		
		$sort = ['date'=>'DESC','sort', 'id'];
		if(request()->has('sort', 'get') && request()->has('order', 'get')){
			$s = request()->get('sort');
			$o = request()->get('order');
			$sort = [($s?$s:0)=>($o?$o:'ASC')];
		}
		$map = [];
		if(request()->has('title', 'get')){
			$map['title'] = ['like', '%'. request()->get('title') .'%'];
		}
		
		$AwardModel = new AwardModel;
		$lists = $AwardModel->getList(15, $sort, $map);
		
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
				'key'=>'date',
				'title'=>lang('date'),
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
		
		$this->metaTitle(lang('award'));
		$this->title(lang('award'));
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
				'href'=>url('cms.award/index'),
				'title'=>lang('award'),
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
		$title = lang('award') . ' ' . (isset($_GET['id'])?lang('edit'):lang('add'));
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
				'href'=>url('cms.award/index'),
				'title'=>lang('award'),
			]
		];
		$this->breadcrumbs($breadcrumbs);
		
		$date_options = [];
		$date_options = [['value'=>'', 'title'=>'']];
		$year = (int)date('Y');
		$date_options[] = ['value'=>$year, 'title'=>$year];
		for($i=99; $i>0; $i--){
			$year--;
			$date_options[] = [
				'value'=>$year,
				'title'=>$year
			];
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
							'type'=>'text',
							'name'=>'title',
							'title'=>lang('title') . '(EN)',
							'required'=>1
						],
						[
							'type'=>'editor',
							'name'=>'title_desc',
							'title'=>lang('title_desc') . '(EN)',
							'required'=>1
						],
						[
							'type'=>'text',
							'name'=>'title_hk',
							'title'=>lang('title') . '(ZH)',
							'required'=>1
						],
						[
							'type'=>'editor',
							'name'=>'title_desc_hk',
							'title'=>lang('title_desc') . '(ZH)',
							'required'=>1
						],
						[
							'type'=>'image',
							'name'=>'image',
							'title'=>lang('image'),
							'length'=>1,
							'required'=>1
						],
						[
							'type'=>'combobox',
							'options'=>$date_options,
							'name'=>'date',
							'title'=>lang('date'),
							'required'=>1
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
			$AwardModel = new AwardModel;
			$data = $AwardModel->getDetail($id);
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
				'image'  => 'require',
				'date'  => 'require',
			];
			$msg = [
				'title.require' => lang('title') . ' : ' . lang('required'),
				'title.max' => lang('title') . ' : ' . lang('code_max_error', [255]),
				'sort.number'=> lang('sort') . ' : ' . lang('type_number'),
				'image.require' => lang('image') . ' : ' . lang('required'),
				'date.max' => lang('date') . ' : ' . lang('code_max_error', [255]),
			];
			
			$err = validate_error($rule, $msg, $data);
			if($err){
				return error($err, null, ['error'=>$err, 'post'=>$data]);
			}
			
			$AwardModel = new AwardModel;
			$res = $AwardModel->setDetail($data);
			
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
					case -3:
                        $err['title'] = lang('title') . ' : ' . lang('in_use');
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
			$AwardModel = new AwardModel;
			$AwardModel->deleteData($id);
			return success(lang('delete_success'));
		}else{
			return error(lang('please_select_delete_object'));
		}
	}
	
}
