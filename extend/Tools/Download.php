<?php
namespace Tools;

class Download{
	
	public function outputNremove($file_path, $file_name)
	{
		$this->outPutFile($file_path, $file_name);
        unlink($file_path); //remove file 
	}
	
    //下载文件的功能
    public function outPutFile($file, $name, $file_type=''){
        $fileName = $name ? $name : pathinfo($file,PATHINFO_FILENAME);
        $filePath = $file;
        $fp = fopen($filePath,'rb');
        
        if(!$filePath || !$fp){
            header('HTTP/1.1 404 Not Found');
            echo "Error: 404 Not Found.";
            exit;
        }
        
        $fileName = $fileName .'.'. pathinfo($filePath,PATHINFO_EXTENSION);
        $encoded_filename = urlencode($fileName);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);
        
        header('HTTP/1.1 200 OK');
        header( "Pragma: public" );
        header( "Expires: 0" );
        $msie = pathinfo($filePath,PATHINFO_EXTENSION);
        if ($file_type == 'gif') {
            header("Content-type: image/gif");
        } else if ($file_type == 'png') {
            header("Content-type: image/png");
        } else if ($file_type == 'mp4') {
            header("Content-type: video/mpeg4");
        } else {
            header("Content-type: application/octet-stream");
        }
        //header("Content-type: application/" . empty($msie)?'octet-stream':$msie);
        header("Accept-Ranges: bytes");
        
        $ua = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/MSIE/", $ua)) {
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else if (preg_match("/Firefox/", $ua)) {
            header('Content-Disposition: attachment; filename*="utf8\'\'' . $fileName . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        }
        
        // ob_end_clean(); <--有些情况可能需要调用此函数
        // 输出文件内容
        fpassthru($fp);
        exit;


    }
	
}
