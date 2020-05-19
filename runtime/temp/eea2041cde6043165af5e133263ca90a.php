<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:82:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\builder\builder_lists.html";i:1531065625;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\header.html";i:1531065623;s:70:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\head.html";i:1531065623;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\script.html";i:1531065623;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\footer.html";i:1531065623;}*/ ?>
<!doctype html>
<html class="no-js" lang="zh-hk" dir="ltr">
<head>
    
	
    <meta charset="UTF-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="renderer" content="webkit"/>
	
	<title>CMS</title>
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
<style>
.eg_stack {
	line-height: 1.1;
    font-size: .9rem;
	color: #000;
}
</style>

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
	

	<div class="content_body">
		<div class="row">
			<div class="con_header">
				<h3><?php echo (isset($title) && ($title !== '')?$title:''); ?></h3>
				<?php if(!empty($breadcrumbs)){ ?>
					<nav>
					  <ul class="breadcrumbs">
						<?php foreach($breadcrumbs as $bc){ if(empty($bc['href'])){ ?>
								<li><?php echo (isset($bc['title']) && ($bc['title'] !== '')?$bc['title']:''); ?></li>
							<?php }else{ ?>
								<li>
								<a href="<?php echo (isset($bc['href']) && ($bc['href'] !== '')?$bc['href']:'javascript:;'); ?>"><?php echo (isset($bc['title']) && ($bc['title'] !== '')?$bc['title']:''); ?></a>
								</li>
							<?php } } ?>
					  </ul>
					</nav>
				<?php } ?>
			</div>
			
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
			
			<form action="<?php echo (isset($action_url) && ($action_url !== '')?$action_url:''); ?>" method="post" enctype="multipart/form-data" class="eg_form builder_list">
				
				
				<?php echo (isset($buttons) && ($buttons !== '')?$buttons:''); if(empty($isGridView)){ ?>
				
					<div class="eg_list">
						<div class="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
						
						<table class="eg_stack">
						  <thead>
							<tr>
							  <th><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
							  <?php if(!empty($keys)){ foreach($keys as $key){ if(!empty($key['key']) && empty($key['hide'])){ if(!empty($key['sort'])){ 												$get_arr = request()->get();
												$get_arr['sort'] = $key['key'];
												$get_arr['order'] = empty($get_arr['order'])?'ASC':($get_arr['order']=='ASC'?'DESC':'ASC');
												$url_param = http_build_query($get_arr);
											?>
											
											<th <?php if($key['key']=='do'){ ?>class="text-right"<?php } ?>><a href="<?php echo url(); ?>?<?php echo $url_param; ?>"><?php echo (isset($key['title']) && ($key['title'] !== '')?$key['title']:''); if(!empty($_GET['sort']) && $_GET['sort']==$key['key'] && !empty($_GET['order'])){ if($_GET['order']=='ASC'){ ?>
													<i class="fa fa-sort-asc" aria-hidden="true"></i>
												<?php }else{ ?>
													<i class="fa fa-sort-desc" aria-hidden="true"></i>
												<?php } } ?>
											</a></th>
										<?php }else{ ?>
											<th <?php if($key['key']=='do'){ ?>class="text-right"<?php } ?>><?php echo (isset($key['title']) && ($key['title'] !== '')?$key['title']:''); ?></th>
										<?php } } } } ?>
							</tr>
						  </thead>
						  <tbody>
							<?php if(!empty($data['list'])){ ?>
								<?php echo $data['list']; } ?>
							
						  </tbody>
						</table>
						
					</div>
					
					<div id="page">
					<?php echo (isset($data['page']) && ($data['page'] !== '')?$data['page']:''); ?>
					</div>
					
				<?php }else{ ?>
					
					<div  class="eg_grid">
						<div class="loading">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						</div>
						
						<div class="row">
							<?php if(!empty($data['list'])){ ?>
								<?php echo $data['list']; } ?>
						</div>
						
						<div id="page">
							<?php echo (isset($data['page']) && ($data['page'] !== '')?$data['page']:''); ?>
						</div>
						
					</div>
					
				<?php } ?>
				
			</form>
		</div>
	</div>


<script>
/**
 * set meta title
**/
$('head title').text('<?php echo $meta_title; ?>');

