<?php

/**
 * File trait
**/
namespace app\common\traits\File;
use app\common\model\Image as ImageModel;

trait Image
{
	/* get image config */
	protected function imageConfig(){
		$setting = config('upload');
		if(!isset($setting['image']) || empty($setting['image']['save_path']) || empty($setting['image']['path'])){
			return error(lang('upload_image_config_error'));
		}
		$setting['image']['mime'] = isset($setting['image']['mime'])?explode('/',$setting['image']['mime'])[0]:'image';
		$setting['image']['ext'] = isset($setting['image']['ext'])?$setting['image']['ext']:'jpg,gif,png,jpeg,bmp';
		$setting['image']['size'] = isset($setting['image']['size'])?$setting['image']['size']:20*1024*1024;
		$setting['image']['replace'] = isset($setting['image']['replace'])?$setting['image']['replace']:true;
		return $setting['image'];
	}
	
	/* uploadImage action */
	public function uploadImage(){
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
						return error(lang('upload_image_size_error'));
					}
				}
			}
			return error(lang('file_select_empty'));
		}
		
		$setting = $this->imageConfig();
		
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
						$err_msg[] = lang('upload_image_format_error');
					}
					if(!$f->checkSize($setting['size'])){
						$err++;
						$e++;
						$err_msg[] = lang('upload_image_size_error');
					}
					
					if(!$e){
						$m5 = $f->md5();
						$s1 = $f->sha1();
						$tmp_info = $f->getInfo();
						
						$res = $this->checkImageUnique($m5, $s1);
						
						if(!$res['code']){
							$path = date('Ymd');
							$info = $f->move($setting['save_path'] . DS . $path, uniqid(), $setting['replace']);
							
							if($info){
								$name = $info->getFilename();
								$id = $this->saveImage(['path'=>$path, 'name'=>$name, 'md5'=>$m5, 'sha1'=>$s1, 'alias'=>$tmp_info['name']]);
								$res = ['id'=>$id, 'path'=>$setting['path'] . '/' . $path . '/' . $name];
							}else{
								$err++;
								$err_msg[] = lang('upload_image_error') . $f->getError();
							}
						}else{
							$this->updateImage($res['id'], ['alias'=>$tmp_info['name']]);
						}
						
						$data[] = $res;
					}
				}
				
			}else{
				
				if(strpos($file->getMime(), $setting['mime'])===false){
					$err++;
					$err_msg[] = lang('upload_image_format_error');
				}
				if(!$file->checkExt($setting['ext'])){
					$err++;
					$err_msg[] = lang('upload_image_format_error');
				}
				if(!$file->checkSize($setting['size'])){
					$err++;
					$err_msg[] = lang('upload_image_size_error');
				}
				
				if(!$err){
					$m5 = $file->hash('md5');
					$s1 = $file->hash('sha1');
					$tmp_info = $file->getInfo();
					
					$res = $this->checkImageUnique($m5, $s1);
					
					if(!$res['code']){
						$path = date('Ymd');
						
						$info = $file->move($setting['save_path'] . DS . $path, uniqid(), $setting['replace']);
						
						if($info){
							$name = $info->getFilename();
							$id = $this->saveImage(['path'=>$path, 'name'=>$name, 'md5'=>$m5, 'sha1'=>$s1, 'alias'=>$tmp_info['name']]);
							$res = ['id'=>$id, 'path'=>$setting['path'] . '/' . $path . '/' . $name];
						}else{
							$err++;
							$err_msg[] = lang('upload_image_error') . $f->getError();
						}
					}else{
						$this->updateImage($res['id'], ['alias'=>$tmp_info['name']]);
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
					return json_encode(['code'=>1, 'msg'=>lang('upload_image_success'), 'data'=>$data, 'url'=>'', 'wait'=>3]);
				}else{
					return success(lang('upload_image_success'), null, $data);
				}
			}
			
		}
		
	}
	
	/**
	 * check in table
	**/
	public function checkImageUnique($md5 = '', $sha1 = '', $data = ''){
		
		$setting = $this->imageConfig();
		$res = '';
		$imageModel = new ImageModel;
		if(!empty($md5) && !empty($sha1)){
			$res = $imageModel->field('id, path, name')->where(['md5'=>$md5, 'sha1'=>$sha1])->find();
		}else if(!empty($md5)){
			$res = $imageModel->field('id, path, name')->where('md5', $md5)->find();
		}else if(!empty($sha1)){
			$res = $imageModel->field('id, path, name')->where('sha1', $sha1)->find();
		}
		if(!empty($res)){
			$imageModel::where(['id'=>$res['id']])->update(['update_time'=>time()]);
			
			if(!empty($data) && is_string($data)){
				$this->updateImage($res['id'], ['alias'=>$data]);
			}
			
			return ['code'=>1, 'id'=>$res['id'], 'path'=>$setting['path'] . '/' . $res['path'] . '/' . $res['name'],  'md5'=>$md5, 'sha1'=>$sha1, 'data'=>$data];
		}else{
			return ['code'=>0, 'md5'=>$md5, 'sha1'=>$sha1, 'data'=>$data];
		}
		
	}
	
	/**
	 * @$id mixed (integer or array)
	**/
	protected function deleteImage($id = ''){
		if($id){
			$ImageModel = new ImageModel;
			
			if(is_array($id)){
				foreach($id as $i){
					$img = $ImageModel->where(['id'=>$i])->find();
					@unlink($this->imageConfig()['save_path'] . DS . $img['path'] . DS . $img['name']);
					
				}
			}else{
				$img = $ImageModel->where(['id'=>$id])->find();
				@unlink($this->imageConfig()['save_path'] . DS . $img['path'] . DS . $img['name']);
			}
			
			$ImageModel->deleteImage($id);
			return true;
		}
	}
	
	protected function saveImage($data)
	{
		if(!empty($data)){
			$data['status'] = 1;
			$data['create_time'] = $data['update_time'] = time();
			$imageModel = new ImageModel;
			$imageModel->allowField(true)->save($data);
			return $imageModel->id;
		}
	}
	
	protected function updateImage($id, $data)
	{
		$imageModel = new ImageModel;
		$imageModel->where(['id'=>$id])->update($data);
		return $id;
	}
	
	protected function getImageById($id){
		$imageModel = new ImageModel;
		$res = $imageModel->where('id', $id)->find();
		return empty($res)?'':$this->imageConfig()['path'] . '/' . $res['path'] . '/' . $res['name'];
	}
	
	/**
	 * get image by path and name
	**/
	protected function getImageByPathName($path = '', $name = ''){
		if(!empty($path) && !empty($name)){
			return $this->imageConfig()['path'] . '/' . $path . '/' .$name;
		}else if(!empty($path)){
			return $this->imageConfig()['path'] . '/' . $path;
		}
		return $path . '/' .$name;
	}
	
	protected function getImageList($limit=16, $map = []){
		$imageModel = new ImageModel;
		$map = empty($map)?['status'=>1]:array_merge($map, ['status'=>1]);
		$list = $imageModel->field('id, path, name, `alias`')->where($map)->order('alias, update_time desc, id desc')->paginate($limit);
		return ['image_list'=>$list, 'image_page'=>$list->render()];
	}
	
	/**
	 * get image local path by alias name
	*/
	public function getImageLocalPathByAlias($alias = ''){
		if(!empty($alias)){
			$imageModel = new ImageModel;
			$res = $imageModel->where(['alias'=>$alias])->order('update_time desc, id desc')->find();
			return empty($res)?'':$this->imageConfig()['save_path'] . '/' . $res['path'] . '/' . $res['name'];
		}else{
			return '';
		}
	}
	
	/**
	 * get image local path by id
	*/
	public function getImageLocalPathById($id = ''){
		if(!empty($id)){
			$imageModel = new ImageModel;
			$res = $imageModel->where(['id'=>$id])->find();
			return empty($res)?'':$this->imageConfig()['save_path'] . '/' . $res['path'] . '/' . $res['name'];
		}else{
			return '';
		}
	}
	
	protected function saveUniqueFile($path, $name)
	{
		$setting = $this->imageConfig();
		$file_path =  $setting['save_path'] . DS . $path . DS . $name;
		if(is_file($file_path)){
			$md5 = md5_file($file_path);
			$sha1 = sha1_file($file_path);
			$imageModel = new ImageModel;
			$res = $imageModel->field('id, path, name')->where(['md5'=>$md5, 'sha1'=>$sha1])->find();
			if(!empty($res)){
				$imageModel::where(['id'=>$res['id']])->update(['update_time'=>time()]);
				@unlink($file_path);
				
				return ['code'=>1, 'id'=>$res['id'], 'path'=>$setting['path'] . '/' . $res['path'] . '/' . $res['name'],  'md5'=>$md5, 'sha1'=>$sha1];
			}else{
				$imageModel->allowField(true)->save(['path'=>$path, 'name'=>$name, 'md5'=>$md5, 'sha1'=>$sha1, 'status'=>1, 'create_time'=>time(), 'update_time'=>time()]);
				
				return ['code'=>1, 'id'=>$imageModel->id, 'path'=>$setting['path'] . '/' . $path . '/' . $name,  'md5'=>$md5, 'sha1'=>$sha1];
			}
		}
		return false;
	}
	
	//copy cross-origin file
	protected function curlSaveImage($img_url){
		$setting = $this->imageConfig();
		$path = date('Ymd');
		$save_path = $setting['save_path'] . DS . $path;
		if(!is_dir($save_path)){
			mkdir($save_path, 0777, true);
		}
		
		$ch = curl_init ($img_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$rawdata=curl_exec($ch);
		curl_close ($ch);

		$name = $this->buildFileName($save_path, '.jpg');
		
		$file_path = $save_path . DS . $name;
		$fp = fopen($file_path, 'w');
		fwrite($fp, $rawdata);
		fclose($fp);
		
		return $this->saveUniqueFile($path, $name);
	}
	
	protected function buildFileName($path, $suffix = '')
	{
		$file_name = uniqid() . $suffix;
		if(is_file($path . DS . $file_name)){
			return $this->buildFileName($path, $suffix);
		}
		return $file_name;
	}
	
}