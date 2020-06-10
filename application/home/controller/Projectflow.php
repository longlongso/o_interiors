<?php
namespace app\home\controller;

class Projectflow extends Base
{
	public function index()
	{
		$keys = [
			"project_flow_title_1_en",
			"project_flow_title_1_zh",
			"project_flow_title_2_en",
			"project_flow_title_2_zh",
			"project_flow_title_3_en",
			"project_flow_title_3_zh",
			"project_flow_title_4_en",
			"project_flow_title_4_zh",
			"project_flow_title_5_en",
			"project_flow_title_5_zh",
			"project_flow_title_6_en",
			"project_flow_title_6_zh",
			"project_flow_img"
		];

		$settings = db('setting')->where('key', 'in', $keys)->select();
		$data = [];
		foreach($settings as $setting){
			$data['flow'][$setting['key']] = $setting['serialized']==1?json_decode($setting['value'], true):$setting['value'];
		}
		
		$data['lang_code'] = 'en';
		if (get_lang() == 'zh-hk') {
			$data['lang_code'] = 'zh';
		}
		
		$this->assign($data);

		return view('projectflow/index');
	}
}
