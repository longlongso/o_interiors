<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\MyWork\www\www2\mas-intdesign/application/admin\view\builder\builder_lists_content.html";i:1531065625;}*/ ?>
<?php if(!empty($lists)){ foreach($lists as $list){ ?>
	<tr>
		<?php 
			$primary_key_val = '';
			if(!empty($primary_key)){
				$primary_key_val = isset($list[$primary_key])?$list[$primary_key]:'';
			}else{
				$primary_key_val = isset($list['id'])?$list['id']:'';
			}
		?>
	  <td><input type="checkbox" name="selected[]" value="<?php echo (isset($primary_key_val) && ($primary_key_val !== '')?$primary_key_val:''); ?>"></td>
	  <?php foreach($keys as $key){ if(isset($key['key']) && empty($key['hide'])){ ?>
		<td <?php if($key['key']=='do'){ ?>class="text-right"<?php } ?>>
			
			<?php if(isset($key['type'])){ if(isset($list[$key['key']])){ if($key['type']=='date' && !empty($list[$key['key']])){ ?>
						<?php echo date('Y-m-d', $list[$key['key']]); }else if($key['type']=='time' && !empty($list[$key['key']])){ ?>
						<?php echo date('Y-m-d H:i', $list[$key['key']]); }else if($key['type']=='long2ip' || $key['type']=='ip'){ ?>
						<?php echo long2ip((int)$list[$key['key']]); }else if($key['type']=='image'){ ?>
						<img class="thumbnail" src="<?php echo get_image_by_id($list[$key['key']]); ?>" />
					<?php } } }else if(isset($key['option']) && is_array($key['option'])){ if(isset($list[$key['key']])){ ?>
					
					<?php echo isset($key['option'][$list[$key['key']]])?$key['option'][$list[$key['key']]]:''; } }else if($key['key']=='do'){ if(!empty($key['do']) && is_array($key['do'])){ ?>
					<div class="button-group">
					<?php foreach($key['do'] as $do){ ?>
						<a data-key="<?php echo (isset($list[$do['key']]) && ($list[$do['key']] !== '')?$list[$do['key']]:''); ?>" <?php echo (isset($do['script']) && ($do['script'] !== '')?$do['script']:''); ?> class="button<?php if(!empty($do['class'])){ ?> <?php echo (isset($do['class']) && ($do['class'] !== '')?$do['class']:''); } ?>" href="<?php echo (isset($do['href']) && ($do['href'] !== '')?$do['href']:'javascript:;'); if(!empty($do['href']) && !empty($do['key'])){ ?>?&<?php echo $do['key']; ?>=<?php echo (isset($list[$do['key']]) && ($list[$do['key']] !== '')?$list[$do['key']]:''); } ?>">
						<?php echo (isset($do['title']) && ($do['title'] !== '')?$do['title']:''); ?>
						</a>
					<?php } ?>
					</div>
				<?php } }else{ ?>
				<?php echo (isset($list[$key['key']]) && ($list[$key['key']] !== '')?$list[$key['key']]:''); } ?>
			
		</td>
		<?php } } ?>
	</tr>
<?php } } ?>