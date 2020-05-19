<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\about\index.html";i:1531065640;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\header.html";i:1531065641;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\script.html";i:1531065641;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\footer.html";i:1531065641;}*/ ?>
<?php 
$controller_active = strtolower( request()->controller() );
$get_arr = request()->get();
$url_param = http_build_query($get_arr);
$url_current = url();
$url_end = substr($url_current, -6);
if ($url_end == '/index') {
	$url_current = substr(url(), 0, -6) . '.html';
}
$self_url = $url_current . '?' . $url_param;
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit" />
    <title>Mas Studio</title>
    <meta name="description" content="Mas studio
">
    <meta name="keywords" content="Mas studio
">
    <link href="<?php echo get_image_by_id($site_meta_icon); ?>" rel="shortcut icon" />
    <link rel="stylesheet" href="__STATIC__/css/foundation.min.css">
    <link rel="stylesheet" href="__STATIC__/css/app.css">
    <script src="__STATIC__/vendor/jquery.js"></script>
    <script src="__STATIC__/vendor/foundation.min.js"></script>
    <script src="__STATIC__/js/app.js"></script>
	<?php if ($lang_id == 2) { ?>
	<style>
		header .nav a {
			padding: 2px 18px;
		}
	</style>
	<?php } ?>
</head>
<?php if ($lang_id == 2) { $body_font = 'font-family: 微軟正黑體,Microsoft JhengHei,SimHei,STHeiti,Apple LiGothic Medium,LiHei Pro Medium,Century Gothic !important;'; } else { $body_font = 'font-family: Century Gothic,微軟正黑體,Microsoft JhengHei,SimHei,STHeiti,Apple LiGothic Medium,LiHei Pro Medium !important;'; } ?>
<body style="<?php echo $body_font; ?>">
    <header>
        <div class="grid-container" style="max-width: 2000px">
            <div class="text-center">
				<span class="head_nav_tog_btn"><button class="menu-icon" type="button"></button></span>
                <a href="index.html"><img class="logo" src="<?php echo get_image_by_id($site_logo); ?>" /></a>
				<div style="position: absolute; top: 1px; right: 4px; font-size: 14px">
					<a style="color: #000" href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&lang=en-us">ENG </a>
					<a style="color: #000" href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&lang=zh-hk">/ 繁中</a>
				</div>
            </div>
			<div class="head_nav">
			<ul class="vertical menu accordion-menu" data-accordion-menu>
			  <li><a <?php if($controller_active=='index' ){ ?>class="is-active"<?php } ?> href="index.html"><?php echo \think\Lang::get('cate_home'); ?></a></li>
			  <li><a <?php if($controller_active=='about' ){ ?>class="is-active"<?php } ?> href="about.html"><?php echo \think\Lang::get('cate_about'); ?></a></li>
			  <li><a <?php if($controller_active=='project' ){ ?>class="is-active"<?php } ?> href="project.html?type=new&first=1"><?php echo \think\Lang::get('cate_projects'); ?></a></li>
			  <li><a <?php if($controller_active=='award' ){ ?>class="is-active"<?php } ?> href="award.html"><?php echo \think\Lang::get('cate_awards'); ?></a></li>
			  <li><a <?php if($controller_active=='column' ){ ?>class="is-active"<?php } ?> href="column.html"><?php echo \think\Lang::get('cate_column'); ?></a></li>
			  <li><a <?php if($controller_active=='magazine' ){ ?>class="is-active"<?php } ?> href="magazine.html"><?php echo \think\Lang::get('cate_magazine_interview'); ?></a></li>
			  <li><a <?php if($controller_active=='media' ){ ?>class="is-active"<?php } ?> href="media.html"><?php echo \think\Lang::get('cate_media'); ?></a></li>
			  <li><a <?php if($controller_active=='contact' ){ ?>class="is-active"<?php } ?> href="contact.html"><?php echo \think\Lang::get('cate_contact'); ?></a></li>
			</ul>
			</div>
            <div class="nav pc-nav-box">
				<div class="pc-nav">
                <a <?php if($controller_active=='index' ){ ?>class="active"<?php } ?> href="index.html"><?php echo \think\Lang::get('cate_home'); ?></a>
                <a <?php if($controller_active=='about' ){ ?>class="active"<?php } ?> href="about.html"><?php echo \think\Lang::get('cate_about'); ?></a>
                <a <?php if($controller_active=='project' ){ ?>class="active"<?php } ?> href="project.html?type=new&first=1"><?php echo \think\Lang::get('cate_projects'); ?></a>
                <a <?php if($controller_active=='award' ){ ?>class="active"<?php } ?> href="award.html"><?php echo \think\Lang::get('cate_awards'); ?></a>
                <!-- <a <?php if($controller_active=='client' ){ ?>class="active"<?php } ?> href="client.html"><?php echo \think\Lang::get('cate_client'); ?></a> -->
                <a <?php if($controller_active=='column' ){ ?>class="active"<?php } ?> href="column.html"><?php echo \think\Lang::get('cate_column'); ?></a>
                <a <?php if($controller_active=='magazine' ){ ?>class="active"<?php } ?> href="magazine.html"><?php echo \think\Lang::get('cate_magazine_interview'); ?></a>
                <a <?php if($controller_active=='media' ){ ?>class="active"<?php } ?> href="media.html"><?php echo \think\Lang::get('cate_media'); ?></a>
                <a <?php if($controller_active=='contact' ){ ?>class="active"<?php } ?> href="contact.html"><?php echo \think\Lang::get('cate_contact'); ?></a>
				</div>
            </div>
        </div>
		<script>
			$(function() {
				resize_to_fit();
			});
			
			function resize_to_fit() {
				if ($(window).width() > 650) {
					var pc_nav_height = $('.nav .pc-nav').height();
					var nav_padleft = $('.pc-nav a').css('padding-left');
					$('.pc-nav a').css('padding-left', parseFloat(nav_padleft) + 1);
					$('.pc-nav a').css('padding-right', parseFloat(nav_padleft) + 1);
					var pc_nav_box = $('.pc-nav-box').width();
					var pc_nav_width = $('.nav .pc-nav').width();
					if ($('.nav .pc-nav').height() > pc_nav_height) {
						$('.pc-nav a').css('padding-left', parseFloat(nav_padleft) - 1);
						$('.pc-nav a').css('padding-right', parseFloat(nav_padleft) - 1);
					} else {
						if (pc_nav_box > pc_nav_width) {
							resize_to_fit();
						}
					}
				}
			}
		</script>
    </header>
