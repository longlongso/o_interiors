<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"D:\MyWork\www\www2020\o_interiors/application/home\view\home\index.html";i:1590480353;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\header.html";i:1590474010;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\script.html";i:1531065641;s:72:"D:\MyWork\www\www2020\o_interiors/application/home\view\base\footer.html";i:1590460259;}*/ ?>
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
    <title>OInteriors</title>
    <meta name="description" content="OInteriors
">
    <meta name="keywords" content="OInteriors
">
    <link href="<?php echo get_image_by_id($site_meta_icon); ?>" rel="shortcut icon" />
    <link rel="stylesheet" href="__STATIC__/css/foundation.min.css">
    <link rel="stylesheet" href="__STATIC__/css/app.css?v=1.0">
    <script src="__STATIC__/vendor/jquery.js"></script>
    <script src="__STATIC__/vendor/foundation.min.js"></script>
    <script src="__STATIC__/js/app.js?v=1.0"></script>
	<?php if ($lang_id == 2) { ?>
	<style>
		header .nav a {
			padding: 2px 18px;
		}
	</style>
	<?php } ?>
</head>
<?php if ($lang_id == 2) { $body_font = 'font-family: 微軟正黑體,Microsoft JhengHei,SimHei,STHeiti,Apple LiGothic Medium,LiHei Pro Medium,Century Gothic !important;'; } else { $body_font = 'font-family: Montserrat-Regular,Century Gothic,微軟正黑體,Microsoft JhengHei,SimHei,STHeiti,Apple LiGothic Medium,LiHei Pro Medium !important;'; } ?>
<body style="<?php echo $body_font; ?>">
    <header>
        <div class="grid-container" style="max-width: 2000px">
            <div>
				
				<span class="head_nav_tog_btn"><button class="menu-icon" type="button"></button></span>

                <a class="logo_con" href="index.html"><img class="logo" src="<?php echo get_image_by_id($site_logo); ?>" /></a>
				<div style="position: absolute; top: 1px; right: 4px; font-size: 14px">
					<a href="https://www.facebook.com/o.interiors" target="_blank"><img style="width: 40px; vertical-align: middle; margin-bottom: 10px;" src="__STATIC__/img/icon/facebook_icon.png" /></a>
					
					<a style="color: #fff" href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&lang=en-us">ENG </a> | 
					<a style="color: #fff" href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&lang=zh-hk"> 繁中</a>
					
				</div>
            </div>
			
			<div class="head_nav">
				<ul class="vertical menu accordion-menu" data-accordion-menu>
				  <li><a <?php if($controller_active=='index' ){ ?>class="is-active"<?php } ?> href="index.html"><?php echo \think\Lang::get('cate_about'); ?></a></li>
				  
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
					<a <?php if($controller_active=='index' ){ ?>class="active"<?php } ?> href="index.html"><?php echo \think\Lang::get('cate_about'); ?></a>
					
					<a <?php if($controller_active=='project' ){ ?>class="active"<?php } ?> href="project.html?type=new&first=1"><?php echo \think\Lang::get('cate_projects'); ?></a>
					<a <?php if($controller_active=='award' ){ ?>class="active"<?php } ?> href="award.html"><?php echo \think\Lang::get('cate_awards'); ?></a>
					
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
	.home-about p,.home-about span {
		<?php echo $body_font; ?>
	}
	header{
		position: absolute;
		width: 100%;
		top: 0;
		z-index: 3;
	}
</style>
<div class="owl-carousel owl-theme banner">
    <?php if(!empty($home_banner_1_img)): if(!empty($home_banner_1_link)){ ?>
		<a href="<?php echo $home_banner_1_link; ?>">
		<?php } ?>
		<img class="owl-lazy" data-src-retina="<?php echo get_image_by_id($home_banner_1_img); ?>" data-src="<?php echo get_image_by_id($home_banner_1_img); ?>" alt="" />
		<?php if(!empty($home_banner_1_link)){ ?>
		</a>
		<?php } endif; if(!empty($home_banner_2_img)): if(!empty($home_banner_2_link)){ ?>
		<a href="<?php echo $home_banner_2_link; ?>">
		<?php } ?>
		<img class="owl-lazy" data-src-retina="<?php echo get_image_by_id($home_banner_2_img); ?>" data-src="<?php echo get_image_by_id($home_banner_2_img); ?>" alt="" />
		<?php if(!empty($home_banner_2_link)){ ?>
		</a>
		<?php } endif; if(!empty($home_banner_3_img)): if(!empty($home_banner_3_link)){ ?>
		<a href="<?php echo $home_banner_3_link; ?>">
		<?php } ?>
		<img class="owl-lazy" data-src="<?php echo get_image_by_id($home_banner_3_img); ?>" alt="" />
		<?php if(!empty($home_banner_3_link)){ ?>
		</a>
		<?php } endif; if(!empty($home_banner_4_img)): if(!empty($home_banner_4_link)){ ?>
		<a href="<?php echo $home_banner_4_link; ?>">
		<?php } ?>
		<img class="owl-lazy" data-src="<?php echo get_image_by_id($home_banner_4_img); ?>" alt="" />
		<?php if(!empty($home_banner_4_link)){ ?>
		</a>
		<?php } endif; if(!empty($home_banner_5_img)): if(!empty($home_banner_5_link)){ ?>
		<a href="<?php echo $home_banner_5_link; ?>">
		<?php } ?>
		<img class="owl-lazy" data-src="<?php echo get_image_by_id($home_banner_5_img); ?>" alt="" />
		<?php if(!empty($home_banner_5_link)){ ?>
		</a>
		<?php } endif; ?>