$(function(){
	$('.eg_form, .eg_form form').submit(function(){
		$('.eg_form .loading').eq(0).show();
		var url = window.location.href;
		var pm = '';
		$('.egSearchForm *[name]').each(function(){
			if($(this).val()){
				pm += '&' + $(this).attr('name') + '=' + $(this).val();
			}
		});
		if(pm){
			if(url.indexOf('?')>-1){
				url += pm;
			}else{
				url += '?'+pm;
			}
			//window.location.href = url;
			getContent(url);
		}else{
			if(url.indexOf('&')>-1){
				//window.location.href = url.split('&')[0];
				getContent(url);
			}
		}
		setTimeout(function(){
			$('.eg_form .loading').eq(0).hide();
		},200);
		return false;
	});
	
	/* get list page */
	$('#page').on('click', 'a', function(){
		var pm = '';
		$('.egSearchForm *[name]').each(function(){
			if($(this).val()){
				pm += '&' + $(this).attr('name') + '=' + $(this).val();
			}
		});
		getContent($(this).attr('href')+'<?php $get_data = request()->get(); if(!empty($get_data)){ unset($get_data['page']); echo '&' . http_build_query($get_data); } ?>'+pm);
		return false;
	});
	
	<?php if(empty($isGridView)){ ?>
		function getContent(url){
			$('.eg_form .loading').show();
			$.get(url, function(res){
				$('.eg_form .loading').hide();
				$('.eg_form .eg_list table tbody').html(res.list);
				$('.eg_form #page').html(res.page);
			});
		}
	<?php }else{ ?>
		function getContent(url){
			$('.eg_grid .loading').show();
			$.get(url, function(res){
				$('.eg_grid .loading').hide();
				$('.eg_grid .row').html(res.list);
				$('.eg_grid #page').html(res.page);
			});
		}
		
		//select all
		$('.selectAll').click(function(){
			$('.eg_grid input[type="checkbox"]').prop("checked", true);
		});
		
	<?php } ?>
	
	//button group toggle
	$('.btnGroup .button').click(function(){
		if(!$(this).hasClass('delete_selected')){
			$('input[type="checkbox"]').prop("checked", false);
		}
		
		var sub_btn_id = $(this).data('for');
		
		if(sub_btn_id){
			if(!$(this).hasClass('active')){
				$('.btnGroup .button').removeClass('active');
				$('.subBtnGroup').slideUp();
				$('#'+sub_btn_id).slideDown();
				
				//manager active
				if($(this).hasClass('managerBtn') || $(this).hasClass('editBtn')){
					$('.eg_grid').addClass('active');
				}
				
				$(this).addClass('active');
				return false;
			}
		}
		
		$('.eg_grid').removeClass('active');
		$('.btnGroup .button').removeClass('active');
		$('.subBtnGroup').slideUp();
	});
	
	//delete a row
	$('.eg_form').on('click', '.delete', function(){
		var self = $(this);
		window.eg_confirm('<?php echo \think\Lang::get('confirm_delete'); ?>', function(res){
			if(res){
				$.get(self.attr('href'), function(res){
					if(res.code){
						window.success(res.msg);
					}else{
						window.error(res.msg);
					}
					getContent(window.location.href);
				});
			}
		}, '<?php echo \think\Lang::get('confirm'); ?>', '<?php echo \think\Lang::get('cancel'); ?>');
		return false;
	});
	
	//delete selected
	$('.button-group .delete_selected').click(function(){
		var self = $(this);
		var del = [];
		$('.eg_form input[name="selected[]"]:checked').each(function(){
			del[del.length] = $(this).val();
		});
		
		if(!del.length){
			window.error('<?php echo \think\Lang::get('please_select_delete_object'); ?>');
			return false;
		}
		
		window.eg_confirm('<?php echo \think\Lang::get('confirm_delete'); ?>', function(res){
			if(res){
				$.post(self.data('href'), {'id': del}, function(res){
					if(res.code){
						window.success(res.msg);
					}else{
						window.error(res.msg);
					}
					getContent(window.location.href);
				});
			}
		}, '<?php echo \think\Lang::get('confirm'); ?>', '<?php echo \think\Lang::get('cancel'); ?>');
		
	});
	
	//refresh page
	$('.button-group .refresh').click(function(){
		getContent(window.location.href);
	});
	$('.button-group .refresh').dblclick(function(){
		window.location.reload();
	});
	
	$('.egSearch').click(function(){
		if($(this).parent().hasClass('active')){
			self = $(this);
			self.parent().find('.eg_btn_form').animate({'width':'160px'}, function(){
				$(this).hide('fast', function(){
					self.parent().removeClass('active').removeClass('desktop');
				});
			});
		}else{
			
			if (Foundation.MediaQuery.atLeast('medium')) {
				if($('body').outerWidth(true)-$(this).offset().left>310){
					$(this).parent().addClass('desktop');
				}
			}
			
			$(this).parent().addClass('active').find('.eg_btn_form').css({'width':'160px', 'display':'inline-block'}).animate({'width':'300px'});
		}
	});
	
	$('.egSearch').each(function(){
		if($(this).hasClass('egSearchActive')){
			$(this).trigger('click');
		}
	});
	
	$('.egSearchForm *[type="reset"]').click(function(){
		url = window.location.href;
		//window.location.href = url.split('&')[0];
		getContent(url);
	});
	
	// button csv export
	$('#button-export').on('click', function() {
		window.open('<?php echo url('export_student'); ?>');
	});
	
	// button csv upload
	$('#button-upload').on('click', function() {
		$('#form-upload').remove();

		$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

		$('#form-upload input[name=\'file\']').trigger('click');

		if (typeof timer != 'undefined') {
			clearInterval(timer);
		}

		if (typeof(timer) != 'undefined' && timer) {
			clearInterval(timer);	
		}
		

		timer = setInterval(function() {
			if ($('#form-upload input[name=\'file\']').val() != '') {
				clearInterval(timer);

				$.ajax({
					url: '<?php echo url('import_students'); ?>',
					type: 'post',
					dataType: 'json',
					data: new FormData($('#form-upload')[0]),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function() {
						$('#button-upload').attr('disabled', 'disabled');
					},
					complete: function() {
						$('#button-upload').removeAttr('disabled');
					},
					success: function(json) {
						console.log(json);
						if (json['error']) {
							alert(json['error']);
						}else{
							alert('complete! ' + json['succ_info']);
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}
		}, 500);
	});
	
});
</script>

				
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