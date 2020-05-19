<?php
namespace Tools;

class Image {
	
	private $info;
	private $image;
	private $error = false;
	
	public function __construct($src) {
		$info = getimagesize($src);
		if(empty($info)){
			$this->error = 'is not a valid image file';
		}else{
			$this->info = array("width" => $info[0], "height" => $info[1], "type" => image_type_to_extension($info[2], false), "mime" => $info['mime']);
			$fun = "imagecreatefrom{$this->info['type']}";
			$this->image = $fun($src);
		}
		return $this;
	}
	
	public function thumb($width, $height) {
		if(!$this->error){
			$imageThumb = imagecreatetruecolor($width, $height);
			imagecopyresampled($imageThumb, $this->image, 0, 0, 0, 0, $width, $height, $this->info["width"], $this->info["height"]);
			imagedestroy($this->image);
			$this->image = $imageThumb;
		}
		return $this;
	}
	
	public function waterMarkText($text, $fontPath, $fontSize, $color, $x, $y, $angle) {
		if(!$this->error){
			$color = imagecolorallocatealpha($this->image, $color[0], $color[1], $color[2], $color[3]);
			imagettftext($this->image, $fontSize, $angle, $x, $y, $color, $fontPath, $text);
		}
		return $this;
	}
	
	public function waterMarkImage($source, $x, $y, $alpha) {
		if(!$this->error){
			$markInfo = getimagesize($source); 
			//3、获取水印图片类型 
			$markType = image_type_to_extension($markInfo[2], false); 
			//4、在内存创建图像 
			$markCreateImageFunc = "imagecreatefrom{$markType}"; 
			//5、把水印图片复制到内存中 
			$water = $markCreateImageFunc($source); 
			//特别处理，设置透明 
			//$color=imagecolorallocate($water,255,255,255);
			//imagefill($water,0,0,$color);
			//imagecolortransparent($water,$color); 
			//6、合并图片 
			imagecopymerge($this -> image, $water, $x, $y, 0, 0, $markInfo[0], $markInfo[1], $alpha); 
		}
		return $this;
	} 
	
	public function show() {
		if(!$this->error){
			header("Content-type:" . $this -> info['mime']);
			$outputfunc = "image{$this -> info['type']}"; 
			$outputfunc($this -> image); 
		}
	}
	
	public function save($newname, $path = '') {
		if(!$this->error){
			$outputfunc = "image{$this -> info['type']}";
			$outputfunc($this->image, $path . '/' . $newname . '.' . $this -> info['type']);
		}
	}
	
	public function __destruct() {
		if(!$this->error){
			imagedestroy($this -> image); 
		}
	}
	
} 