</div>

<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell"><h3 class="text-center s_title"><?php echo \think\Lang::get('about'); ?></h3></div>
		<div class="large-6 cell">
			<img src="<?php echo get_image_by_id($home_about_image); ?>">
		</div>
		<div class="large-6 cell align-self-middle">
			<p style="font-size: 19px; color: #9e9e9e;">
				<?php if($lang_id==2){ ?>
					<?php echo $home_about_zh; }else{ ?>
					<?php echo $home_about_en; } ?>
			</p>
			<div class="text-right"><a href="news.html" style="color: #666;"><?php echo lang('read_more'); ?></a></div>
		</div>
		
    </div>

	<!-- <div class="grid-x grid-padding-x">
        <div class="large-12 cell"><h3 class="s_title"><?php echo \think\Lang::get('contact'); ?></h3></div>
		<div class="large-6 cell">
			<img src="static/img/googlemap.jpg">
		</div>
		<div class="large-6 cell align-self-middle">
			<h4 style="color:#9e9e9e;margin-top:10px;">OInteriors Ltd.</h4>
			<p style="font-size: 19px; color: #9e9e9e;">
				Address: <br>
						<b>Unit A, 21/F, DAN 6, NO.6 FUI YIU KOK STREET,TSUEN WAN,HK
						 荃灣灰窰角街6號 DAN6 21樓 A室</b><br>
				Tel: <b>+852 3612 4670</b><br>
				Fax: <b>+852 3612 4671</b><br>
				Facebook: <b>O Interiors</b><br>
				Whatsapp: <b>+852 5547 6974</b><br>
				Email: <b><a style="color: #9e9e9e;" href="mailto:info@ointeriorshk.com">info@ointeriorshk.com</a></b><br>
			</p>
		</div>
	</div> -->
	
    <br>
	
	<?php if(!empty($project_list)){ ?>
	<div class="grid-x grid-padding-x">
		<div class="large-12 cell"><h3 class="s_title"><?php echo \think\Lang::get('features_project'); ?></h3></div>
		<?php foreach($project_list as $project) { ?>
		<div class="large-3 medium-3 cell" style="padding: 0 6px">
			<div class="box-cell">
				<a href="project.html?id=<?php echo $project['id']; ?>" class="a-thum-port">
					<img style="margin-bottom: 0" class="thumbnail thum-port" src="<?php echo get_thumb_by_id($project['image'][0], 350, 350); ?>" alt="" />
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	
</div>



<link rel="stylesheet" href="__STATIC__/vendor/owlcarousel2/assets/owl.carousel.min.css">
<script src="__STATIC__/vendor/owlcarousel2/owl.carousel.min.js"></script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        items: 1,
        lazyLoad: true,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 13000,
		lazyEffect: '3000',
    });
</script>

<br>

<footer>
    <div class="f_nav">
        <a href="index.html"><?php echo \think\Lang::get('cate_about'); ?></a>
        
        <a href="project.html?type=new"><?php echo \think\Lang::get('cate_projects'); ?></a>
        <a href="award.html"><?php echo \think\Lang::get('cate_awards'); ?></a>
        <a href="column.html"><?php echo \think\Lang::get('cate_column'); ?></a>
        <a href="magazine.html"><?php echo \think\Lang::get('cate_magazine_interview'); ?></a>
        <a href="media.html"><?php echo \think\Lang::get('cate_media'); ?></a>
        <a href="contact.html"><?php echo \think\Lang::get('cate_contact'); ?></a>
    </div>
    <div class="text-center" style="padding-top:20px;">
		<a href="https://www.facebook.com/o.interiors" target="_blank"><img src="__STATIC__/img/icon/facebook_icon.png" /></a>
    </div>

    <div class="copyright">
        Copyright &copy;
        <?php echo date('Y'); ?> OInteriors.  All Rights Reserved
    </div>
</footer>
</body>

</html>