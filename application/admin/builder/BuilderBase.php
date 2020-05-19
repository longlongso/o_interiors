<?php

/**
 * base builder 
**/
namespace app\admin\builder;

trait BuilderBase
{
	protected function title($title = ''){
		$this->assign('title', $title);
	}
	
	protected function metaTitle($meta_title = ''){
		$this->assign('meta_title', $meta_title);
	}
	
	protected function metaDescription($meta_description = ''){
		$this->assign('meta_description', $meta_description = '');
	}
	
	protected function metaKeywords($meta_keywords = ''){
		$this->assign('meta_keywords', $meta_keywords);
	}
	
	/**
	 * @$meta_title string 
	 * @$meta_description string
	 * @$meta_keywords string
	**/
	protected function metaContents($meta_title = '', $meta_description = '', $meta_keywords = ''){
		$this->assign(['meta_title'=>$meta_title, 'meta_description'=>$meta_description, 'meta_keywords'=>$meta_keywords]);
	}
	
	/**
	 * @$breadcrumbs array (href, titile, disabled) (last one is active)
	**/
	protected function breadcrumbs($breadcrumbs){
		$this->assign('breadcrumbs', $breadcrumbs);
	}
	
	protected function buttons($buttons, $return = false){
		$btn = '';
		if(!empty($buttons)){
			$sub_btn = '';
			if(!$return){
				$btn .= '<div class="button-group btnGroup">';
			}
			foreach($buttons as $button){
				if(isset($button['type'])){
					switch ($button['type']) {
					
						case 'submit': 
							$btn .= '<button type="submit" class="success button fa fa-floppy-o ' . (isset($button['class'])?$button['class']:'') . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'delete': 
							$btn .= '<button type="button" class="button alert fa fa-trash delete_selected ' . (isset($button['class'])?$button['class']:'') . '" data-href="' . (isset($button['href'])?$button['href']:'') . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'refresh': 
							$btn .= '<button type="button" class="button hollow fa fa-refresh refresh ' . (isset($button['class'])?$button['class']:'') . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'back': 
							$btn .= '<button type="button" class="button hollow fa fa-arrow-circle-left ' . (isset($button['class'])?$button['class']:'') . '" onclick="history.back();"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'select_all': 
							$btn .= '<button type="button" class="button fa fa-mouse-pointer ' . (isset($button['class'])?$button['class']:'') . '" onclick="$(\'input[type=\\\'checkbox\\\']\').prop(\'checked\', true);"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'button': 
							$btn .= '<button type="button" class="button ' . (isset($button['class'])?$button['class']:'') . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
						break;
						
						case 'a': 
							$btn .= '<a '. (isset($button['script'])?$button['script']:'') .' class="button ' . (isset($button['class'])?$button['class']:'') . '" href="' . (isset($button['href'])?$button['href']:'javascript:;') . '"> ' . (isset($button['title'])?$button['title']:'') . ' </a>';
						break;
						
						case 'search':
							
							$search_active_class = '';
							if(!empty($button['active'])){
								$search_active_class = ' active';
							}
							
							$sub_btn_id = $button['type'] . '_' . uniqid();
							
							$btn .= '<button type="button" class="' . (isset($button['class'])?$button['class']:'') . ' button fa fa-search eg_has_sub_btn ' . $search_active_class . '" data-for="' . $sub_btn_id . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
							
							if(!empty($button['option'])){
								$sub_btn .= '<div ' . ( empty($search_active_class)?'':'style="display:block;"') . ' class="eg_sub_btn_group subBtnGroup egSearchForm" id="' . $sub_btn_id . '">';
								foreach($button['option'] as $option){
									$sub_btn .= '	<div class="input-group">';
										
										$sub_btn .= '<span class="input-group-label" style="font-size:15px;">'.(isset($option['title'])?$option['title']:'').'</span>';
										
										if(isset($option['type']) && $option['type']=='select'){
											
											if(!empty($option['option'])){
												$sub_btn .= '<select name="' .(isset($option['name'])?$option['name']:''). '">';
												foreach($option['option'] as $k=>$op){
													$sub_btn .= '<option value="'.$k.'">'.$op.'</option>';
												}
												$sub_btn .= '</select>';
											}else{
												$sub_btn .= '<input class="input-group-field" name="'.(isset($option['name'])?$option['name']:'').'" value="' . (isset($option['value'])?$option['value']:'') . '" type="text" />';
											}
											
										}else{
											$sub_btn .= '<input class="input-group-field" name="'.(isset($option['name'])?$option['name']:'').'" value="' . (isset($option['value'])?$option['value']:'') . '" type="text" />';
										}
										
									$sub_btn .= '	</div>';
								}
								$sub_btn .= '	<div class="button-group">';
								$sub_btn .= '	<button type="reset" class="button hollow" style="background-color: #fff;"> ' . lang('reset') . ' </button>';
								$sub_btn .= '	<button type="submit" class="button"> ' . lang('search') . ' </button>';
								$sub_btn .= '	</div>';
								$sub_btn .= '	</div>';
							}
							
						break;
						
						case 'button-group':
							
							$search_active_class = '';
							if(!empty($button['active'])){
								$search_active_class = ' active';
							}
							
							$sub_btn_id = $button['type'] . '_' . uniqid();
							
							$btn .= '<button type="button" class="' . (isset($button['class'])?$button['class']:'') . ' button eg_has_sub_btn ' . $search_active_class . '" data-for="' . $sub_btn_id . '"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
							
							if(!empty($button['option'])){
								$sub_btn .= '<div ' . ( empty($search_active_class)?'':'style="display:block;"') . ' class="eg_sub_btn_group subBtnGroup button-group" id="' . $sub_btn_id . '">';
								
								$sub_btn .= $this->buttons($button['option'], true);
								
								$sub_btn .= '	</div>';
							}
							
						break;
						
                        case 'html': 
                        case 'custom': 
                        case 'custom_html': 
							$btn .= (isset($button['html'])?$button['html']:'') . (isset($button['content'])?$button['content']:'');
						break;
                        
						default: 
							$btn .= '<button type="button ' . (isset($button['class'])?$button['class']:'') . '" class="button"> ' . (isset($button['title'])?$button['title']:'') . ' </button>';
							
					}
					
				}
			}
			if(!$return){
				$btn .= '</div>';
			}
		}
		$this->assign('buttons', $btn.$sub_btn);
		if($return){
			return $btn.$sub_btn;
		}
	}
	
	/**
	 * @$url string
	**/
	protected function actionUrl($url){
		$this->assign('action_url', $url);
	}
	
	/**
	 * callout message
	**/
	protected function callout(){
		$err = get_error();
		if(!empty($err)){
			$this->assign('error_msg', isset($err['msg'])?$err['msg']:'');
			if(!empty($err['data']['post'])){
				$this->data($err['data']['post']);
			}
			if(!empty($err['data']['error'])){
				$this->assign('error', $err['data']['error']);
			}
			error_clear();
		}
		$suc = get_success();
		if(!empty($suc)){
			$this->assign('success_msg', isset($suc['msg'])?$suc['msg']:'');
			success_clear();
		}
	}
	
	protected function data($data){
		$this->assign('data', $data);
	}
	
}