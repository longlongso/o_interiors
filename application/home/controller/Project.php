<?php
namespace app\home\controller;
use app\home\model\Project as ProjectModel;
use app\home\model\Projectcategory;

class Project extends Base
{
	public function index() {
		$lang_id = 1;
		if (get_lang() == 'zh-hk') {
			$lang_id = 2;
		}
		$Projectcategory = new Projectcategory;
		$cate_list = $Projectcategory->getListAll(['status'=>1], ['sort'=>'desc', 'id'=>'desc']);
		$is_new = input('type');
		$is_cate = input('cate_id');
		$id = input('id');
		//$cate_id = empty($cate_list[0]['id'])?0:$cate_list[0]['id'];

		$cate_id = (int)$is_cate;
		$cate_name = '';
		$cate_project_list = '';
		$ProjectModel = new ProjectModel;
		
		$project_list_new = $ProjectModel->getListAll(['status'=>1, 'is_new'=>1], ['sort'=>'desc', 'id'=>'desc']);
	
		$project_list = $ProjectModel->getListAll(['status'=>1], ['sort'=>'desc', 'id'=>'desc']);
		if ($is_new) {
			// $id = $id?$id:(empty($project_list_new[0]['id'])?0:$project_list_new[0]['id']);
		} else {
			// $id = $id?$id:(empty($project_list[0]['id'])?0:$project_list[0]['id']);
		}
		
		if($is_cate){
			$cate_info = $Projectcategory->getDetail($is_cate);
			if ($lang_id == 2) {
				$cate_name = $cate_info['name_hk'];
			} else {
				$cate_name = $cate_info['name'];
			}
		}
		
		$all_cate = 0;
		
		if($id){
			$project_detail = $ProjectModel->getDetail($id);
			$image_arr = $project_detail['image'];
			krsort($image_arr);
			$project_detail['image'] = $image_arr;
			$cate_id = empty($project_detail['category_id'])?0:$project_detail['category_id'];
		} else {
			if ($is_cate) {
				$cate_project_list = $ProjectModel->getListAll(['status'=>1, 'category_id'=>$is_cate], ['sort'=>'desc', 'id'=>'desc']);
			} elseif ($is_new) {
				if (!$id) {
					$cate_project_list = $ProjectModel->getListAll(['status'=>1, 'is_new'=>1], ['sort'=>'desc', 'id'=>'desc']);
				}
			}else{
				if (!$id) {
					$cate_project_list = $ProjectModel->getListAll(['status'=>1], ['sort'=>'desc', 'id'=>'desc']);
					$all_cate = 1;
					$cate_name = lang('all_projects');
				}
			}
			
			$project_detail = [];
		}
		
		$this->assign(['cate_list'=>$cate_list, 'project_list'=>$project_list, 'cate_project_list'=>$cate_project_list, 'project_detail'=>$project_detail, 'active_id'=>$id, 'active_category_id'=>$cate_id, 'cate_name'=>$cate_name, 'project_list_new'=>$project_list_new, 'lang_id'=>$lang_id, 'all_cate'=>$all_cate]);
		
		if($id){
			if ($is_new) {
				return view('project/new');
			}else{
				$this->assign('back_link', 'project.html' . ($is_cate?'?cate_id=' . $is_cate : ''));
				
				return view('project/index');
			}
		}else{
			return view('project/cate_product');
		}
    }
	
}
