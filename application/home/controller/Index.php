<?php
namespace app\home\controller;
use app\home\model\Project as ProjectModel;

class Index extends Base
{
	public function index()
	{
		$keys = [
			"home_banner_1_img",
			"home_banner_1_link",
			"home_banner_2_img",
			"home_banner_2_link",
			"home_banner_3_img",
			"home_banner_3_link",
			"home_banner_4_img",
			"home_banner_4_link",
			"home_banner_5_img",
			"home_banner_5_link",
			"home_about_image",
			"home_about_en",
			"home_about_zh",
			"home_project_list"
		];

		$settings = db('setting')->where('key', 'in', $keys)->select();
		$data = [];
		foreach($settings as $setting){
			$data[$setting['key']] = $setting['serialized']==1?json_decode($setting['value'], true):$setting['value'];
		}
		
		$data['lang_id'] = 1;
		if (get_lang() == 'zh-hk') {
			$data['lang_id'] = 2;
		}
		
		$data['project_list'] = [];
		if(!empty($data['home_project_list'])){
			$ProjectModel = new ProjectModel;
			foreach($data['home_project_list'] as $project_id){
				$data['project_list'][$project_id] = $ProjectModel->getDetail($project_id);
				if($data['project_list'][$project_id]['image']){
					$image_arr = $data['project_list'][$project_id]['image'];
					krsort($image_arr);
					$data['project_list'][$project_id]['image'] = $image_arr;
				}
			}
		}
		
		$this->assign($data);

		return view('home/index');
	}
}
