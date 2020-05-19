<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\builder\builder_form.html";i:1531065625;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\header.html";i:1531065623;s:70:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\head.html";i:1531065623;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\script.html";i:1531065623;s:72:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\base\footer.html";i:1531065623;}*/ ?>
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

        <form action="<?php echo (isset($action_url) && ($action_url !== '')?$action_url:''); ?>" method="post" enctype="multipart/form-data" class="eg_form builder_form">
            <div class="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>

            <div class="button-group">
                <?php echo (isset($buttons) && ($buttons !== '')?$buttons:''); ?>
            </div>
            <?php $tabs_count = 0; builder_tabs(empty($tabs_lable)?'':$tabs_lable, empty($tabs_content)?'':$tabs_content, empty($form_keys)?'':$form_keys,  !empty($tabs_data)?$tabs_data:(empty($data)?[]:$data), $tabs_count); ?>

        </form>
    </div>
</div>


<?php function builder_tabs($tabs_lable, $tabs_content, $form_keys, $data, &$tabs_count){ ?>

<ul class="tabs" data-tabs id="layout-tabs<?php echo $tabs_count; ?>">
    <?php if(!empty($tabs_lable)){ foreach($tabs_lable as $k=>$lable){ ?>
    <li class="tabs-title<?php if($k==0){ ?> is-active<?php } if(isset($lable['active']) && $lable['active']){ ?> in_active<?php } ?>"><a href="#panel_<?php echo (isset($lable['code']) && ($lable['code'] !== '')?$lable['code']:$k); ?>" aria-selected="true"><?php echo (isset($lable['title']) && ($lable['title'] !== '')?$lable['title']:$k); ?></a></li>
    <?php } } ?>
</ul>

<div class="tabs-content" data-tabs-content="layout-tabs<?php echo $tabs_count; ?>">

    <?php $tabs_count++; if(!empty($tabs_content)){ foreach($tabs_content as $k=>$t_content){ ?>
    <div class="tabs-panel<?php if($k==$tabs_lable[0]['code']){ ?> is-active<?php } ?>" id="panel_<?php echo $k; ?>">

        <?php 
						if(!empty($t_content['form'])){
							builder_form($t_content['form'], empty($data[$k])?$data:$data[$k], $tabs_count);
						}
					?>

    </div>
    <?php } }else if(!empty($form_keys)){ 
				
				$n = 0;
				foreach($form_keys as $k=>$forms){
				
					$class = '';
					if(!empty($tabs_lable[0]['code'])){
						
						if($k==$tabs_lable[0]['code']){
							$class = ' is-active';
						}
						
					}else{
						if($n==0){
							$class = ' is-active';
						}
						$n++;
					}
					
			?>

    <div class="tabs-panel<?php echo $class; ?>" id="panel_<?php echo $k; ?>">
        <?php 
					if(!empty($forms['form'])){
                        builder_form($forms['form'], empty($data)?[]:$data, $tabs_count);
                    }
				?>
    </div>
    <?php } } ?>

</div>

<?php } function builder_form($form_keys, $data, &$tabs_count){ if(!empty($form_keys)){ if(!empty($form_keys['action'])){ ?>
<form class="form_<?php echo md5($form_keys['action']); ?>" action="<?php echo (isset($form_keys['action']) && ($form_keys['action'] !== '')?$form_keys['action']:''); ?>" method="post" enctype="multipart/form-data">
    <?php } if(!empty($form_keys['keys'])){ foreach($form_keys['keys'] as $f_key){ switch ($f_key['type']) { case 'hidden': ?>
    <label class="hide">
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
						  <input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						</label>
    <?php break; case 'text': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="text" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>" disabled="disabled"/>
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						  <?php }else{ ?>
							<input type="text" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php break; case 'email': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="email" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>" disabled="disabled"/>
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						  <?php }else{ ?>
							<input type="email" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php break; case 'password': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="password" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>" disabled="disabled"/>
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						  <?php }else{ ?>
							<input type="password" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php break; case 'number': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="number" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>" disabled="disabled"/>
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						  <?php }else{ ?>
							<input type="number" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php break; case 'ip': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); $ip_value = isset($data[$f_key['name']])?long2ip((int)$data[$f_key['name']]):''; if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="text" value="<?php echo $ip_value; ?>" disabled="disabled"/>
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo $ip_value; ?>"/>
						  <?php }else{ ?>
							<input type="text" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo $ip_value; ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php break; case 'date': ?>
    <div>
        <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
        <input type="text" value="<?php echo empty($data[$f_key['name']])?'':date('Y-m-d', $data[$f_key['name']]); ?>" disabled="disabled" />
        <input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo empty($data[$f_key['name']])?'':date('Y-m-d', $data[$f_key['name']]); ?>" />
        <?php }else{ ?>
        <input class="date" type="text" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo empty($data[$f_key['name']])?'':date('Y-m-d', $data[$f_key['name']]); ?>" <?php if(!empty($f_key[ 'required'])){ ?> data-required="required"
        <?php } ?>/>
        <?php } ?>
    </div>
    <?php break; case 'date-range': case 'date_range': ?>
    <div class="date-range-tool">
        <div>
            <?php echo (isset($f_key['from']['title']) && ($f_key['from']['title'] !== '')?$f_key['from']['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
            <input type="text" value="<?php echo empty($data[$f_key['from']['name']])?'':date('Y-m-d', $data[$f_key['from']['name']]); ?>" disabled="disabled" />
            <input type="hidden" name="<?php echo (isset($f_key['from']['name']) && ($f_key['from']['name'] !== '')?$f_key['from']['name']:''); ?>" value="<?php echo empty($data[$f_key['from']['name']])?'':date('Y-m-d', $data[$f_key['from']['name']]); ?>" />
            <?php }else{ ?>
            <input class="date-range" data-range="from" type="text" name="<?php echo (isset($f_key['from']['name']) && ($f_key['from']['name'] !== '')?$f_key['from']['name']:''); ?>" placeholder="<?php echo (isset($f_key['from']['title']) && ($f_key['from']['title'] !== '')?$f_key['from']['title']:''); ?>" value="<?php echo empty($data[$f_key['from']['name']])?'':date('Y-m-d', $data[$f_key['from']['name']]); ?>" <?php
                if(!empty($f_key[ 'required'])){ ?> data-required="required"
            <?php } ?>/>
            <?php } ?>
        </div>
        <div>
            <?php echo (isset($f_key['to']['title']) && ($f_key['to']['title'] !== '')?$f_key['to']['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
            <input type="text" value="<?php echo empty($data[$f_key['to']['name']])?'':date('Y-m-d', $data[$f_key['to']['name']]); ?>" disabled="disabled" />
            <input type="hidden" name="<?php echo (isset($f_key['to']['name']) && ($f_key['to']['name'] !== '')?$f_key['to']['name']:''); ?>" value="<?php echo empty($data[$f_key['to']['name']])?'':date('Y-m-d', $data[$f_key['to']['name']]); ?>" />
            <?php }else{ ?>
            <input class="date-range" data-range="to" type="text" name="<?php echo (isset($f_key['to']['name']) && ($f_key['to']['name'] !== '')?$f_key['to']['name']:''); ?>" placeholder="<?php echo (isset($f_key['to']['title']) && ($f_key['to']['title'] !== '')?$f_key['to']['title']:''); ?>" value="<?php echo empty($data[$f_key['to']['name']])?'':date('Y-m-d', $data[$f_key['to']['name']]); ?>" <?php if(!empty($f_key[
                'required'])){ ?> data-required="required"
            <?php } ?>/>
            <?php } ?>
        </div>
    </div>
    <?php break; case 'time-range': case 'time_range': ?>
    <div class="time-range-tool">
        <div>
            <?php echo (isset($f_key['from']['title']) && ($f_key['from']['title'] !== '')?$f_key['from']['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
            <input type="text" value="<?php echo empty($data[$f_key['from']['name']])?'':$data[$f_key['from']['name']]; ?>" disabled="disabled" />
            <input type="hidden" name="<?php echo (isset($f_key['from']['name']) && ($f_key['from']['name'] !== '')?$f_key['from']['name']:''); ?>" value="<?php echo empty($data[$f_key['from']['name']])?'':$data[$f_key['from']['name']]; ?>" />
            <?php }else{ ?>
            <input class="time-range" data-range="from" type="hidden" name="<?php echo (isset($f_key['from']['name']) && ($f_key['from']['name'] !== '')?$f_key['from']['name']:''); ?>" value="<?php echo empty($data[$f_key['from']['name']])?'':$data[$f_key['from']['name']]; ?>" <?php if(!empty($f_key[ 'required'])){ ?> data-required="required"
            <?php } ?>/>

            <select class="hour" data-range="from" style="display:inline-block;width:auto;">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
								</select> :
            <select class="minutes" data-range="from" style="display:inline-block;width:auto;">
									<option>00</option>
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
									<option>33</option>
									<option>34</option>
									<option>35</option>
									<option>36</option>
									<option>37</option>
									<option>38</option>
									<option>39</option>
									<option>40</option>
									<option>41</option>
									<option>42</option>
									<option>43</option>
									<option>44</option>
									<option>45</option>
									<option>46</option>
									<option>47</option>
									<option>48</option>
									<option>49</option>
									<option>50</option>
									<option>51</option>
									<option>52</option>
									<option>53</option>
									<option>54</option>
									<option>55</option>
									<option>56</option>
									<option>57</option>
									<option>58</option>
									<option>59</option>
								</select>

            <?php } ?>
        </div>
        <div>
            <?php echo (isset($f_key['to']['title']) && ($f_key['to']['title'] !== '')?$f_key['to']['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
            <input type="text" value="<?php echo empty($data[$f_key['to']['name']])?'':$data[$f_key['to']['name']]; ?>" disabled="disabled" />
            <input type="hidden" name="<?php echo (isset($f_key['to']['name']) && ($f_key['to']['name'] !== '')?$f_key['to']['name']:''); ?>" value="<?php echo empty($data[$f_key['to']['name']])?'':$data[$f_key['to']['name']]; ?>" />
            <?php }else{ ?>
            <input class="time-range" data-range="to" type="hidden" name="<?php echo (isset($f_key['to']['name']) && ($f_key['to']['name'] !== '')?$f_key['to']['name']:''); ?>" value="<?php echo empty($data[$f_key['to']['name']])?'':$data[$f_key['to']['name']]; ?>" <?php if(!empty($f_key[ 'required'])){ ?> data-required="required"
            <?php } ?>/>

            <select class="hour" data-range="to" style="display:inline-block;width:auto;">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
								</select> :
            <select class="minutes" data-range="to" style="display:inline-block;width:auto;">
									<option>00</option>
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
									<option>33</option>
									<option>34</option>
									<option>35</option>
									<option>36</option>
									<option>37</option>
									<option>38</option>
									<option>39</option>
									<option>40</option>
									<option>41</option>
									<option>42</option>
									<option>43</option>
									<option>44</option>
									<option>45</option>
									<option>46</option>
									<option>47</option>
									<option>48</option>
									<option>49</option>
									<option>50</option>
									<option>51</option>
									<option>52</option>
									<option>53</option>
									<option>54</option>
									<option>55</option>
									<option>56</option>
									<option>57</option>
									<option>58</option>
									<option>59</option>
								</select>

            <?php } ?>
        </div>
    </div>
    <?php break; case 'textarea': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<textarea style="display:none;" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" rows="3"><?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?></textarea>
							<div class="textarea">
								<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>
							</div>
						  <?php }else{ ?>
							<textarea name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" rows="3" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>><?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?></textarea>
						  <?php } ?>
						</label>
    <?php break; case 'editor': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<textarea style="display:none;" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" rows="3"><?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?></textarea>
							<div class="textarea">
								<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>
							</div>
						  <?php }else{ ?>
							<textarea class="editor" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" rows="3" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>><?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?></textarea>
						  <?php } ?>
						</label>
    <?php break; case 'custom': case 'html': case 'custom_html': ?>
    <div>
        <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
        <div>
            <?php echo (isset($f_key['content']) && ($f_key['content'] !== '')?$f_key['content']:''); ?> <?php echo (isset($f_key['html']) && ($f_key['html'] !== '')?$f_key['html']:''); 
								if(isset($f_key['name']) && !empty($f_key['name'])){
									echo (isset($data[$f_key['name']]) && !empty($data[$f_key['name']]))?$data[$f_key['name']]:''; 
								}
							?>
        </div>
    </div>
    <?php break; case 'select': ?>
    <label><?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
							<select <?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?> disabled="disabled"<?php }else{ ?> name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>"<?php } if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?> data-value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>">
								<?php if(!empty($f_key['options'])){ foreach($f_key['options'] as $opt){ 
										$selected = '';
										if(isset($data[$f_key['name']])){
											
											if(isset($opt['value'])){
												if($opt['value']==$data[$f_key['name']]){
													$selected = 'selected';
												}
											}else if(isset($opt['title'])){
												if($opt['title']==$data[$f_key['name']]){
													$selected = 'selected';
												}
											}
											
										}
										
									?>
									
									<option value="<?php echo (isset($opt['value']) && ($opt['value'] !== '')?$opt['value']:''); ?>"<?php echo $selected; ?>><?php echo (isset($opt['title']) && ($opt['title'] !== '')?$opt['title']:''); ?></option>
								<?php } } ?>
							</select>
							<?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
								<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
							<?php } ?>
						</label>
    <?php break; case 'combobox': ?>
    <label><?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
							<select class="combobox" <?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?> disabled="disabled"<?php }else{ ?> name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>"<?php } if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?> data-value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>">
								<?php if(!empty($f_key['options'])){ foreach($f_key['options'] as $opt){ 
										$selected = '';
										if(isset($data[$f_key['name']])){
											
											if(isset($opt['value'])){
												if($opt['value']==$data[$f_key['name']]){
													$selected = 'selected';
												}
											}else if(isset($opt['title'])){
												if($opt['title']==$data[$f_key['name']]){
													$selected = 'selected';
												}
											}
											
										}
										
									?>
									
									<option value="<?php echo (isset($opt['value']) && ($opt['value'] !== '')?$opt['value']:''); ?>"<?php echo $selected; ?>><?php echo (isset($opt['title']) && ($opt['title'] !== '')?$opt['title']:''); ?></option>
								<?php } } ?>
							</select>
							<?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
								<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
							<?php } ?>
						</label>
    <?php break; case 'checkbox': ?>
    <label>
							<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
							<div class="checkbox_group">
								<?php if(!empty($f_key['options'])){ ?>
									<a class="select_all" href="javascript:;"><?php echo \think\Lang::get('select_all'); ?></a> / <a class="unselect_all" href="javascript:;"><?php echo \think\Lang::get('unselect_all'); ?></a>
									<?php foreach($f_key['options'] as $opt){ ?>
									<label>
										
										<?php
											if(!isset($opt['title']) && isset($opt['name'])){
												$opt['title'] = $opt['name'];
											}
											if(!isset($opt['value'])){
												if(isset($opt['id'])){
													$opt['value'] = $opt['id'];
												}else{
													$opt['value'] = $opt['name'];
												}
											}
											
											$checked = '';
											$checkbox_name = str_replace('[]', '', $f_key['name']);
											if(isset($data[$checkbox_name]) && is_array($data[$checkbox_name])){
												
												if(isset($opt['value'])){
													if(in_array($opt['value'], $data[$checkbox_name])){
														$checked = 'checked="checked"';
													}
												}
												
											}
											
										if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
											<input style="display:none;" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" type="checkbox"  value="<?php echo (isset($opt['value']) && ($opt['value'] !== '')?$opt['value']:''); ?>" <?php echo $checked; ?>/>
											<input type="checkbox"  value="<?php echo (isset($opt['value']) && ($opt['value'] !== '')?$opt['value']:''); ?>" <?php echo $checked; ?> disabled="disabled"/>
										<?php }else{ ?>
											<input name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" type="checkbox"  value="<?php echo (isset($opt['value']) && ($opt['value'] !== '')?$opt['value']:''); ?>" <?php echo $checked; if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
										<?php } ?>
										
										<?php echo (isset($opt['title']) && ($opt['title'] !== '')?$opt['title']:''); ?>
										
									</label>
    <?php } } ?>
    </div>
    </label>
    <?php break; case 'image': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
						  <div>
							  <div class="selectImage select_image" data-length="<?php echo (isset($f_key['length']) && ($f_key['length'] !== '')?$f_key['length']:'1'); ?>" <?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?> disabled="disabled"<?php } ?> data-name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); if(!empty($f_key['name']) && strpos($f_key['name'], '[]')===false && isset($f_key['length']) && ($f_key['length']==0 || $f_key['length']>1)){ ?>[]<?php } ?>">
								
								  <div class="sel_img_thumb_con">
								  <?php if(!empty($data[$f_key['name']])){ if(is_array($data[$f_key['name']])){ foreach($data[$f_key['name']] as $img_id){ ?>
											<span class="sel_img_con">
												<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); if(!empty($f_key['name']) && strpos($f_key['name'], '[')===false){ ?>[]<?php } ?>" value="<?php echo (isset($img_id) && ($img_id !== '')?$img_id:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
												
												<img class="thumbnail select_img_thumb" src="<?php echo get_thumb_by_id($img_id, 180, 180); ?>"/>
												<a class="view_image" href="<?php echo get_image_by_id($img_id); ?>" target="_blank">
													<i class="fa fa-eye" aria-hidden="true"></i>
												</a>
												<?php if(empty($f_key['only_read']) && empty($f_key['disabled'])){ ?> 
													<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>
												<?php } ?>
											</span>
										<?php } }else{ ?>
										<span class="sel_img_con">
											<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
											
											<img class="thumbnail select_img_thumb" src="<?php echo get_thumb_by_id($data[$f_key['name']], 180, 180); ?>"/>
											<a class="view_image" href="<?php echo get_image_by_id($data[$f_key['name']]); ?>" target="_blank">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</a>
											<?php if(empty($f_key['only_read']) && empty($f_key['disabled'])){ ?> 
												<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>
											<?php } ?>
										</span>
									<?php } }else{ ?>
									<span class="sel_img_con no_img">
										<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php if(!empty($data[$f_key['name']])){  echo is_array($data[$f_key['name']])?json_encode($data[$f_key['name']]):$data[$f_key['name']]; } ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
										<i class="thumbnail fa fa-picture-o fa-5x" aria-hidden="true"></i>
									</span>
								  <?php } ?>
								  </div>
								  
							  </div>
						  </div>
						</label>
    <?php break; case 'video': ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>
						  <div>
							  <div class="selectVideo select_image" data-length="<?php echo (isset($f_key['length']) && ($f_key['length'] !== '')?$f_key['length']:'1'); ?>" <?php if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?> disabled="disabled"<?php } ?> data-name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); if(!empty($f_key['name']) && strpos($f_key['name'], '[')===false && isset($f_key['length']) && ($f_key['length']==0 || $f_key['length']>1)){ ?>[]<?php } ?>">
								
								  <div class="sel_img_thumb_con">
								  <?php if(!empty($data[$f_key['name']])){ if(is_array($data[$f_key['name']])){ foreach($data[$f_key['name']] as $img_id){ ?>
											<span class="sel_img_con">
												<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); if(!empty($f_key['name']) && strpos($f_key['name'], '[')===false){ ?>[]<?php } ?>" value="<?php echo (isset($img_id) && ($img_id !== '')?$img_id:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
												
												<video class="thumbnail select_img_thumb" src="<?php echo get_image_by_id($img_id); ?>"></video>
												<a class="view_video" href="<?php echo get_image_by_id($img_id); ?>" target="_blank">
													<i class="fa fa-eye" aria-hidden="true"></i>
												</a>
												<?php if(empty($f_key['only_read']) && empty($f_key['disabled'])){ ?> 
													<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>
												<?php } ?>
											</span>
										<?php } }else{ ?>
										<span class="sel_img_con">
											<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
											
											<video class="thumbnail select_img_thumb" src="<?php echo get_image_by_id($data[$f_key['name']]); ?>"></video>
											<a class="view_video" href="<?php echo get_image_by_id($data[$f_key['name']]); ?>" target="_blank">
												<i class="fa fa-eye" aria-hidden="true"></i>
											</a>
											<?php if(empty($f_key['only_read']) && empty($f_key['disabled'])){ ?> 
												<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>
											<?php } ?>
										</span>
									<?php } }else{ ?>
									<span class="sel_img_con no_img">
										<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php if(!empty($data[$f_key['name']])){  echo is_array($data[$f_key['name']])?json_encode($data[$f_key['name']]):$data[$f_key['name']]; } ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
										<i class="thumbnail fa fa-file-video-o fa-5x" aria-hidden="true"></i>
									</span>
								  <?php } ?>
								  </div>
								  
							  </div>
						  </div>
						</label>
    <?php break; case 'tabs': ?>
    <label>
							<?php builder_tabs(empty($f_key['tabs_lable'])?'':$f_key['tabs_lable'], empty($f_key['tabs_content'])?'':$f_key['tabs_content'], empty($form_keys)?'':$form_keys,  (!empty($f_key['name']) && !empty($data[$f_key['name']]))?$data[$f_key['name']]:(empty($data)?[]:$data), $tabs_count); ?>
						</label>
    <?php break; case 'auto_group': ?>
    <label>
							<div class="<?php echo (isset($f_key['class']) && ($f_key['class'] !== '')?$f_key['class']:''); ?>">
								<?php $s_form_keys['keys'] = empty($f_key['keys'])?'':$f_key['keys'];  builder_form($s_form_keys, $data, $tabs_count); ?>
							</div>
						</label>
    <?php break; default: ?>
    <label>
						  <?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); if(!empty($f_key['only_read']) || !empty($f_key['disabled'])){ ?>
							<input type="text" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>" disabled="disabled"/>
							
							<input type="hidden" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"/>
						  <?php }else{ ?>
							<input type="text" name="<?php echo (isset($f_key['name']) && ($f_key['name'] !== '')?$f_key['name']:''); ?>" placeholder="<?php echo (isset($f_key['title']) && ($f_key['title'] !== '')?$f_key['title']:''); ?>" value="<?php echo (isset($data[$f_key['name']]) && ($data[$f_key['name']] !== '')?$data[$f_key['name']]:''); ?>"<?php if(!empty($f_key['required'])){ ?> data-required="required"<?php } ?>/>
						  <?php } ?>
						</label>
    <?php } } } if(!empty($form_keys['action'])){ ?>
</form>
<?php } } } ?>

