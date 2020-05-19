<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:77:"D:\MyWork\www\www2020\o_interiors/application/admin\view\dashboard\index.html";i:1531065628;s:73:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\header.html";i:1531065623;s:71:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\head.html";i:1531065623;s:73:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\script.html";i:1531065623;s:73:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\footer.html";i:1531065623;}*/ ?>
<!doctype html>
<html class="no-js" lang="zh-hk" dir="ltr">
<head>
    
	
    <meta charset="UTF-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="renderer" content="webkit"/>
	
	<title>Dashboard</title>
	<link href="__STATIC__/image/icon.png" rel="shortcut icon"/>
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<link rel="stylesheet" href="__STATIC__/vendor/toastr/toastr.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/foundation/foundation.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/OL_icon/OL_icon.css">
    
	<link rel="stylesheet" href="__STATIC__/admin/css/app.css">
	
	
</head>
<body class="body">
	
	<div class="off-canvas-wrapper">
	  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

		<!-- off-canvas title bar for 'small' screen -->
		<div class="title-bar m_head_bar" data-responsive-toggle="widemenu" data-hide-for="medium">
		  <div class="title-bar-left m_head_title">
			<button class="fa fa-indent fa-lg" type="button" data-open="offCanvasLeft"></button>
		  </div>
		  <div class="title-bar-left">
			<span class="title-bar-title">
				<a href="<?php echo url('dashboard/index'); ?>">
					<img class="m_logo" src="__STATIC__/image/reg.png"/>
				</a>
			</span>
		  </div>
		  <div class="title-bar-right m_head_title">
			<span class="title-bar-title"></span>
			<button class="fa fa-user" type="button" data-open="offCanvasRight"></button>
		  </div>
		</div>
		
			<!-- off-canvas left menu -->
		<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left">
			<ul class="vertical menu" data-accordion-menu="d1dztb-accordion-menu" role="tablist" aria-multiselectable="true">
				
				<?php echo get_menu(); ?>
				
			</ul>
		</div>
		
		<!-- off-canvas right menu -->
		<div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
			<ul class="vertical menu" data-accordion-menu="d1dztb-accordion-menu" aria-expanded="true" role="tablist" aria-multiselectable="true">
				<li><a href="<?php echo url('user/index'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo \think\Lang::get('user_center'); ?></a></li>
				<li><a href="<?php echo url('user/modifyPassword'); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> <?php echo \think\Lang::get('modify_password'); ?></a></li>
				<li><a class="logout" href="<?php echo url('auth/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo \think\Lang::get('logout'); ?></a></li>
			</ul>
		</div>

		<!-- "wider" top-bar menu for 'medium' and up -->
		<div id="widemenu" class="top-bar head_bar">
			<div class="top-bar-left">
				<div class="title-bar-left g_head_title">
					<button class="fa fa-indent fa-lg" id="toggleMenu" type="button"></button>
				</div>
				
				<a href="<?php echo url('dashboard/index'); ?>">
					<img class="logo" src="__STATIC__/image/reg.png"/>
				</a>
			</div>
			<div class="top-bar-right">
				<ul class="dropdown menu g_menu" data-dropdown-menu>
				  <li class="has-submenu">
					<a href="javascript:;"><i class="fa fa-user" aria-hidden="true"></i></a>
					<ul class="menu submenu vertical text-right" data-submenu>
						<li><a href="<?php echo url('user/index'); ?>"><?php echo \think\Lang::get('user_center'); ?></a></li>
						<li><a href="<?php echo url('user/modifyPassword'); ?>"><?php echo \think\Lang::get('modify_password'); ?></a></li>
						<li><a class="logout" href="<?php echo url('auth/logout'); ?>"><?php echo \think\Lang::get('logout'); ?> <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
					</ul>
				  </li>
				</ul>
			</div>
		</div>

		<!-- original content goes in this container -->
		<div class="off-canvas-content" data-off-canvas-content>
			
			<div class="col_left_menu">
			
				<ul class="vertical menu l_menu" id="largeMenu">
					
					<?php echo get_menu(); ?>
					
				</ul>
				
			</div>

	<div class="content_body">
		<div class="row">
			<div class="columns">
				<?php if(!empty($success_msg)){ ?>
				<div class="success callout">
					<span><?php echo (isset($success_msg) && ($success_msg !== '')?$success_msg:''); ?></span>
					<button class="close-button" data-close="" aria-label="Close reveal" type="button">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<?php } if(!empty($error_msg)){ ?>
				<div class="alert callout">
					<span><?php echo (isset($error_msg) && ($error_msg !== '')?$error_msg:''); ?></span>
					<button class="close-button" data-close="" aria-label="Close reveal" type="button">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			
			<div class="small-12 medium-12 large-4 columns">
				<div class="box_con">
					<div class="box_title"><?php echo \think\Lang::get('os_info'); ?></div>
					<div class="box_body">
						
						<table>
							<tr>
							  <td><?php echo \think\Lang::get('server_os'); ?></td>
							  <td><?php echo PHP_OS; ?></td>
							</tr>
							<?php 
							/*
							<tr>
							  <td><?php echo \think\Lang::get('disk_space'); ?></td>
							  <td><?php echo  get_web_disk_space_usage(); ?>/<?php echo get_web_disk_space(); ?></td>
							</tr>
							*/
							?>
							<tr>
							  <td><?php echo \think\Lang::get('server_software'); ?></td>
							  <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
							</tr>
							<tr>
							  <td><?php echo \think\Lang::get('db_info'); ?></td>
							  <td>
							  <?php
								$v = think\Db::query('select version() as v');
								echo config('database.type') . ' ' . $v[0]['v'];
							  ?>
							  </td>
							</tr>
							<?php 
							/*
							<tr>
							  <td><?php echo \think\Lang::get('db_size'); ?></td>
							  <td><?php echo  get_mysql_db_space_usage(); ?>/<?php echo get_database_space(); ?></td>
							</tr>
							*/
							?>
						</table>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	

	<!--[if lt IE 9]>
	<script type="text/javascript" src="__STATIC__/vendor/jquery/jquery-1.12.3.min.js"></script>
	<![endif]--><!--[if gte IE 9]><!-->
	<script type="text/javascript" src="__STATIC__/vendor/jquery/jquery-2.2.3.min.js"></script>
	<!--<![endif]-->
	<script src="__STATIC__/vendor/toastr/toastr.min.js"></script>
	<script src="__STATIC__/vendor/toastr/toastr.custom.js"></script>
	<script src="__STATIC__/vendor/foundation/foundation.min.js"></script>
	<script src="__STATIC__/js/cookie.js"></script>
	<script src="__STATIC__/js/getUrlVal.js"></script>
	<script src="__STATIC__/admin/js/app.js"></script>
	

				
				<div class="footer">
					<div class="row text-center">
						<span> Edgital &copy; All rights reserved. </span>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>

</html>