<style>
	.about-detail {
		padding-right: 6% !important;
		padding-left: 6% !important;
	}
	.about-detail p,.about-detail span {
		<?php echo $body_font; ?>
		margin: 0 !important;
		line-height: 1.6 !important;
	}
	.about-detail table tbody { border: none; }
	@media screen and (max-width: 640px) {
		.about-detail {
			padding-right: .9375rem !important;
			padding-left: .9375rem !important;
		}
		.about-detail table {
			float: none !important;
			margin: 0 auto;
			text-align: center;
		}
	}
</style>
<div class="grid-container">
    <ul class="breadcrumbs">
        <li>
            <a class="link" href="index.html"><?php echo \think\Lang::get('cate_home'); ?></a>
        </li>
        <li><?php echo \think\Lang::get('cate_about'); ?></li>
    </ul>

    <div class="grid-x grid-padding-x">
        <div class="large-12 cell about-detail">
            <p class="about">
                <?php echo $about; ?>
            </p>
        </div>
    </div>
</div>

 <br>

<footer>
    <div class="f_nav">
        <a href="index.html"><?php echo \think\Lang::get('cate_home'); ?></a>
        <a href="about.html"><?php echo \think\Lang::get('cate_about'); ?></a>
        <a href="project.html?type=new"><?php echo \think\Lang::get('cate_projects'); ?></a>
        <a href="award.html"><?php echo \think\Lang::get('cate_awards'); ?></a>
        <!-- <a href="client.html"><?php echo \think\Lang::get('cate_client'); ?></a> -->
        <a href="column.html"><?php echo \think\Lang::get('cate_column'); ?></a>
        <a href="magazine.html"><?php echo \think\Lang::get('cate_magazine_interview'); ?></a>
        <a href="media.html"><?php echo \think\Lang::get('cate_media'); ?></a>
        <a href="contact.html"><?php echo \think\Lang::get('cate_contact'); ?></a>
    </div>
    <div class="text-center">
		<a href="https://www.youtube.com/channel/UCO3kxhBJzLq02A2hqgswvSA" target="_blank"><img src="__STATIC__/img/icon/01.png" /></a>
        <a href="https://www.pinterest.com/masstudiohk/pins/" target="_blank"><img src="__STATIC__/img/icon/02.png" /></a>
		<a href="https://www.facebook.com/MasStudioLtd/" target="_blank"><img src="__STATIC__/img/icon/03.png" /></a>
        <a href="https://twitter.com/masstudiohk" target="_blank"><img src="__STATIC__/img/icon/04.png" /></a>
		<a href="https://www.instagram.com/masstudiohk/" target="_blank"><img src="__STATIC__/img/icon/05.png" /></a>
    </div>

    <div class="copyright">
        Copyright &copy;
        <?php echo date('Y'); ?> Mas studio Ltd. All Rights Reserved
    </div>
</footer>
</body>

</html>