<?php

//////////////////////////////////////// Lists ////////////////////////////////////////

function gp_list($atts, $content = null, $code) {
    extract(shortcode_atts(array(
		'type' => '',
		'divider' => 'false',
		'color' => 'teal'
    ), $atts));
    
    // Divider
    if($divider == "false") {
		$divider = "no-divider";
    } else {
		$divider = "";
    }
    
    if($code=="list") {
		$out .= '<ul class="gp-list sc-list '.$type.' '.$divider.' '.$color.'">'.do_shortcode($content).'</ul>';
	} elseif($code=="li") {
		$out .= '<li>'.do_shortcode($content).'</li>';
	}
	
   return $out;
   
}
add_shortcode("list", "gp_list");
add_shortcode("li", "gp_list");

?>