<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\MyWork\www\www2020\o_interiors/application/admin\view\auth\login.html";i:1584495909;s:71:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\head.html";i:1531065623;s:73:"D:\MyWork\www\www2020\o_interiors/application/admin\view\base\script.html";i:1531065623;}*/ ?>
<!doctype html>
<html class="no-js" lang="zh-hk" dir="ltr">
<head>
    
	
    <meta charset="UTF-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="renderer" content="webkit"/>
	
	<title>Admin login</title>
	<link href="__STATIC__/image/icon.png" rel="shortcut icon"/>
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<link rel="stylesheet" href="__STATIC__/vendor/toastr/toastr.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/foundation/foundation.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="__STATIC__/vendor/OL_icon/OL_icon.css">
    
	<link rel="stylesheet" href="__STATIC__/admin/css/app.css">
	
	<style>
	body{background-color: #3f5356;}
	</style>
	
</head>
<body class="body">

<div class="reg_body">

	<div class="reg_header text-center">
		<img src="__STATIC__/image/logo.png"/>
		<div class="text-center">
			<ul class="tabs c_tabs" data-tabs id="reg-tabs">
			  <li class="tabs-title is-active"><a href="#login_con" aria-selected="true"><?php echo \think\Lang::get('welcome_login'); ?></a></li>
			</ul>
		</div>
	</div>
	
	<div class="reg_content">
		
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
		
		<div class="tabs-content" data-tabs-content="reg-tabs">
		
		  <div class="tabs-panel is-active" id="login_con">
			<form id="loginForm" class="box_form" action="<?php echo url('login'); ?>" method="post">
				<div class="vl_line"></div>
				<div class="vr_line"></div>
				
				<div class="input-group <?php if(!empty($error['username'])){ ?> has-error<?php } ?>">
				  <span class="input-group-label">
					<span class="OL_icon_accout OL_icon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span></span>
				  </span>
				  <input class="input-group-field" type="text" placeholder="<?php echo \think\Lang::get('username_or_email'); ?>" value="<?php echo (isset($data['username']) && ($data['username'] !== '')?$data['username']:''); ?>" name="username" required>
				  <span class="input-group-label required"> &nbsp; </span>
				</div>
				<?php if(!empty($error['username'])){ ?>
				<div class="error_tips" for="username">
					<?php echo $error['username']; ?>
				</div>
				<?php } ?>
				
				<div class="input-group show_icon_box <?php if(!empty($error['password'])){ ?> has-error<?php } ?>">
				  <span class="input-group-label">
					<span class="OL_icon_key OL_icon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
				  </span>
				  <input class="input-group-field" type="password" placeholder="<?php echo \think\Lang::get('password'); ?>" name="password" required>
				  <span class="show_icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
				  <span class="input-group-label required"> &nbsp; </span>
				</div>
				<?php if(!empty($error['password'])){ ?>
				<div class="error_tips" for="password">
					<?php echo $error['password']; ?>
				</div>
				<?php } ?>
				
				<div class="input-group <?php if(!empty($error['captcha'])){ ?> has-error<?php } ?>">
				  <span class="input-group-label">
					<span class="OL_icon_verify OL_icon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
				  </span>
				  <input class="input-group-field" type="text" placeholder="<?php echo \think\Lang::get('captcha'); ?>" name="captcha" required>
				  <span class="input-group-label required"> &nbsp; </span>
				</div>
				<?php if(!empty($error['captcha'])){ ?>
				<div class="error_tips" for="captcha">
					<?php echo $error['captcha']; ?>
				</div>
				<?php } ?>
				
				<div class="text-center">
					<img class="captcha" src="<?php echo captcha_src(); ?>" alt="captcha"/>
				</div>
				
				<div class="text-center b-color remember_n_forget">
					<input id="remember" name="remember" type="checkbox"><label for="remember"><?php echo \think\Lang::get('remember_login'); ?></label>
					<a href="<?php echo url('recovery'); ?>" target="_blank"><?php echo \think\Lang::get('forget_password'); ?></a>
				</div>
				
				<div class="login_submit_btn text-center">
					<button type="submit" class="warning button">&nbsp; <?php echo \think\Lang::get('login'); ?> &nbsp;</button>
				</div>
				
				<div class="loading">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
				</div>
				
			</form>
		  </div>
		  
		</div>
		
	</div>
	
	<div class="footer">
		<div class="row text-center">
			<span> <?php echo copy_rights(); ?> </span>
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
	

<script type="text/javascript">

$(function(){
	$('.show_icon_box .show_icon').click(function(){
		if($(this).hasClass('in')){
			$(this).parent().find('input').attr('type', 'password');
			$(this).removeClass('in').html('<i class="fa fa-eye" aria-hidden="true"></i>');
		}else{
			$(this).parent().find('input').attr('type', 'text');
			$(this).addClass('in').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
		}
		
	});
	
	$('.captcha').click(function(){
		if($(this).attr('src').indexOf('&')==-1){
			window.captcha_src = $(this).attr('src')
		}
		if(window.captcha_src){
			if(window.captcha_src.indexOf('?')>-1){
				$('.captcha').attr('src', window.captcha_src + '&r=' + Math.random(2,4));
			}else{
				$('.captcha').attr('src', window.captcha_src + '?r=' + Math.random(2,4));
			}
		}else{
			if($(this).attr('src').indexOf('?')>-1){
				$('.captcha').attr('src', $(this).attr('src') + '&r=' + Math.random(2,4));
			}else{
				$('.captcha').attr('src', $(this).attr('src') + '?r=' + Math.random(2,4));
			}
		}
	});
	$('input[name="captcha"]').val('');
	$('.captcha').click();
	
	//login
	$('#loginForm').submit(function(){
		var self = $(this);
		self.find('.has-error').removeClass('has-error');
		self.find('.error_tips').remove();
		
		var data = self.serializeArray();
		var err = 0;
		for(i in data){
			if(!data[i]['value']){
				self.find('input[name="' + data[i]['name'] + '"]').parent().addClass('has-error');
				err++ ;
			}
		}
		
		if(err){
			window.error('<?php echo \think\Lang::get('red_mark_is_required'); ?>');
			return false;
		}
		
		self.find('.loading').show();
		$.post(self.attr('action'), data, function(res){
			self.find('.loading').hide();
			if(!res.code){
				//error
				$('.captcha').click();
				self.find('input[name="captcha"]').val('');
				window.error(res.msg);
				for(i in res.data.error){
					self.find('input[name="'+i+'"]').parent().addClass('has-error');
					self.find('input[name="'+i+'"]').parent().after('<div class="error_tips" for="'+i+'">'+res.data.error[i]+'</div>');
				}
				
			}else{
				//success
				window.success(res.msg);
				setTimeout(function(){
					location.href = res.url;
				}, 1000/2*res.wait);
			}
		});
		
		return false;
	});
	
});
</script>
	
</body>
</html>