<?php
// Route rule
//route·s name can not use model name
//Route function replace module url 

use think\Route;

Route::rule([
    'index/'=>'home/index/index',
    'about/'=>'home/about/index',
	'project/'=>'home/project/index',
	'award/'=>'home/award/index',
	'client/'=>'home/client/index',
	'column/'=>'home/column/index',
	'magazine/'=>'home/magazine/index',
	'media/'=>'home/media/index',
	'contact/'=>'home/contact/index'
]);
