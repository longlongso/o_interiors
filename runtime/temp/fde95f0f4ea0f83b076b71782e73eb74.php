<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\menu.html";i:1531065623;}*/ ?>
<?php 
		$controller_active = strtolower( request()->controller() );
		$get_arr = request()->get();
		$url_param = http_build_query($get_arr);
		$self_url = url() . '?' . $url_param;
	?>

<li class="has_submenu">
    <a href="#"><i class="fa fa-language" aria-hidden="true"></i> <span><?php echo \think\Lang::get('language'); ?></span></a>
    <ul class="menu submenu vertical" data-submenu>
        <li>
            <a href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&language=en-us"> EN</a></li>
        <li>
            <a href="<?php echo (isset($self_url) && ($self_url !== '')?$self_url:''); ?>&language=zh-hk"> ZH</a></li>
    </ul>
</li>

<li <?php if($controller_active=='dashboard' ){ ?>class="active"
    <?php } ?>><a href="<?php echo url('dashboard/index'); ?>"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i> <span><?php echo \think\Lang::get('dashboard'); ?></span></a></li>

<li class="has_submenu<?php if(strpos($controller_active, 'cms.')!==false){ ?> active<?php } ?>">
    <a href="#"><i class="fa fa-tags fa-fw" aria-hidden="true"></i> <span><?php echo \think\Lang::get('cms'); ?></span></a>
    <ul class="menu submenu vertical<?php if(strpos($controller_active, 'cms.')!==false){ ?> is-active<?php } ?>" data-submenu>
        <li <?php if($controller_active=='cms.home' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.home/index'); ?>"><?php echo \think\Lang::get('home'); ?></a></li>

        <li <?php if($controller_active=='cms.about' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.about/index'); ?>"><?php echo \think\Lang::get('about'); ?></a></li>

        <li <?php if($controller_active=='cms.project' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.project/index'); ?>"><?php echo \think\Lang::get('project'); ?></a></li>
        <li <?php if($controller_active=='cms.projectcategory' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.projectcategory/index'); ?>"><?php echo \think\Lang::get('project_category'); ?></a></li>

        <li <?php if($controller_active=='cms.award' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.award/index'); ?>"><?php echo \think\Lang::get('award'); ?></a></li>
        <!-- <li <?php if($controller_active=='cms.client' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.client/index'); ?>"><?php echo \think\Lang::get('client'); ?></a></li> -->
        <li <?php if($controller_active=='cms.column' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.column/index'); ?>"><?php echo \think\Lang::get('column'); ?></a></li>
        <li <?php if($controller_active=='cms.magazine' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.magazine/index'); ?>"><?php echo \think\Lang::get('magazine'); ?></a></li>
        <li <?php if($controller_active=='cms.media' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('cms.media/index'); ?>"><?php echo \think\Lang::get('media'); ?></a></li>
    </ul>
</li>

<?php /*
	<li class="<?php if($controller_active=='member'){ ?> active
<?php } ?>">
<a href="<?php echo url('member/index'); ?>">
    <i class="fa fa-user" aria-hidden="true"></i>
    <span><?php echo \think\Lang::get('member'); ?></span>
</a>
</li>

<li class="has_submenu<?php if(strpos($controller_active, 'extension.')!==false){ ?> active<?php } ?>">
    <a href="#"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> <span><?php echo \think\Lang::get('extension'); ?></span></a>
    <ul class="menu submenu vertical" data-submenu>
        <li <?php if($controller_active=='extension.gift' ){ ?>class="active"
            <?php } ?>>
            <a href="<?php echo url('extension.gift/index'); ?>"><i class="fa fa-gift" aria-hidden="true"></i> <?php echo \think\Lang::get('gift'); ?></a></li>
    </ul>
</li>


<li class="has_submenu<?php if($controller_active=='file'){ ?> active<?php } ?>">
    <a href="#"><i class="fa fa-file" aria-hidden="true"></i> <span><?php echo \think\Lang::get('file'); ?></span></a>
    <ul class="menu submenu vertical" data-submenu>
        <li <?php if($controller_active=='file' && request()->action()=='image'){ ?>class="active"
            <?php } ?>>
            <a href="<?php echo url('file/image'); ?>"><i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo \think\Lang::get('image_manager'); ?></a></li>

        <li <?php if($controller_active=='file' && request()->action()=='video'){ ?>class="active"
            <?php } ?>>
            <a href="<?php echo url('file/video'); ?>"><i class="fa fa-file-video-o" aria-hidden="true"></i></i> <?php echo \think\Lang::get('video_manager'); ?></a></li>

    </ul>
</li>
*/ ?>

<li class="has_submenu<?php if(strpos($controller_active, 'system.')!==false || strpos($controller_active, 'user.')!==false){ ?> active<?php } ?>">
    <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span><?php echo \think\Lang::get('system'); ?></span></a>
    <ul class="menu submenu vertical<?php if($controller_active=='system.setting' || $controller_active=='user.user' || $controller_active=='user.group'){ ?> is-active<?php } ?>" data-submenu>
        <li <?php if($controller_active=='system.setting' ){ ?>class="active"
            <?php } ?>><a href="<?php echo url('system.setting/index'); ?>"><?php echo \think\Lang::get('settings'); ?></a></li>

        <li class="has_submenu<?php if($controller_active=='user.group' || $controller_active=='user.user'){ ?> active<?php } ?>">
            <a href="#"><?php echo \think\Lang::get('user_manager'); ?></a>
            <ul class="menu submenu vertical<?php if($controller_active=='user.user' || $controller_active=='user.group'){ ?> is-active<?php } ?>" data-submenu>
                <li <?php if($controller_active=='user.user' ){ ?>class="active"
                    <?php } ?>>
                    <a href="<?php echo url('user.user/index'); ?>"> <i class="fa fa-user" aria-hidden="true"></i> <?php echo \think\Lang::get('user_list'); ?></a>
                </li>
                <li <?php if($controller_active=='user.group' ){ ?>class="active"
                    <?php } ?>>
                    <a href="<?php echo url('user.group/index'); ?>"> <i class="fa fa-users" aria-hidden="true"></i> <?php echo \think\Lang::get('user_group'); ?></a>
                </li>
            </ul>
        </li>
    </ul>
</li>