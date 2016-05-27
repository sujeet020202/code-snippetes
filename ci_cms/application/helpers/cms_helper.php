<?php defined('BASEPATH') OR exit('No direct script access allowed');
function getNavigationfromCMS(){
	
	  $CI = & get_instance();
	  $query = $CI->db->query("select c.* from (
					  select c.*,
					  coalesce(nullif(c.mi_parant_menu, 0), c.mi_id) as groupID,
					  case when c.mi_parant_menu = 0 then 1 else 0 end as isparent,
					  case when p.mi_parant_menu = 0 then c.mi_parant_menu end as orderbyint
					  from cms_menu_item c
					   left join cms_menu_item p on p.mi_id = c.mi_parant_menu
					  ) c  WHERE  c.mi_status='Active'  order by groupID, isparent desc, orderbyint");
					  
	  return $query->result_array();
	 
}

function _group_by($array, $key_array) {
	
	$return = array();
	$key = '';
	foreach($array as $val) {
		foreach($key_array as $keys){
			$key .= $val[$keys].'###';
		}
		$return[rtrim($key,'###')][] = $val;
		$key = '';
	}
	
	return $return;
}
function _group_by_array_key($array, $key) {
	
	$return = array();
	foreach($array as $val) {
		$return[$val[$key]][] = $val;
	}
	
	return $return;
}

function getSlider($shortcode){
	$CI = & get_instance();
	$slider_images = $CI->db->get_where('cms_slider',array('shortcode' => $shortcode))->result_array();
	$return = '';
	if(!empty($slider_images)){
		$directive = 'data-plugin-options={"directionNav":true,"controlNav":false}';
		$return .= '<div class="flexslider" '.$directive.'>';
		$return .= '<ul class="slides">';
		foreach($slider_images as $image){
			
			$return .= '<li><img src="'.base_url().'/cms/media/slider/'.$image['image_name'].'" /></li>';
		}
		$return .= '</ul></div>';
	}
	
	
	
	return $return;
}
?>