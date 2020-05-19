<?php
/**
 * mail config
**/
//this config will replace by database if stting it in admin platform
return [
    'debug'=> false, //true: send email to self
	'type'=> 'smtp',//Send email typ: smtp, maigun(TODO)
	'smtp'=> [
		'host' => 'smtp.126.com',
		'port' => 25,
		'username' => 'detu168168@126.com',
		'password' => '',
		'reply_to_email' => 'detu168168@126.com',
	],
	'extra_alert'=>[
		//'909485905@qq.com',
	],
];