<div class="reveal image_modal" id="ImageModal" data-image-list-url="<?php echo url('file/image'); ?>" data-upload-image-url="<?php echo url('file/uploadImage'); ?>" data-delete-image-url="<?php echo url('file/deleteImage'); ?>" data-check-image-unique-url="<?php echo url('file/checkImageUnique'); ?>"
    data-reveal>
    <h4 class="modal_title"><?php echo \think\Lang::get('image_manager'); ?> <span class="n_toolbar"> <span id="nImageSeleted">0</span>/<span id="nImageCount">1</span> </span>
    </h4>
    <div class="modal_content">
        <div class="button-group btnGroup">
            <button type="button" class="button fa fa-upload" id="ImageUpload"> <?php echo \think\Lang::get('upload'); ?> </button>
            <button type="button" class="button fa fa-pencil-square del_tog_btn" data-for="ImageDelBtnGroup"> <?php echo \think\Lang::get('manager'); ?> </button>
            <button type="button" class="button hollow fa fa-refresh" id="refreshImage"> <?php echo \think\Lang::get('refresh'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer sel_tog_btn" data-for="ImageSelBtnGroup" id="selectImageTog"> <?php echo \think\Lang::get('select'); ?> </button>
            <button id="ImageTogList" type="button" class="button fa fa-list" data-l="fa fa-list" data-g="fa fa-th"> </button>

            <div class="input-group">
                <input id="searchName" class="input-group-field" type="text">
                <div class="input-group-button">
                    <button type="button" class="button fa fa-search" id="imageSearch"> <?php echo \think\Lang::get('search'); ?> </button>
                </div>
            </div>

        </div>

        <div class="button-group subBtnGroup delete_btn_group" id="ImageDelBtnGroup">
            <button type="button" class="alert button fa fa-trash" id="deleteImage"> <?php echo \think\Lang::get('delete'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer selectAllImage"> <?php echo \think\Lang::get('select_all'); ?> </button>
        </div>

        <div class="button-group subBtnGroup select_btn_group" id="ImageSelBtnGroup">
            <button type="button" class="success button" id="selectImage"> <?php echo \think\Lang::get('finish'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer selectAllImage"> <?php echo \think\Lang::get('select_all'); ?> </button>
        </div>

        <ul id="ImageUploadTool" class="accordion hide" data-accordion data-allow-all-closed="true">
            <li class="accordion-item is-active" data-accordion-item>
                <a href="#" class="accordion-title"><?php echo \think\Lang::get('upload_list'); ?></a>
                <div id="imageUploadList" class="accordion-content upload_list" data-tab-content>
                    <div class="row">
                        <div id="ImageUploader" class="columns"><?php echo \think\Lang::get('upload'); ?></div>
                    </div>
                    <button type="button" class="button" id="finishImageUpload"> <?php echo \think\Lang::get('finish'); ?> </button>
                </div>
            </li>
        </ul>

        <div id="ImageList" class="image_list">
            <div class="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
            <div class="row">

            </div>
            <div class="page">

            </div>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>
</div>

<div class="reveal image_modal" id="VideoModal" data-video-list-url="<?php echo url('file/video'); ?>" data-upload-video-url="<?php echo url('file/uploadVideo'); ?>" data-delete-video-url="<?php echo url('file/deleteVideo'); ?>" data-check-video-unique-url="<?php echo url('file/checkVideoUnique'); ?>"
    data-reveal>
    <h4 class="modal_title"><?php echo \think\Lang::get('video_manager'); ?> <span class="n_toolbar"> <span id="nVideoSeleted">0</span>/<span id="nImgCount">1</span> </span>
    </h4>
    <div class="modal_content">
        <div class="button-group btnGroup">
            <button type="button" class="button fa fa-upload" id="VideoUpload"> <?php echo \think\Lang::get('upload'); ?> </button>
            <button type="button" class="button fa fa-pencil-square del_tog_btn" data-for="VideoDelBtnGroup"> <?php echo \think\Lang::get('manager'); ?> </button>
            <button type="button" class="button hollow fa fa-refresh" id="refreshVideo"> <?php echo \think\Lang::get('refresh'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer sel_tog_btn" data-for="VideoSelBtnGroup" id="selectVideoTog"> <?php echo \think\Lang::get('select'); ?> </button>
        </div>

        <div class="button-group subBtnGroup delete_btn_group" id="VideoDelBtnGroup">
            <button type="button" class="alert button fa fa-trash" id="deleteVideo"> <?php echo \think\Lang::get('delete'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer selectAllVideo"> <?php echo \think\Lang::get('select_all'); ?> </button>
        </div>

        <div class="button-group subBtnGroup select_btn_group" id="VideoSelBtnGroup">
            <button type="button" class="success button" id="selectVideo"> <?php echo \think\Lang::get('finish'); ?> </button>
            <button type="button" class="button fa fa-mouse-pointer selectAllVideo"> <?php echo \think\Lang::get('select_all'); ?> </button>
        </div>

        <ul id="VideoUploadTool" class="accordion hide" data-accordion data-allow-all-closed="true">
            <li class="accordion-item is-active" data-accordion-item>
                <a href="#" class="accordion-title"><?php echo \think\Lang::get('upload_list'); ?></a>
                <div id="videoUploadList" class="accordion-content upload_list" data-tab-content>
                    <div class="row">
                        <div id="VideoUploader" class="columns"><?php echo \think\Lang::get('upload'); ?></div>
                    </div>
                    <button type="button" class="button" id="finishVideoUpload"> <?php echo \think\Lang::get('finish'); ?> </button>
                </div>
            </li>
        </ul>

        <div id="VideoList" class="image_list">
            <div class="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
            <div class="row">

            </div>
            <div class="page">

            </div>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>
</div>

<div class="reveal image_modal" id="ViewVideoModal" data-reveal>
    <h4 class="modal_title"> &nbsp; </h4>
    <div class="modal_content text-center">

    </div>
    <button class="close-button" data-close aria-label="Close reveal" type="button"><span aria-hidden="true">&times;</span></button>
</div>

<script>
    $('#layout-tabs .in_active a').click();


    $(function() {
        //submit
        $('.eg_form, .eg_form form').submit(function() {
            //return true;
            var err = 0;
            $('*[data-required="required"]').each(function() {
                var the = $(this);
                if (the.val() == '') {
                    the.parent().addClass('has-error');
                    the.parent().find('.error_tips').remove();
                    the.parent().append('<div class="error_tips"><?php echo \think\Lang::get('required'); ?></div>');
                    err++;
                }
            });
            if (err) {
                window.error('<?php echo \think\Lang::get('red_mark_is_required'); ?>');
                return false;
            }
            // self.serialize()
            $('.eg_form .loading').eq(0).show();
            if ($('textarea.editor').length) {
                tinymce.triggerSave();
            }
            var self = $(this);
            $.post(self.attr('action'), self.serialize(), function(res) {
                //console.log(res);

                if (!res.code) {
                    if (typeof res.data.error == 'object') {
                        window.error(res.msg);
                        if (res.data.error) {
                            for (i in res.data.error) {
                                self.find('*[name="' + i + '"]').parent().addClass('has-error');
                                self.find('*[name="' + i + '"]').parent().find('.error_tips').remove();
                                self.find('*[name="' + i + '"]').parent().append('<div class="error_tips">' + res.data.error[i] + '</div>');

                            }
                        }
                    } else {
                        window.info(res.msg);
                    }
                } else {
                    window.success(res.msg);
                    setTimeout(function() {
                        if (res.url) {
                            window.location.href = res.url;
                        } else {
                            window.location.reload();
                        }
                    }, 800);
                }
                $('.eg_form .loading').eq(0).hide();
            });
            return false;
        });

        //remove error tips
        $('.eg_form *[name]').click(function() {
            $(this).parent().removeClass('has-error');
            $(this).parent().find('.error_tips').slideUp();
        });

        //checkbox select
        $('.checkbox_group .select_all').click(function() {
            $(this).parent().find('input[type="checkbox"]').each(function() {
                if (!$(this).is(':checked')) {
                    $(this).prop("checked", true).trigger('change');
                }
            });
        });
        $('.checkbox_group .unselect_all').click(function() {
            $(this).parent().find('input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop("checked", false).trigger('change');
                }
            });
        });

    });
</script>

<?php if(!empty($error)){ ?>
<script>
    <?php foreach($error as $ek=>$err){ ?>
    $('*[name="<?php echo $ek; ?>"]').parent().addClass('has-error');
    <?php } ?>
</script>
<?php } ?>

<link href="__STATIC__/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<script src="__STATIC__/vendor/jquery-ui/jquery-ui.min.js"></script>
<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .custom-combobox {
        position: relative;
        display: block;
    }
    
    .custom-combobox input {
        padding: 8px;
    }
    
    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }
    
    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }
</style>
<script>
    $('.date').datepicker({
        'dateFormat': 'yy-mm-dd'
    });
    $('body').on('click', '.date-range-tool .date-range', function() {
        self = $(this);
        if (!self.hasClass('hasDatepicker')) {
            setTimeout(function() {
                self.blur();
                self.trigger('click');
                self.focus();
            }, 200);
        }

        if (self.data('range') == 'from') {
            var from_obj = $('.date-range[name="' + self.attr('name') + '"]');
            var to_obj = $('.date-range[name="' + self.parent().parent().find('.date-range[data-range="to"]').attr('name') + '"]');
        } else {
            var from_obj = $('.date-range[name="' + self.parent().parent().find('.date-range[data-range="from"]').attr('name') + '"]');
            var to_obj = $('.date-range[name="' + self.attr('name') + '"]');
        }
        //ini 
        var dateFormat = "yy-mm-dd",
            from = from_obj
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: dateFormat
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = to_obj.datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: dateFormat
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }
            return date;
        }
    });

    //combobox
    $.widget("custom.combobox", {
        _create: function() {
            this.wrapper = $("<span>")
                .addClass("custom-combobox")
                .insertAfter(this.element);

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
        },

        _createAutocomplete: function() {
            var selected = this.element.children(":selected"),
                value = selected.val() ? selected.text() : "";

            this.input = $("<input>")
                .appendTo(this.wrapper)
                .val(value)
                .attr("title", "")
                .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
                .autocomplete({
                    delay: 0,
                    minLength: 0,
                    source: $.proxy(this, "_source")
                })
                .tooltip({
                    classes: {
                        "ui-tooltip": "ui-state-highlight"
                    }
                });

            this._on(this.input, {
                autocompleteselect: function(event, ui) {
                    ui.item.option.selected = true;
                    this._trigger("select", event, {
                        item: ui.item.option
                    });
                    this.element.trigger('change');
                },

                autocompletechange: "_removeIfInvalid"
            });
        },

        _createShowAllButton: function() {
            var input = this.input,
                wasOpen = false;

            $("<a>")
                .attr("tabIndex", -1)
                .attr("title", "Show All Items")
                .tooltip()
                .appendTo(this.wrapper)
                .button({
                    icons: {
                        primary: "ui-icon-triangle-1-s"
                    },
                    text: false
                })
                .removeClass("ui-corner-all")
                .addClass("custom-combobox-toggle ui-corner-right")
                .on("mousedown", function() {
                    wasOpen = input.autocomplete("widget").is(":visible");
                })
                .on("click", function() {
                    input.trigger("focus");

                    // Close if already visible
                    if (wasOpen) {
                        return;
                    }

                    // Pass empty string as value to search for, displaying all results
                    input.autocomplete("search", "");
                });
        },

        _source: function(request, response) {
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
            response(this.element.children("option").map(function() {
                var text = $(this).text();
                if (this.value && (!request.term || matcher.test(text))) {
                    return {
                        label: text,
                        value: text,
                        option: this
                    };
                }
            }));
        },

        _removeIfInvalid: function(event, ui) {

            // Selected an item, nothing to do
            if (ui.item) {
                return;
            }

            // Search for a match (case-insensitive)
            var value = this.input.val(),
                valueLowerCase = value.toLowerCase(),
                valid = false;
            this.element.children("option").each(function() {
                if ($(this).text().toLowerCase() === valueLowerCase) {
                    this.selected = valid = true;
                    return false;
                }
            });

            // Found a match, nothing to do
            if (valid) {
                this.element.trigger('change');
                return;
            }

            // Remove invalid value
            this.input
                .val("")
                .attr("title", value + " didn't match any item")
                .tooltip("open");
            this.element.val("");
            this._delay(function() {
                this.input.tooltip("close").attr("title", "");
            }, 2500);
            this.input.autocomplete("instance").term = "";
        },

        _destroy: function() {
            this.wrapper.remove();
            this.element.show();
        }
    });
    // select combobox
    $('.combobox').combobox();
