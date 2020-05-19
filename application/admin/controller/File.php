<?php
namespace app\admin\controller;
use \Tools\Download;
use app\common\model\Image as ImageModel;

class File extends Base
{
	use \app\common\traits\File\Image { deleteImage as public; }
	use \app\common\traits\File\Video { deleteVideo as public; }
	
	public function image(){
		$map = [];
		$data = input();
		if(!empty($data['alias'])){
			$map['alias'] = ['like', '%' . $data['alias'] . '%'];
		}
		
		$image_list = $this->getImageList($limit=30, $map);
		
		if(request()->isAjax()){
			$image_list['image_list'] = $image_list['image_list']->toArray();
			foreach($image_list['image_list']['data'] as $k=>$data){
				$image_list['image_list']['data'][$k]['path'] = $this->getImageByPathName($data['path'], $data['name']);
				$image_list['image_list']['data'][$k]['thumb'] = get_thumb_by_id($data['id'], 180, 180);
				unset($image_list['image_list']['data'][$k]['name']);
			}
			return $image_list;
		}
		
		$this->metaTitle(lang('image_manager'));
		$this->title(lang('image_manager'));
		
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('file_manager'),
			],
			[
				'href'=>url('file/image'),
				'title'=>lang('image_manager'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$this->actionUrl(url('uploadImage'));
		$this->assign('check_image_unique_url', url('checkImageUnique'));
		$this->assign('self_url', url('image'));
		$this->assign($image_list);
		
		return view();
	}
	
	public function downloadimage($id = 0)
	{
		if($id){
			$ImageModel = new ImageModel;
			$file = $ImageModel->where(['id'=>$id])->find();
			if($file){
				$Download = new Download;
				$setting = config('upload');
				$path = './' . $setting['image']['local_path'] . '/' . $file['path'] . '/' . $file['name'];
				
				if(!empty($file['alias'])){
					$alias_arr = explode('.', $file['alias']);
					unset($alias_arr[count($alias_arr)-1]);
					if(count($alias_arr)>1){
						$alias_str = implode('.', $alias_arr);
					}else{
						$alias_str = $alias_arr[0];
					}
				}else{
					$alias_str = '';
				}
				$Download->outPutFile($path, $alias_str);
			}
		}
		return 0;
	}
	
	public function video()
	{
		$video_list = $this->getVideoList($limit=12);
		
		if(request()->isAjax()){
			$video_list['video_list'] = $video_list['video_list']->toArray();
			foreach($video_list['video_list']['data'] as $k=>$data){
				$video_list['video_list']['data'][$k]['path'] = $this->getVideoByPathName($data['path'], $data['name']);
				unset($video_list['video_list']['data'][$k]['name']);
			}
			return $video_list;
		}
		
		$this->metaTitle(lang('video_manager'));
		$this->title(lang('video_manager'));
		
		$breadcrumbs = [
			[
				'href'=>url('dashboard/index'),
				'title'=>lang('home'),
			],
			[
				'href'=>'',
				'title'=>lang('file_manager'),
			],
			[
				'href'=>url('file/video'),
				'title'=>lang('video_manager'),
			],
		];
		$this->breadcrumbs($breadcrumbs);
		
		$this->actionUrl(url('uploadVideo'));
		$this->assign('check_video_unique_url', url('checkVideoUnique'));
		$this->assign('self_url', url('video'));
		$this->assign($video_list);
		
		return view();
	}
	
}
