<?php

//////////////////////////////////////// Buttons ////////////////////////////////////////

function gp_button($atts, $content = null) {
    extract(shortcode_atts(array(
        'link' => '',
        'color' => 'darkgrey',
        'target' => '_self'
    ), $atts));

	$out = '<a href="'.$link.'" class="sc-button '.$color.'" target="'.$target.'">'.do_shortcode($content).'</a>';
	    
    return $out;
}

add_shortcode('button', 'gp_button');

?>