</script>

<script>
    // time range
    $('.time-range-tool').each(function() {
        var time = $(this).find('.time-range[data-range="from"]').val();
        if (time) {
            var t = time.split(':');
            var h = Number(t[0]);
            var m = Number(t[1]);
            $(this).find('.hour[data-range="from"]').val(h ? h : 0);
            if (m < 10) {
                m = '0' + m;
            }
            $(this).find('.minutes[data-range="from"]').val(m ? m : '00');
        }

        var time = $(this).find('.time-range[data-range="to"]').val();

        if (time) {
            var t = time.split(':');
            var h = Number(t[0]);
            var m = Number(t[1]);
            $(this).find('.hour[data-range="to"]').val(h ? h : 0);
            if (m < 10) {
                m = '0' + m;
            }
            $(this).find('.minutes[data-range="to"]').val(m ? m : '00');
        }
    });
    $('.time-range-tool .hour, .time-range-tool .minutes').change(function() {
        var pobj = $(this).parent();
        var h = pobj.find('.hour').val();
        var m = pobj.find('.minutes').val();
        pobj.find('.time-range').val(h + ':' + m);
    });
</script>


<?php if(strpos(cookie('think_var'), 'zh')!==false || strpos(lang('language_code'), 'zh')!==false){ ?>
<script src="__STATIC__/vendor/jquery-ui/i18n/datepicker-zh-TW.js"></script>
<script>
    $('.date').datepicker("option", $.datepicker.regional['zh-TW']);
</script>
<?php } ?>

