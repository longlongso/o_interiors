<?php
/**
 * mail config
 * go to common/model/Image.php set image table_name
**/

return [
    'image'=>[
		'mime' => 'image/*',
		'ext' => 'jpg,gif,png,jpeg,bmp',
		'size' => 20*1024*1024,
		'save_path' => ROOT_PATH . 'storage' . DS . 'image',
		'path'=> SERVER_URL . INPUT_PATH . '/storage/image',
		'local_path'=> '/storage/image',
	],
	'video'=>[
		'mime' => 'video/*',
		'ext' => 'mp4',
		'size' => 20*1024*1024,
		'save_path' => ROOT_PATH . 'storage' . DS . 'video',
		'path'=> SERVER_URL . INPUT_PATH . '/storage/video',
		'local_path'=> '/storage/video',
	],
	'orderlook'=>[
		'save_path'=> ROOT_PATH . 'storage' . DS . 'orderlook',
		'path'=> SERVER_URL . INPUT_PATH . '/storage/orderlook',
	],
	'email'=>[
		'save_path'=> ROOT_PATH . 'storage' . DS . 'email',
		'path'=> SERVER_URL . INPUT_PATH . '/storage/email',
	],
	'coupon'=>[
		'save_path'=> ROOT_PATH . 'storage' . DS . 'coupon',
		'font_path'=> ROOT_PATH . 'static' . DS . 'font' . DS . 'ARIAL.TTF',
		'path'=> SERVER_URL . INPUT_PATH . '/storage/coupon',
		'root_path'=> ROOT_PATH,
	],
];
