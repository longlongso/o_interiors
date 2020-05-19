<?php

/**
 * File trait
**/
namespace app\common\traits\File;
use app\common\model\Video as VideoModel;

trait Video
{
	/* get video config */
	protected function videoConfig(){
		$setting = config('upload');
		if(!isset($setting['video']) || empty($setting['video']['save_path']) || empty($setting['video']['path'])){
			return error(lang('upload_video_config_error'));
		}
		$setting['video']['mime'] = isset($setting['video']['mime'])?explode('/',$setting['video']['mime'])[0]:'video';
		$setting['video']['ext'] = isset($setting['video']['ext'])?$setting['video']['ext']:'mp4';
		$setting['video']['size'] = isset($setting['video']['size'])?$setting['video']['size']:5*1024*1024;
		$setting['video']['replace'] = isset($setting['video']['replace'])?$setting['video']['replace']:true;
		return $setting['video'];
	}
	
	/* upload video action */
	public function uploadVideo(){
		if(!check_web_disk_usage()){
			return error(lang('disk_space_not_enough'));
		}
		if(!check_database_space_usage()){
			return error(lang('database_space_not_enough'));
		}
		
		$files = request()->file();
		
		if(!$files){
			if(!empty($_FILES)){
				foreach($_FILES as $file){
					if(isset($file['error']) && ($file['error']>0)){
						return error(lang('upload_video_size_error'));
					}
				}
			}
			return error(lang('file_select_empty'));
		}
		
		$setting = $this->videoConfig();
		
		$err = 0;
		$err_msg = [];
		$data = [];
		foreach($files as $file){
			
			if(is_array($file)){
				
				foreach($file as $f){
					
					$e = 0;
					if(strpos($f->getMime(), $setting['mime'])===false || !$f->checkExt($setting['ext'])){
						$err++;
						$e++;
						$err_msg[] = lang('upload_video_format_error');
					}
					if(!$f->checkSize($setting['size'])){
						$err++;
						$e++;
						$err_msg[] = lang('upload_video_size_error');
					}
					
					if(!$e){
						$m5 = $f->md5();
						$s1 = $f->sha1();
						$res = $this->checkVideoUnique($m5, $s1);
						
						if(!$res['code']){
							$path = date('Ymd');
							$info = $f->move($setting['save_path'] . DS . $path, uniqid(), $setting['replace']);
							
							if($info){
								$name = $info->getFilename();
								$id = $this->saveVideo(['path'=>$path, 'name'=>$name, 'md5'=>$m5, 'sha1'=>$s1]);
								$res = ['id'=>$id, 'path'=>$setting['path'] . '/' . $path . '/' . $name];
							}else{
								$err++;
								$err_msg[] = lang('upload_video_error') . $f->getError();
							}
						}
						$data[] = $res;
					}
				}
				
			}else{
				
				if(strpos($file->getMime(), $setting['mime'])===false){
					$err++;
					$err_msg[] = lang('upload_video_format_error');
				}
				if(!$file->checkExt($setting['ext'])){
					$err++;
					$err_msg[] = lang('upload_video_format_error');
				}
				if(!$file->checkSize($setting['size'])){
					$err++;
					$err_msg[] = lang('upload_video_size_error');
				}
				
				if(!$err){
					$m5 = $file->hash('md5');
					$s1 = $file->hash('sha1');
					
					$res = $this->checkVideoUnique($m5, $s1);
					
					if(!$res['code']){
						$path = date('Ymd');
						$info = $file->move($setting['save_path'] . DS . $path, uniqid(), $setting['replace']);
						
						if($info){
							$name = $info->getFilename();
							$id = $this->saveVideo(['path'=>$path, 'name'=>$name, 'md5'=>$m5, 'sha1'=>$s1]);
							$res = ['id'=>$id, 'path'=>$setting['path'] . '/' . $path . '/' . $name];
						}else{
							$err++;
							$err_msg[] = lang('upload_video_error') . $f->getError();
						}
					}
					$data[] = $res;
				}
			}
			
			if($err){
				if(request()->param('ajaxFileUpload')){
					return json_encode(['code'=>0, 'msg'=>lang('some_error', [$err]) . ' [ ' .  implode(',', $err_msg) . ' ] ', 'data'=>$data, 'url'=>'', 'wait'=>3]);
				}else{
					return error(lang('some_error', [$err]) . ' [ ' .  implode(',', $err_msg) . ' ] ', null, $data);
				}
			}else{
				if(request()->param('ajaxFileUpload')){
					return json_encode(['code'=>1, 'msg'=>lang('upload_video_success'), 'data'=>$data, 'url'=>'', 'wait'=>3]);
				}else{
					return success(lang('upload_video_success'), null, $data);
				}
			}
			
		}
		
	}
	
	/**
	 * check in table
	**/
	public function checkVideoUnique($md5 = '', $sha1 = '', $data = ''){
		$setting = $this->videoConfig();
		$res = '';
		$VideoModel = new VideoModel;
		if(!empty($md5) && !empty($sha1)){
			$res = $VideoModel->field('id, path, name')->where(['md5'=>$md5, 'sha1'=>$sha1])->find();
		}else if(!empty($md5)){
			$res = $VideoModel->field('id, path, name')->where('md5', $md5)->find();
		}else if(!empty($sha1)){
			$res = $VideoModel->field('id, path, name')->where('sha1', $sha1)->find();
		}
		if(!empty($res)){
			$VideoModel::where(['id'=>$res['id']])->update(['update_time'=>time()]);
			
			return ['code'=>1, 'id'=>$res['id'], 'path'=>$setting['path'] . '/' . $res['path'] . '/' . $res['name'],  'md5'=>$md5, 'sha1'=>$sha1, 'data'=>$data];
		}else{
			return ['code'=>0, 'md5'=>$md5, 'sha1'=>$sha1, 'data'=>$data];
		}
		
	}
	
	/**
	 * @$id mixed (integer or array)
	**/
	protected function deleteVideo($id = ''){
		if($id){
			$VideoModel = new VideoModel;
			
			if(is_array($id)){
				foreach($id as $i){
					$img = $VideoModel->where(['id'=>$i])->find();
					@unlink($this->videoConfig()['save_path'] . DS . $img['path'] . DS . $img['name']);
					
				}
			}else{
				$img = $VideoModel->where(['id'=>$id])->find();
				@unlink($this->videoConfig()['save_path'] . DS . $img['path'] . DS . $img['name']);
			}
			
			$VideoModel->deleteVideo($id);
			return true;
		}
	}
	
	protected function saveVideo($data)
	{
		if(!empty($data)){
			$data['status'] = 1;
			$data['create_time'] = $data['update_time'] = time();
			$VideoModel = new VideoModel;
			$VideoModel->allowField(true)->save($data);
			return $VideoModel->id;
		}
	}
	
	protected function getVideoById($id){
		$VideoModel = new VideoModel;
		$res = $VideoModel->where('id', $id)->find();
		return empty($res)?'':$this->videoConfig()['path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	
	/**
	 * get Video by path and name
	**/
	protected function getVideoByPathName($path = '', $name = ''){
		if(!empty($path) && !empty($name)){
			return $this->videoConfig()['path'] . '/' . $path . '/' .$name;
		}else if(!empty($path)){
			return $this->videoConfig()['path'] . '/' . $path;
		}
		return $path . '/' .$name;
	}
	
	protected function getVideoList($limit=16){
		$VideoModel = new VideoModel;
		$list = $VideoModel->field('id, path, name')->where('status',1)->order('update_time desc, id desc')->paginate($limit);
		return ['video_list'=>$list, 'video_page'=>$list->render()];
	}
	
}