<script src="__STATIC__/js/jquery.form.min.js"></script>
<script src="__STATIC__/js/md5.js"></script>
<script src="__STATIC__/js/sha1.js"></script>

<link href="__STATIC__/vendor/uploadfile/css/uploadfile.css" rel="stylesheet">
<script src="__STATIC__/vendor/uploadfile/js/jquery.uploadfile.custom.min.js"></script>

<script>
    /**
     * set meta title
     **/
    $('head title').text('<?php echo $meta_title; ?>');

    /**
     * image manager box
     */
    var image_obj = {
        'length': 0
    };
    var sel_all = 0;

    //ImageTogList
    $('#ImageTogList').click(function() {
        if ($('#ImageList').hasClass('list')) {
            $('#ImageList').removeClass('list');
            $(this).removeClass($(this).data('l')).addClass($(this).data('g'));
        } else {
            $('#ImageList').addClass('list');
            $(this).removeClass($(this).data('g')).addClass($(this).data('l'));
        }
        return false;
    });

    //select Image start 
    $('.eg_form').on('click', '.selectImage', function() {
        if (!$(this).attr('disabled')) {
            $(this).find('.error_tips').slideUp();
            image_obj = {
                'length': 0
            };
            $('.selectImage').removeClass('active');
            $(this).addClass('active');
            $('#ImageModal #nImageSeleted').text(0);
            var count = $(this).data('length');
            $('#ImageModal #nImageCount').text(count ? count : '~');
            $('#ImageModal').foundation('open');
            getImageList($('#ImageModal').data('image-list-url'));
        }
    });
    $('.eg_form').on('click', '.selectImage .sel_img_con', function() {
        $('.selectImage .sel_img_con').removeClass('active');
        $(this).addClass('active');
    });

    //refresh image list
    $('#refreshImage').click(function() {
        getImageList($('#ImageModal').data('image-list-url'));
        $('#searchName').val('');
        return false;
    });

    //image modal page
    $('#ImageList .page').on('click', 'a', function() {
        var url = $(this).attr('href');
        var searchName = $('#searchName').val();
        if (searchName) {
            url += '&alias=' + searchName;
        }
        getImageList(url);
        return false;
    });

    //select page all image
    $('#ImageModal .selectAllImage').click(function() {
        sel_all = 1;
        image_obj = {
            'length': 0
        };
        $('#ImageList .check_box').prop("checked", false);
        $('#ImageList .check_box').trigger('click');
    });

    //button group toggle
    $('#ImageModal .btnGroup .button').click(function() {
        var sub_btn_id = $(this).data('for');
        $('#ImageList .check_box:checked').prop("checked", false);
        image_obj = {
            'length': 0
        };

        if (sub_btn_id) {
            if (!$(this).hasClass('active')) {
                $('#ImageModal .btnGroup .button').removeClass('active');
                $(this).addClass('active');
                $('#ImageUploadTool').slideUp();
                $('#ImageModal .subBtnGroup').slideUp();
                $('#' + sub_btn_id).slideDown();
                $('#ImageList').addClass('active');
            } else {
                $('#ImageModal .btnGroup .button').removeClass('active');
                $('#ImageList').removeClass('active');
                $('#ImageModal .subBtnGroup').slideUp();
            }
        } else {
            $('#ImageModal .btnGroup .button').removeClass('active');
            $('#ImageList').removeClass('active');
            $('#ImageModal .subBtnGroup').slideUp();
        }

    });

    //delete image
    $('#deleteImage').click(function() {
        var del = [];
        $('#ImageList .check_box:checked').each(function() {
            del[del.length] = $(this).val();
        });
        if (del.length) {
            window.eg_confirm('<?php echo \think\Lang::get('confirm_delete'); ?> <br> 刪圖片將無法恢復，如需要請預先另存。', function(res) {
                if (res) {
                    $.get($('#ImageModal').data('delete-image-url'), {
                        'id': del
                    }, function() {
                        getImageList($('#ImageModal').data('image-list-url'));
                    });
                }
            }, '<?php echo \think\Lang::get('confirm'); ?>', '<?php echo \think\Lang::get('cancel'); ?>');

        } else {
            window.error('<?php echo \think\Lang::get('delete_image_select_tips'); ?>');
        }
        return false;
    });

    //when in select image check the status
    $('#ImageList').on('click', '.check_box', function() {
        if (!sel_all) {
            if ($('#selectImageTog').hasClass('active')) {
                if ($(this).is(':checked')) {
                    image_obj['id' + $(this).val()] = {
                        'id': $(this).val(),
                        'src': $(this).next().attr('src')
                    };
                    image_obj.length = image_obj.length + 1;
                } else {
                    delete image_obj['id' + $(this).val()];
                    image_obj.length = image_obj.length - 1;
                }
            }
        } else {
            image_obj['id' + $(this).val()] = {
                'id': $(this).val(),
                'src': $(this).next().attr('src')
            };

            if ($('#ImageList .check_box:checked').length == $('#ImageList .check_box').length) {
                sel_all = 0;
                var len = 0;
                for (var i in image_obj) {
                    if (i != 'length') {
                        len++;
                    }
                }
                image_obj.length = len;
            }
        }
        $('#ImageModal #nImageSeleted').text(image_obj.length);
    });

    //finish selected Image
    $('#selectImage').click(function() {
        if ($('#ImageModal').data('editor-image') == 1) {

            if (image_obj.length && image_obj.length > 1) {
                error('<?php echo \think\Lang::get('select_a_number_not_more_than'); ?> ' + n_len);
            } else {

                var field_name = $('#ImageModal').data('editor-image-id');
                var img_src = '';
                for (i in image_obj) {
                    if (i != 'length') {
                        img_src = image_obj[i]['src'];
                    }
                }
                window.editor_win.document.getElementById(field_name).value = img_src;
                $('#ImageModal').data('editor-image', '');
                $('#ImageModal').data('editor-image-id', '');
                window.editor_win = null;

                image_obj = {
                    'length': 0
                };
                $('.selectImage.active').removeClass('active');
                $('#ImageModal .active').removeClass('active');
                $('#ImageDelBtnGroup').slideUp();
                $('#ImageSelBtnGroup').slideUp();
                $('#ImageModal').foundation('close');
            }
        } else {
            var n_len = $('.selectImage.active').data('length');
            if (image_obj.length && n_len && image_obj.length > n_len) {
                error('<?php echo \think\Lang::get('select_a_number_not_more_than'); ?> ' + n_len);
            } else {
                if (image_obj.length) {
                    if (n_len == 1) {
                        var id = '';
                        var img_src = '';
                        for (i in image_obj) {
                            if (i != 'length') {
                                id = image_obj[i]['id'];
                                img_src = image_obj[i]['src'];
                            }
                        }

                        var h = '<span class="sel_img_con">';
                        h += '<input type="hidden" name="' + $('.selectImage.active').data('name') + '" value="' + id + '"/>';
                        h += '<img class="thumbnail select_img_thumb" src="' + img_src + '"/>';
                        h += '<a class="view_image" href="' + img_src + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                        h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                        h += '</span>';
                        $('.selectImage.active').find('.sel_img_thumb_con').html(h);
                    } else {
                        $('.selectImage.active').find('.sel_img_thumb_con .no_img').remove();

                        var h = '';
                        for (i in image_obj) {
                            if (i != 'length') {
                                h += '<span class="sel_img_con">';
                                h += '<input type="hidden" name="' + $('.selectImage.active').data('name') + '" value="' + Number(image_obj[i]['id']) + '"/>';
                                h += '<img class="thumbnail select_img_thumb" src="' + image_obj[i]['src'] + '"/>';
                                h += '<a class="view_image" href="' + image_obj[i]['src'] + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                                h += '</span>';
                            }
                        }

                        if (n_len) {
                            var h_len = $('.selectImage.active input').length;

                            if (image_obj.length == n_len) {
                                $('.selectImage.active').find('.sel_img_thumb_con').html(h);
                            } else if (image_obj.length == 1 && n_len == h_len) {
                                $('.selectImage.active .sel_img_con.active').replaceWith(h);
                            } else {
                                $('.selectImage.active').find('.sel_img_thumb_con').append(h);
                            }

                            if ($('.selectImage.active input').length > n_len) {
                                var n = $('.selectImage.active input').length - n_len;
                                for (var i = 0; i < n; i++) {
                                    $('.selectImage.active .sel_img_con').eq(i).remove();
                                }
                            }
                        } else {
                            $('.selectImage.active').find('.sel_img_thumb_con').append(h);
                        }
                    }

                }
                image_obj = {
                    'length': 0
                };
                $('.selectImage.active').removeClass('active');
                $('#ImageModal .active').removeClass('active');
                $('#ImageDelBtnGroup').slideUp();
                $('#ImageSelBtnGroup').slideUp();
                $('#ImageModal').foundation('close');
            }
        }
    });

    //remove select image
    $('.eg_form').on('click', '.selectImage .remove_image', function(event) {
        event.stopPropagation();
        var sel_img_thumb_con = $(this).parent('.sel_img_con').parent('.sel_img_thumb_con');
        $(this).parent('.sel_img_con').remove();
        if (!sel_img_thumb_con.find('.sel_img_con').length) {
            var html = '<span class="sel_img_con no_img">';
            html += '<input type="hidden" name="' + sel_img_thumb_con.parent().data('name') + '" value=""/>';
            html += '<i class="thumbnail fa fa-picture-o fa-5x" aria-hidden="true"></i>';
            html += '</span>';
            sel_img_thumb_con.html(html);
        }
        return false;
    });

    // double-click select image
    $('#ImageList').on('dblclick', 'img', function() {

        if ($('#ImageModal').data('editor-image') == 1) {
            var field_name = $('#ImageModal').data('editor-image-id');
            window.editor_win.document.getElementById(field_name).value = $(this).attr('src');
            $('#ImageModal').data('editor-image', '');
            $('#ImageModal').data('editor-image-id', '');
            window.editor_win = null;
        } else {
            var n_len = $('.selectImage.active').data('length');
            if (n_len == 1) {
                var h = '<span class="sel_img_con">';
                h += '<input type="hidden" name="' + $('.selectImage.active').data('name') + '" value="' + $(this).data('id') + '"/>';
                h += '<img class="thumbnail select_img_thumb" src="' + $(this).attr('src') + '"/>';
                h += '<a class="view_image" href="' + $(this).attr('src') + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                h += '</span>';
                $('.selectImage.active').find('.sel_img_thumb_con').html(h);
            } else {
                $('.selectImage.active').find('.sel_img_thumb_con .no_img').remove();

                var h = '<span class="sel_img_con">';
                h += '<input type="hidden" name="' + $('.selectImage.active').data('name') + '" value="' + $(this).data('id') + '"/>';
                h += '<img class="thumbnail select_img_thumb" src="' + $(this).attr('src') + '"/>';
                h += '<a class="view_image" href="' + $(this).attr('src') + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                h += '</span>';

                var h_len = $('.selectImage.active').find('input').length;
                if (n_len && h_len >= n_len) {
                    if ($('.selectImage.active .sel_img_con.active').length) {
                        $('.selectImage.active .sel_img_con.active').replaceWith(h);
                    } else {
                        $('.selectImage.active').find('.sel_img_con:last').replaceWith(h);
                    }
                } else {
                    $('.selectImage.active').find('.sel_img_thumb_con').append(h);
                }
            }
        }

        image_obj = {
            'length': 0
        };
        $('.selectImage.active').removeClass('active');
        $('#ImageModal .active').removeClass('active');
        $('#ImageDelBtnGroup').slideUp();
        $('#ImageSelBtnGroup').slideUp();
        $('#ImageModal').foundation('close');
    });

    //build image list box 
    function getImageList(url) {
        $('#ImageList .loading').show();
        $.get(url, function(res) {
            //console.log(res);
            var h = '';
            for (i in res.image_list.data) {
                h += '<label style="overflow:hidden;padding-top:1px;" for="img-' + res.image_list.data[i]['id'] + '" class="small-4 medium-3 large-2 columns">';
                h += '<input id="img-' + res.image_list.data[i]['id'] + '" class="check_box" type="checkbox" value="' + res.image_list.data[i]['id'] + '"/>';
                h += '<img data-id="' + res.image_list.data[i]['id'] + '" title="' + res.image_list.data[i]['alias'] + '" class="thumbnail" src="' + res.image_list.data[i]['thumb'] + '">';
                h += '<span title="' + res.image_list.data[i]['alias'] + '" class="alias">' + res.image_list.data[i]['alias'] + '</span>';
                h += '</label>';
            }
            $('#ImageList .loading').hide();
            $('#ImageList .row').html(h);
            $('#ImageList .page').html(res.image_page);
        });
    }

    $('#imageSearch').click(function() {
        var searchName = $('#searchName').val();
        var url = $('#ImageModal').data('image-list-url');
        if (searchName) {
            url += '?alias=' + searchName;
            getImageList(url);
        } else {
            getImageList(url);
        }
    });

    /**
     * upload image 
     **/
    $('#ImageUpload').click(function() {
        $('#ImageUploader input[type="file"]').trigger('click');
    });
    var c = [];
    var cc = [];
    var ccc = [];
    var fileData = [];
    var uploadFile = $("#ImageUploader").uploadFile({
        url: $('#ImageModal').data('upload-image-url'),
        fileName: "file[]",
        dragdropWidth: "100%",
        acceptFiles: "image/*",
        showPreview: true,
        previewHeight: "100px",
        previewWidth: "100px",
        dragDropStr: "<b><?php echo \think\Lang::get('drag_drop_files_upload'); ?></b>",
        statusBarWidth: "100%",
        autoSubmit: false,
        onSelect: function(files) {
            // check file key
            $('#ImageUpload').attr('disabled', 'disabled');
            $('#ImageUploader').hide();
            $('#ImageList .loading').show();
            if (files.length) {
                var timestamp = new Date().getTime();
                fileData[timestamp] = [];
                for (var i = 0; i < files.length; i++) {
                    getFileHash(files[i], fileData[timestamp]);
                }

                c[timestamp] = setInterval(function() {
                    if (fileData[timestamp][files.length - 1]) {
                        clearInterval(c[timestamp]);

                        var u_data = [];
                        var d_data = [];
                        for (var j = 0; j < fileData[timestamp].length; j++) {
                            $.get($('#ImageModal').data('check-image-unique-url'), {
                                'md5': fileData[timestamp][j]['md5'],
                                'sha1': fileData[timestamp][j]['sha1'],
                                'data': fileData[timestamp][j]['name']
                            }, function(res) {
                                if (!res.code) {
                                    //no in server
                                    u_data[u_data.length] = res.data;
                                } else {
                                    //in server
                                    d_data[d_data.length] = res.data;
                                }

                            });
                        }

                        cc[timestamp] = setInterval(function() {

                            if (u_data.length + d_data.length == fileData[timestamp].length) {
                                clearInterval(cc[timestamp]);

                                var k = 0;
                                for (d in d_data) {
                                    var has_check = 0;
                                    $('.ajax-file-upload-container .ajax-file-upload-filename').each(function() {
                                        if (!has_check && $(this).html().indexOf(d_data[d]) > -1) {
                                            var container = $('<div class="ajax-file-upload-statusbar" style="width: 100%;"><div class="ajax-file-upload-progress" style=""><div class="ajax-file-upload-bar" style="width:100%;"></div></div></div>')
                                            $(this).parent().find('img').clone().prependTo(container);
                                            $(this).parent().before(container);
                                            $(this).parent().find('.ajax-file-upload-cancel').click();
                                            $('#ImageModal').foundation('open');
                                            k++;
                                            has_check = 1;
                                        }
                                    });
                                }

                                ccc[timestamp] = setInterval(function() {
                                    if (k == d_data.length) {
                                        clearInterval(ccc[timestamp]);
                                        $('#ImageUpload').removeAttr('disabled');
                                        $('#ImageUploader').show();
                                        uploadFile.startUpload();
                                        return false;
                                    }
                                }, 200);

                                //if(!u_data.length){
                                //if($('#ImageUploadTool .is-active').length){
                                //$('#ImageUploadTool').foundation('toggle', $('#imageUploadList'));
                                //}
                                //}

                            }

                        }, 200);

                        $('#ImageList .loading').hide();

                    }
                }, 200);

            } else {
                $('#ImageUpload').removeAttr('disabled');
                $('#ImageUploader').show();
                $('#ImageList .loading').hide();
            }

        },
        customProgressBar: function(obj, s) {
            this.statusbar = $("<div class='ajax-file-upload-statusbar'></div>").width(s.statusBarWidth);
            this.preview = $('<img class="ajax-file-upload-preview thumbnail" style="width:100px;height:100px;"/>').appendTo(this.statusbar).hide();
            this.filename = $('<div class="ajax-file-upload-filename" style="display:none"></div>').appendTo(this.statusbar);
            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
            this.abort = $('<div><span aria-hidden="true">×</span></div>').appendTo(this.statusbar);
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deletelStr + "</div>").appendTo(this.statusbar).hide();

            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("ajax-file-upload-green");
            this.download.addClass("ajax-file-upload-green");
            this.cancel.addClass("ajax-file-upload-red");
            this.del.addClass("ajax-file-upload-red");

            return this;
        },
        onSuccess: function(files, data, xhr, pd) {
            if (data.code) {

            } else {
                window.error(data.msg);
            }

            //if($('#ImageUploadTool .is-active').length){
            //$('#ImageUploadTool').foundation('toggle', $('#imageUploadList'));
            //}
            getImageList($('#ImageModal').data('image-list-url'));
            $('#ImageUpload').removeAttr('disabled');
            $('#ImageUploader').show();
            return false;
        },
        onError: function(files, status, errMsg, pd) {
            console.log('network is busy');
            window.error('network is busy');
        }

    });

    //get file sha key
    function getFileHash(file, data) {
        var chunkSize = 204800;
        var pos = 0;

        var md5Instance = CryptoJS.algo.MD5.create();
        var sha1Instance = CryptoJS.algo.SHA1.create();

        var reader = new FileReader();

        function progressiveReadNext() {
            var end = Math.min(pos + chunkSize, file.size);

            reader.onload = function(e) {
                pos = end;
                md5Instance.update(CryptoJS.enc.Latin1.parse(e.target.result));
                sha1Instance.update(CryptoJS.enc.Latin1.parse(e.target.result));

                if (pos < file.size) {
                    progressiveReadNext();
                } else {
                    var md5Value = md5Instance.finalize();
                    var sha1Value = sha1Instance.finalize();

                    data[data.length] = {
                        'name': file.name,
                        'md5': md5Value.toString(),
                        'sha1': sha1Value.toString()
                    }

                }
            }

            if (file.slice) {
                var blob = file.slice(pos, end);
            } else if (file.webkitSlice) {
                var blob = file.webkitSlice(pos, end);
            } else if (File.prototype.mozSlice) {
                var blob = file.mozSlice(pos, end);
            }
            reader.readAsBinaryString(blob);
        }
        progressiveReadNext();
    }


    /**
     * video manager box
     **/
    var video_obj = {
        'length': 0
    };
    var sel_all_status = 0;
    /**
     * select Video
     */
    $('.eg_form').on('click', '.selectVideo', function() {
        if (!$(this).attr('disabled')) {
            $(this).find('.error_tips').slideUp();
            video_obj = {
                'length': 0
            };
            $('.selectVideo').removeClass('active');
            $(this).addClass('active');
            $('#VideoModal #nVideoSeleted').text(0);
            var count = $(this).data('length');
            $('#VideoModal #nVideoCount').text(count ? count : '~');
            $('#VideoModal').foundation('open');
            getVideoList($('#VideoModal').data('video-list-url'));
        }
    });
    $('.eg_form').on('click', '.selectVideo .sel_img_con', function() {
        $('.selectVideo .sel_img_con').removeClass('active');
        $(this).addClass('active');
    });


    //refresh Video list
    $('#refreshVideo').click(function() {
        getVideoList($('#VideoModal').data('video-list-url'));
        return false;
    });

    //Video modal page
    $('#VideoList .page').on('click', 'a', function() {
        getVideoList($(this).attr('href'));
        return false;
    });

    //select page all video
    $('#VideoModal .selectAllVideo').click(function() {
        sel_all_status = 1;
        video_obj = {
            'length': 0
        };
        $('#VideoList .check_box').prop("checked", false);
        $('#VideoList .check_box').trigger('click');
    });

    //button group toggle
    $('#VideoModal .btnGroup .button').click(function() {
        var sub_btn_id = $(this).data('for');
        $('#VideoList .check_box:checked').prop("checked", false);
        video_obj = {
            'length': 0
        };

        if (sub_btn_id) {
            if (!$(this).hasClass('active')) {
                $('#VideoModal .btnGroup .button').removeClass('active');
                $(this).addClass('active');
                $('#VideoUploadTool').slideUp();
                $('#VideoModal .subBtnGroup').slideUp();
                $('#' + sub_btn_id).slideDown();
                $('#VideoList').addClass('active');
            } else {
                $('#VideoModal .btnGroup .button').removeClass('active');
                $('#VideoList').removeClass('active');
                $('#VideoModal .subBtnGroup').slideUp();
            }
        } else {
            $('#VideoModal .btnGroup .button').removeClass('active');
            $('#VideoList').removeClass('active');
            $('#VideoModal .subBtnGroup').slideUp();
        }

    });

    //delete video
    $('#deleteVideo').click(function() {
        var del = [];
        $('#VideoList .check_box:checked').each(function() {
            del[del.length] = $(this).val();
        });
        if (del.length) {
            window.eg_confirm('<?php echo \think\Lang::get('confirm_delete'); ?>', function(res) {
                if (res) {
                    $.get($('#VideoModal').data('delete-video-url'), {
                        'id': del
                    }, function() {
                        getVideoList($('#VideoModal').data('video-list-url'));
                    });
                }
            }, '<?php echo \think\Lang::get('confirm'); ?>', '<?php echo \think\Lang::get('cancel'); ?>');

        } else {
            window.error('<?php echo \think\Lang::get('delete_video_select_tips'); ?>');
        }
        return false;
    });

    //when in select video check the status
    $('#VideoList').on('click', '.check_box', function() {
        if (!sel_all_status) {
            if ($('#selectVideoTog').hasClass('active')) {
                if ($(this).is(':checked')) {
                    video_obj['id' + $(this).val()] = {
                        'id': $(this).val(),
                        'src': $(this).next().attr('src')
                    };
                    video_obj.length = video_obj.length + 1;
                } else {
                    delete video_obj['id' + $(this).val()];
                    video_obj.length = video_obj.length - 1;
                }
            }
        } else {
            video_obj['id' + $(this).val()] = {
                'id': $(this).val(),
                'src': $(this).next().attr('src')
            };

            if ($('#VideoList .check_box:checked').length == $('#VideoList .check_box').length) {
                sel_all_status = 0;
                var len = 0;
                for (var i in video_obj) {
                    if (i != 'length') {
                        len++;
                    }
                }
                video_obj.length = len;
            }
        }
        $('#VideoModal #nVideoSeleted').text(video_obj.length);
    });

    //finish selected video
    $('#selectVideo').click(function() {
        var n_len = $('.selectVideo.active').data('length');
        if (video_obj.length && n_len && video_obj.length > n_len) {
            error('<?php echo \think\Lang::get('select_a_number_not_more_than'); ?> ' + n_len);
        } else {
            if (video_obj.length) {
                if (n_len == 1) {
                    var id = '';
                    var img_src = '';
                    for (i in video_obj) {
                        if (i != 'length') {
                            id = video_obj[i]['id'];
                            img_src = video_obj[i]['src'];
                        }
                    }

                    var h = '<span class="sel_img_con">';
                    h += '<input type="hidden" name="' + $('.selectVideo.active').data('name') + '" value="' + id + '"/>';
                    h += '<video class="thumbnail select_img_thumb" src="' + img_src + '"></video>';
                    h += '<a class="view_video" href="' + img_src + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    h += '</span>';
                    $('.selectVideo.active').find('.sel_img_thumb_con').html(h);
                } else {
                    $('.selectVideo.active').find('.sel_img_thumb_con .no_img').remove();

                    var h = '';
                    for (i in video_obj) {
                        if (i != 'length') {
                            h += '<span class="sel_img_con">';
                            h += '<input type="hidden" name="' + $('.selectVideo.active').data('name') + '" value="' + Number(video_obj[i]['id']) + '"/>';
                            h += '<video class="thumbnail select_img_thumb" src="' + video_obj[i]['src'] + '"></video>';
                            h += '<a class="view_video" href="' + video_obj[i]['src'] + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                            h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
                            h += '</span>';
                        }
                    }

                    if (n_len) {
                        var h_len = $('.selectVideo.active input').length;

                        if (video_obj.length == n_len) {
                            $('.selectVideo.active').find('.sel_img_thumb_con').html(h);
                        } else if (video_obj.length == 1 && n_len == h_len) {
                            $('.selectVideo.active .sel_img_con.active').replaceWith(h);
                        } else {
                            $('.selectVideo.active').find('.sel_img_thumb_con').append(h);
                        }

                        if ($('.selectVideo.active input').length > n_len) {
                            var n = $('.selectVideo.active input').length - n_len;
                            for (var i = 0; i < n; i++) {
                                $('.selectVideo.active .sel_img_con').eq(i).remove();
                            }
                        }
                    } else {
                        $('.selectVideo.active').find('.sel_img_thumb_con').append(h);
                    }
                }

            }

            video_obj = {
                'length': 0
            };
            $('.selectVideo.active').removeClass('active');
            $('#VideoModal .active').removeClass('active');
            $('#VideoDelBtnGroup').slideUp();
            $('#VideoSelBtnGroup').slideUp();
            $('#VideoModal').foundation('close');
        }

    });

    //remove select video
    $('.eg_form').on('click', '.selectVideo .remove_image', function(event) {
        event.stopPropagation();
        var sel_img_thumb_con = $(this).parent('.sel_img_con').parent('.sel_img_thumb_con');
        $(this).parent('.sel_img_con').remove();
        if (!sel_img_thumb_con.find('.sel_img_con').length) {
            var html = '<span class="sel_img_con no_img">';
            html += '<input type="hidden" name="' + sel_img_thumb_con.parent().data('name') + '" value="">';
            html += '<i class="thumbnail fa fa-file-video-o fa-5x" aria-hidden="true"></i>';
            html += '</span>';
            sel_img_thumb_con.html(html);
        }
        return false;
    });

    // double-click select video
    $('#VideoList').on('dblclick', 'video', function() {
        var n_len = $('.selectVideo.active').data('length');
        if (n_len == 1) {
            var h = '<span class="sel_img_con">';
            h += '<input type="hidden" name="' + $('.selectVideo.active').data('name') + '" value="' + $(this).data('id') + '"/>';
            h += '<video class="thumbnail select_img_thumb" src="' + $(this).attr('src') + '"></video>';
            h += '<a class="view_video" href="' + $(this).attr('src') + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
            h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
            h += '</span>';
            $('.selectVideo.active').find('.sel_img_thumb_con').html(h);
        } else {
            $('.selectVideo.active').find('.sel_img_thumb_con .no_img').remove();

            var h = '<span class="sel_img_con">';
            h += '<input type="hidden" name="' + $('.selectVideo.active').data('name') + '" value="' + $(this).data('id') + '"/>';
            h += '<video class="thumbnail select_img_thumb" src="' + $(this).attr('src') + '"></video>';
            h += '<a class="view_video" href="' + $(this).attr('src') + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
            h += '<a class="remove_image"><i class="fa fa-times" aria-hidden="true"></i></a>';
            h += '</span>';

            var h_len = $('.selectVideo.active').find('input').length;
            if (n_len && h_len >= n_len) {
                if ($('.selectVideo.active .sel_img_con.active').length) {
                    $('.selectVideo.active .sel_img_con.active').replaceWith(h);
                } else {
                    $('.selectVideo.active').find('.sel_img_con:last').replaceWith(h);
                }
            } else {
                $('.selectVideo.active').find('.sel_img_thumb_con').append(h);
            }
        }

        video_obj = {
            'length': 0
        };
        $('.selectVideo.active').removeClass('active');
        $('#VideoModal .active').removeClass('active');
        $('#VideoDelBtnGroup').slideUp();
        $('#VideoSelBtnGroup').slideUp();
        $('#VideoModal').foundation('close');
    });

    //build video list box 
    function getVideoList(url) {
        $('#VideoList .loading').show();
        $.get(url, function(res) {
            var h = '';
            for (i in res.video_list.data) {
                h += '<label for="video-' + res.video_list.data[i]['id'] + '" class="small-4 medium-3 large-2 columns">';
                h += '<input id="video-' + res.video_list.data[i]['id'] + '" class="check_box" type="checkbox" value="' + res.video_list.data[i]['id'] + '"/>';
                h += '<video data-id="' + res.video_list.data[i]['id'] + '" class="thumbnail" src="' + res.video_list.data[i]['path'] + '"></video>';
                h += '</label>';
            }
            $('#VideoList .loading').hide();
            $('#VideoList .row').html(h);
            $('#VideoList .page').html(res.video_page);
        });
    }

    /**
     * upload video 
     **/
    $('#VideoUpload').click(function() {
        $('#VideoUploader input[type="file"]').trigger('click');
    });
    var c1 = [];
    var cc1 = [];
    var ccc1 = [];
    var videoFileData = [];
    var uploadVideoFile = $("#VideoUploader").uploadFile({
        url: $('#VideoModal').data('upload-video-url'),
        fileName: "file[]",
        dragdropWidth: "100%",
        acceptFiles: "video/mp4",
        showPreview: true,
        previewHeight: "100px",
        previewWidth: "100px",
        dragDropStr: "<b><?php echo \think\Lang::get('drag_drop_files_upload'); ?></b>",
        statusBarWidth: "100%",
        autoSubmit: false,
        onSelect: function(files) {
            // check file key
            $('#VideoUpload').attr('disabled', 'disabled');
            $('#VideoUploader').hide();
            $('#VideoList .loading').show();
            if (files.length) {
                var timestamp = new Date().getTime();
                videoFileData[timestamp] = [];
                for (var i = 0; i < files.length; i++) {
                    getFileHash(files[i], videoFileData[timestamp]);
                }

                c1[timestamp] = setInterval(function() {
                    if (videoFileData[timestamp][files.length - 1]) {
                        clearInterval(c1[timestamp]);

                        var u_data = [];
                        var d_data = [];
                        for (var j = 0; j < videoFileData[timestamp].length; j++) {
                            $.get($('#VideoModal').data('check-video-unique-url'), {
                                'md5': videoFileData[timestamp][j]['md5'],
                                'sha1': videoFileData[timestamp][j]['sha1'],
                                'data': videoFileData[timestamp][j]['name']
                            }, function(res) {
                                if (!res.code) {
                                    //no in server
                                    u_data[u_data.length] = res.data;
                                } else {
                                    //in server
                                    d_data[d_data.length] = res.data;
                                }

                            });
                        }

                        cc1[timestamp] = setInterval(function() {

                            if (u_data.length + d_data.length == videoFileData[timestamp].length) {
                                clearInterval(cc1[timestamp]);

                                var k = 0;
                                for (d in d_data) {
                                    var has_check = 0;
                                    $('.ajax-file-upload-container .ajax-file-upload-filename').each(function() {
                                        if (!has_check && $(this).html().indexOf(d_data[d]) > -1) {
                                            var container = $('<div class="ajax-file-upload-statusbar" style="width: 100%;"><div class="ajax-file-upload-progress" style=""><div class="ajax-file-upload-bar" style="width:100%;"></div></div></div>')
                                            $(this).parent().find('img').clone().prependTo(container);
                                            $(this).parent().before(container);
                                            $(this).parent().find('.ajax-file-upload-cancel').click();
                                            $('#VideoModal').foundation('open');
                                            k++;
                                            has_check = 1;
                                        }
                                    });
                                }

                                ccc1[timestamp] = setInterval(function() {
                                    if (k == d_data.length) {
                                        clearInterval(ccc1[timestamp]);
                                        $('#VideoUpload').removeAttr('disabled');
                                        $('#VideoUploader').show();
                                        uploadVideoFile.startUpload();
                                        return false;
                                    }
                                }, 200);

                                //if(!u_data.length){
                                //if($('#VideoUploadTool .is-active').length){
                                //$('#VideoUploadTool').foundation('toggle', $('#videoUploadList'));
                                //}
                                //}

                            }

                        }, 200);

                        $('#VideoList .loading').hide();

                    }
                }, 200);

            } else {
                $('#VideoUpload').removeAttr('disabled');
                $('#VideoUploader').show();
                $('#VideoList .loading').hide();
            }

        },
        customProgressBar: function(obj, s) {
            this.statusbar = $("<div class='ajax-file-upload-statusbar'></div>").width(s.statusBarWidth);
            this.preview = $('<img class="ajax-file-upload-preview thumbnail" style="width:100px;height:100px;"/>').appendTo(this.statusbar).hide();
            this.filename = $('<div class="ajax-file-upload-filename" style="display:none"></div>').appendTo(this.statusbar);
            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
            this.abort = $('<div><span aria-hidden="true">×</span></div>').appendTo(this.statusbar);
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deletelStr + "</div>").appendTo(this.statusbar).hide();

            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("ajax-file-upload-green");
            this.download.addClass("ajax-file-upload-green");
            this.cancel.addClass("ajax-file-upload-red");
            this.del.addClass("ajax-file-upload-red");

            return this;
        },
        onSuccess: function(files, data, xhr, pd) {
            if (data.code) {

            } else {
                window.error(data.msg);
            }

            //if($('#VideoUploadTool .is-active').length){
            //$('#VideoUploadTool').foundation('toggle', $('#videoUploadList'));
            //}
            getVideoList($('#VideoModal').data('video-list-url'));
            $('#VideoUpload').removeAttr('disabled');
            $('#VideoUploader').show();
            return false;
        },
        onError: function(files, status, errMsg, pd) {
            console.log('network is busy');
            window.error('network is busy');
        }

    });
