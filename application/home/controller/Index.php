<?php
namespace app\home\controller;

class Index extends Base
{
		public function index()
		{
			$keys = ['home_banner', 'home_description', 'home_description_hk', 'home_description_link', 'home_item1_image1', 'home_item1_link1', 'home_item1_image2', 'home_item1_link2', 'home_item2_image1', 'home_item2_link1', 'home_item2_image2', 'home_item2_link2', 'home_item3_image1', 'home_item3_link1', 'home_item3_image2', 'home_item3_link2', 'home_item3_image3', 'home_item3_link3', 'home_item_link'];

			$settings = db('setting')->where('key', 'in', $keys)->select();
			$data = [];
			foreach($settings as $setting){
				$data[$setting['key']] = $setting['serialized']==1?json_decode($setting['value'], true):$setting['value'];
			}
			
			$this->assign($data);

			return view('home/index');
		}
	
}
