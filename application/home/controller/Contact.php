<?php
namespace app\home\controller;

class Contact extends Base
{
  	public function index()
    {
      $data = input();
      if(!empty($data['email'])){

        $content = '';
        $content .= 'Client name: ' . (empty($data['name'])?'':$this->StrFilter((string)$data['name'])) . '<br>';
        $content .= 'Client company: ' . (empty($data['company'])?'':$this->StrFilter((string)$data['company'])) . '<br>';
        $content .= 'Client telephone: ' . (empty($data['telephone'])?'':$this->StrFilter((string)$data['telephone'])) . '<br>';
        $content .= 'Client email: ' . (empty($data['email'])?'':$this->StrFilter((string)$data['email'])) . '<br>';
        $content .= 'Client message: ' . (empty($data['message'])?'':$this->StrFilter((string)$data['message'])) . '<br>';
        
        send_mail(config('smtp_username'), 'Mas Studio client contact', $content);
      }
		$this->assign(['map_url'=>config('map_url')]);
		  return view('contact/index');
    }
	
	private function StrFilter($str){
		// String
		if($str){
		   $str=str_replace("chr(9)","&nbsp;",$str);
		   $str=str_replace("chr(10)chr(13)","<br />",$str);
		   $str=str_replace("chr(10)","<br />",$str);
		   $str=str_replace("chr(13)","<br />",$str);
		   $str=str_replace("chr(32)","&nbsp;",$str);
		   $str=str_replace("chr(34)","&quot;",$str);
		   $str=str_replace("chr(39)","&#39;",$str);
		   $str=str_replace("script", "&#115cript",$str);
		   $str=str_replace("&","&amp;",$str);
		   $str=str_replace(";","&#59;",$str);
		   $str=str_replace("'","&#39;",$str);
		   $str=str_replace("<","&lt;",$str);
		   $str=str_replace(">","&gt;",$str);
		   $str=str_replace("#","&#40;",$str);
		   $str=str_replace("*","&#42;",$str);
		   $str=str_replace("--","&#45;&#45;",$str);
		   
		   $str=preg_replace("/insert/i", "",$str);
		   $str=preg_replace("/update/i", "",$str);
		   $str=preg_replace("/delete/i", "",$str);
		   $str=preg_replace("/select/i", "",$str);
		   $str=preg_replace("/drop/i", "",$str);
		   $str=preg_replace("/load_file/i", "",$str);
		   $str=preg_replace("/outfile/i", "",$str);
		   $str=preg_replace("/into/i", "",$str);
		   $str=preg_replace("/exec/i", "",$str);
		   $str=preg_replace("/ssc_/i", "",$str);
		   $str=preg_replace("/union/i", "",$str);
		   $str=preg_replace("/%/i", "",$str);
		   
		   if (get_magic_quotes_gpc()){
			  $str = str_replace("\\\"", "&quot;",$str);
			  $str = str_replace("\\''", "&#039;",$str);
		   }else{
			  $str = addslashes($str);
			  $str = str_replace("\"", "&quot;",$str);
			  $str = str_replace("'", "&#039;",$str);
			  
		   }
		   $str=mysql_escape_string($str);
		}
		return $str;
	}
	
}