</script>

<link href="__STATIC__/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
<script src="__STATIC__/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script>
    $(function() {
        $('.eg_form').on('click', '.selectImage .view_image', function(event) {
            event.stopPropagation();
        });
        $('.eg_form').magnificPopup({
            delegate: '.view_image',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }
        });
    });
</script>

<script>
    // view video
    $('.eg_form').on('click', '.selectVideo .view_video', function(event) {
        event.stopPropagation();
        var url = $(this).attr('href');
        var html = '<video src="' + url + '" autoplay="autoplay" controls="controls"></video>';
        $('#ViewVideoModal .modal_content').html(html);
        $('#ViewVideoModal').foundation('open');
        return false;
    });
    //close video view model
    $('#ViewVideoModal').on('closed.zf.reveal', function() {
        $('#ViewVideoModal .modal_content').html('');
    });
</script>

<script src="__STATIC__/vendor/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea.editor',
        height: 500,
		theme: 'modern',
        plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help code',
        toolbar1: "undo redo | cut copy paste | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: " searchreplace | bullist numlist | outdent indent blockquote | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
        image_advtab: true,
        //image_prepend_url: "<?php echo SERVER_URL . INPUT_PATH; ?>/",
        relative_urls: false,
        remove_script_host: true,
        document_base_url: "<?php echo SERVER_URL . INPUT_PATH; ?>/",
        file_browser_callback: function(field_name, url, type, win) {
            if (type == 'image') {

                $('#ImageModal').data('editor-image', 1);
                $('#ImageModal').data('editor-image-id', field_name);
                window.editor_win = win;

                image_obj = {
                    'length': 0
                };
                $('#ImageModal #nImageSeleted').text(0);
                $('#ImageModal #nImageCount').text(1);
                $('#ImageModal').foundation('open');
                $('#ImageModal').parent('.reveal-overlay').css('z-index', 999999);
                getImageList($('#ImageModal').data('image-list-url'));
            }
        }
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