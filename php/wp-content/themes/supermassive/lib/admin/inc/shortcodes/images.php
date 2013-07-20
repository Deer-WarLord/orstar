<?php

//////////////////////////////////////// Images ////////////////////////////////////////

function gp_image($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '',
		'width' => '',
		'height' => '',
		'link' => '',
		'target' => '_self',
		'border' => 'false',
		'align' => 'alignleft',
		'margins' => '',
		'top' => '',
		'right' => '',
		'bottom' => '',
		'left' => '',		
		'alt' => '',
		'title' => '',
		'lightbox' => 'none',
		'preload' => 'false',
		'shadow' => '',
		'reflection' => ''
	),$atts));

	require(gp_inc . 'options.php');

	// Position
	if($top != '' OR $bottom != '' OR $left != '' OR $right != '') {
		$position = "position: absolute; ";
	} else {
		$position = "";
	}
	if($top != '') {
		$top = 'top:'.$top.'px; ';
	} else {
		$top = '';
	}
	if($right != '') {
		$right = 'right:'.$right.'px; ';
	} else {
		$right = '';
	}
	if($bottom != '') {
		$bottom = 'bottom:'.$bottom.'px; ';
	} else {
		$bottom = '';
	}
	if($left != '') {
		$left = 'left:'.$left.'px; ';
	} else {
		$left = '';
	}

	// Margins
	if($margins != "") {
		if(preg_match('/%/', $margins) OR preg_match('/em/', $margins) OR preg_match('/px/', $margins)) {
			$margins = str_replace(",", " ", $margins);
			$margins = 'margin: '.$margins.'; ';	
		} else {
			$margins = str_replace(",", "px ", $margins);
			$margins = 'margin: '.$margins.'px; ';		
		}
		$margins = str_replace("autopx", "auto", $margins);
	} else {
		$margins = "";
	}
	
	// Lightbox
	if($lightbox == "image") {
		$lightbox_hover = '<span class="hover-image"></span>';
		$rel = "prettyPhoto";
	} elseif($lightbox == "video") {
		$lightbox_hover = '<span class="hover-video"></span>';
		$rel = "prettyPhoto";
	} else {
		$lightbox_hover = '';
		$rel = '';
	}
		
	// Image Link
	if($link != "") {
		if($lightbox == "video") {
			$link1 = '<a href="file='.$link.'&image='.$url.'" title="'.$title.'" rel="'.$rel.'" target="'.$target.'">';
		} else {
			$link1 = '<a href="'.$link.'" title="'.$title.'" rel="'.$rel.'" target="'.$target.'">';
		}
		$link2 = '</a>';
	}
				
	// Image Cropping
	if($width != "" OR $height != "") {			
		$image = vt_resize('', $url, $width, $height, true);
		$url = $image[url];
		$cropping_class = "sc-crop";
	} else {
		if(!preg_match("/http:/", $url)) { $url = site_url().'/'.$url; }
		$cropping_class = "";
	}

	// Image Border
 	if($border == "true") {
		$border = "image-border";
	} else {
		$border = "";
	}
	
	// Image Preloader
 	if($preload == "true") {
		$preload = "preload";
	} else {
		$preload = "";
	}
	
	// Shadow Padding
	if($shadow != "") {
		$shadow_padding = "shadow-padding";
	} else {
		$shadow_padding = "";
	}	
	
	return '

	<div class="sc-image '.$shadow.' '.$shadow_padding.' '.$align.' '.$border.' '.$preload.' '.$cropping_class.'" style="background-position: center '.($image[height] - 16).'px; '.$position.$top.$bottom.$left.$right.$margins.' width:'.$image[width].'px; height: '.$image[height].'px;">'.$link1.'
		
		'.$lightbox_hover.'
		
		<img src="'.$url.'" alt="'.$alt.'" style="width: '.$image[width].'px; height: '.$image[height].'px;" class="'.$reflection.'" />'.$link2.'
		
	</div>
	
	';

}

add_shortcode("image", "gp_image");

?>