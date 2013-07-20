<?php require(gp_inc . 'options.php'); global $gp_settings; ?>

<script>
/* JS Variables */
var rootFolder = "<?php echo get_template_directory_uri(); ?>";
var emptySearchText = "<?php _e('Please enter something in the search box!', 'gp_lang'); ?>";

/* Cufon */
<?php if($theme_chunkfive OR $theme_journal OR $theme_leaguegothic OR $theme_nevis OR $theme_quicksand OR $theme_sansation OR $theme_vegur) { ?>

	Cufon.replace('h1:not(#logo),h2,h3,h4,h5,h6', {hover: true});
	<?php echo stripslashes($theme_cufon_code); ?>
	
<?php } ?>

</script>

<?php

// Detect Browsers
$gp_settings['MSIE'] = (stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") !== false);
$gp_settings['iPhone'] = (stripos($_SERVER['HTTP_USER_AGENT'],"iPhone") !== false);
$gp_settings['iPad'] = (stripos($_SERVER['HTTP_USER_AGENT'],"iPad") !== false);

// Browser Class
if($gp_settings['iPhone'] OR $gp_settings['iPad']) {
	$gp_settings['browser'] = "ios-class";
} else {
	$gp_settings['browser'] = "";
}

// Preload Effect
if($theme_preload == "0") {
	$gp_settings['preload'] = "preload";
} else {
	$gp_settings['preload'] = "";
}

// Placeholder Image URL
$gp_settings['placeholder'] = get_template_directory_uri().'/lib/images/placeholder1.png';

// Skins
if(isset($_GET['skin']) && $_GET['skin'] != "default") {
	$gp_settings['skin'] = "skin-".$_GET['skin'];
} elseif(isset($_COOKIE['SkinCookie']) && $_COOKIE['SkinCookie'] != "default") {
	$gp_settings['skin'] = "skin-".$_COOKIE['SkinCookie']; 
} elseif(get_post_meta($post->ID, 'ghostpool_skin', true) && get_post_meta($post->ID, 'ghostpool_skin', true) != "Default") {
	$gp_settings['skin'] = "skin-".get_post_meta($post->ID, 'ghostpool_skin', true);
} else {
	$gp_settings['skin'] = "skin-".$theme_skin;
}


/*************************** Index ***************************/

if(is_home()) {

	$gp_settings['layout'] = "fullwidth";
	$gp_settings['frame'] = "frame";
	$gp_settings['title'] = $theme_page_title;
	$gp_settings['breadcrumbs'] = $theme_page_breadcrumbs; 
	$gp_settings['search'] = $theme_page_search;
	

/*************************** BuddyPress ***************************/
	
} elseif((function_exists('bp_is_active') && !bp_is_blog_page()) OR (function_exists('is_bbpress') && is_bbpress())) {

	$gp_settings['sidebar'] = "default";
	$gp_settings['layout'] = "fullwidth";
	$gp_settings['frame'] = "frame";
	$gp_settings['title'] = $theme_page_title;
	$gp_settings['breadcrumbs'] = $theme_page_breadcrumbs; 
	$gp_settings['search'] = $theme_page_search;
	$gp_settings['meta_date'] = "1";
	$gp_settings['meta_author'] = "1";
	$gp_settings['meta_comments'] = "1";
	

/*************************** Categories, Archives etc. ***************************/

} elseif(is_archive() OR is_search()) {

	$gp_settings['thumbnail_width'] = $theme_cat_thumbnail_width;
	$gp_settings['thumbnail_height'] = $theme_cat_thumbnail_height;
	$gp_settings['image_wrap'] = $theme_cat_image_wrap;
	$gp_settings['reflection'] = $theme_cat_image_reflection;
	$gp_settings['shadow'] = $theme_cat_image_shadow;
	$gp_settings['sidebar'] = $theme_cat_sidebar;
	$gp_settings['layout'] = $theme_cat_layout;
	$gp_settings['frame'] = $theme_cat_frame;
	$gp_settings['title'] = $theme_cat_title;		
	$gp_settings['breadcrumbs'] = $theme_cat_breadcrumbs;
	$gp_settings['search'] = $theme_cat_search;	
	$gp_settings['content_display'] = $theme_cat_content_display;
	$gp_settings['excerpt_length'] = $theme_cat_excerpt_length;
	$gp_settings['read_more'] = $theme_cat_read_more;
	$gp_settings['meta_date'] = $theme_cat_date;
	$gp_settings['meta_author'] = $theme_cat_author;
	$gp_settings['meta_cats'] = $theme_cat_cats;
	$gp_settings['meta_comments'] = $theme_cat_comments;
	$gp_settings['meta_tags'] = $theme_cat_tags;

	
/*************************** Posts ***************************/

} elseif(is_singular('post')) {
 
	// Show Image
	if(get_post_meta($post->ID, 'ghostpool_show_image', true) && get_post_meta($post->ID, 'ghostpool_show_image', true) != "Default") {
		$gp_settings['show_image'] = get_post_meta($post->ID, 'ghostpool_show_image', true);
	} else {
		$gp_settings['show_image'] = $theme_show_post_image;
	}
	
	// Image Dimensions
	if(get_post_meta($post->ID, 'ghostpool_image_width', true) && get_post_meta($post->ID, 'ghostpool_image_width', true) != "") {
		$gp_settings['image_width'] = get_post_meta($post->ID, 'ghostpool_image_width', true);
	} else {
		$gp_settings['image_width'] = $theme_post_image_width;
	}
	if(get_post_meta($post->ID, 'ghostpool_image_height', true) != "") {
		$gp_settings['image_height'] = get_post_meta($post->ID, 'ghostpool_image_height', true);
	} else {
		$gp_settings['image_height'] = $theme_post_image_height;
	}
	
	// Image Wrap
	if(get_post_meta($post->ID, 'ghostpool_image_wrap', true) && get_post_meta($post->ID, 'ghostpool_image_wrap', true) != "Default") {
		$gp_settings['image_wrap'] = get_post_meta($post->ID, 'ghostpool_image_wrap', true);
	} else {
		$gp_settings['image_wrap'] = $theme_post_image_wrap;
	}

	// Reflection
	$gp_settings['reflection'] = $theme_post_image_reflection;
	
	// Shadow
	$gp_settings['shadow'] = $theme_post_image_shadow;

	// Sidebar
	if(get_post_meta($post->ID, 'ghostpool_sidebar', true) && get_post_meta($post->ID, 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta($post->ID, 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_post_sidebar;
	}
			
	// Layout
	if(is_attachment()) {
		$gp_settings['layout'] = "fullwidth";
	} else {
		if(get_post_meta($post->ID, 'ghostpool_layout', true) && get_post_meta($post->ID, 'ghostpool_layout', true) != "Default") {
			$gp_settings['layout'] = get_post_meta($post->ID, 'ghostpool_layout', true);
		} else {
			$gp_settings['layout'] = $theme_post_layout;
		}
	}

	// Frame
	if(get_post_meta($post->ID, 'ghostpool_frame', true) && get_post_meta($post->ID, 'ghostpool_frame', true) != "Default") {
		$gp_settings['frame'] = get_post_meta($post->ID, 'ghostpool_layout', true);
	} else {
		$gp_settings['frame'] = $theme_post_frame;
	}

	// Title
	if(get_post_meta($post->ID, 'ghostpool_title', true) && get_post_meta($post->ID, 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta($post->ID, 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_post_title;
	} 	
 
	// Breadcrumbs
	if(get_post_meta($post->ID, 'ghostpool_breadcrumbs', true) && get_post_meta($post->ID, 'ghostpool_breadcrumbs', true) != "Default") {
		$gp_settings['breadcrumbs'] = get_post_meta($post->ID, 'ghostpool_breadcrumbs', true);
	} else {
		$gp_settings['breadcrumbs'] = $theme_post_breadcrumbs;
	}
	
	// Search Bar
	if(get_post_meta($post->ID, 'ghostpool_search', true) && get_post_meta($post->ID, 'ghostpool_search', true) != "Default") {
		$gp_settings['search'] = get_post_meta($post->ID, 'ghostpool_search', true);
	} else {
		$gp_settings['search'] = $theme_post_search;
	} 

	// Post Meta						
	$gp_settings['meta_date'] = $theme_post_date;
	$gp_settings['meta_author'] = $theme_post_author;
	$gp_settings['meta_cats'] = $theme_post_cats;
	$gp_settings['meta_comments'] = $theme_post_comments;
	$gp_settings['meta_tags'] = $theme_post_tags;
		
	// Author Info Panel
	$gp_settings['author_info'] = $theme_post_author_info;
						
	// Related Items
	$gp_settings['related_items'] = $theme_post_related_items;
	

/*************************** Pages ***************************/

} else {

	// Show Image
	if(get_post_meta($post->ID, 'ghostpool_show_image', true) && get_post_meta($post->ID, 'ghostpool_show_image', true) != "Default") {
		$gp_settings['show_image'] = get_post_meta($post->ID, 'ghostpool_show_image', true);
	} else {
		$gp_settings['show_image'] = $theme_show_page_image;
	}
	
	// Image Dimensions
	if(get_post_meta($post->ID, 'ghostpool_image_width', true) && get_post_meta($post->ID, 'ghostpool_image_width', true) != "") {
		$gp_settings['image_width'] = get_post_meta($post->ID, 'ghostpool_image_width', true);
	} else {
		$gp_settings['image_width'] = $theme_page_image_width;
	}
	if(get_post_meta($post->ID, 'ghostpool_image_height', true) != "") {
		$gp_settings['image_height'] = get_post_meta($post->ID, 'ghostpool_image_height', true);
	} else {
		$gp_settings['image_height'] = $theme_page_image_height;
	}
	
	// Image Wrap
	if(get_post_meta($post->ID, 'ghostpool_image_wrap', true) && get_post_meta($post->ID, 'ghostpool_image_wrap', true) != "Default") {
		$gp_settings['image_wrap'] = get_post_meta($post->ID, 'ghostpool_image_wrap', true);
	} else {
		$gp_settings['image_wrap'] = $theme_page_image_wrap;
	}

	// Reflection
	$gp_settings['reflection'] = $theme_page_image_reflection;
	
	// Shadow
	$gp_settings['shadow'] = $theme_page_image_shadow;

	// Sidebar
	if(get_post_meta($post->ID, 'ghostpool_sidebar', true) && get_post_meta($post->ID, 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta($post->ID, 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_page_sidebar;
	}
			
	// Layout
	if(get_post_meta($post->ID, 'ghostpool_layout', true) && get_post_meta($post->ID, 'ghostpool_layout', true) != "Default") {
		$gp_settings['layout'] = get_post_meta($post->ID, 'ghostpool_layout', true);
	} else {
		$gp_settings['layout'] = $theme_page_layout;
	}
	
	// Frame
	if(get_post_meta($post->ID, 'ghostpool_frame', true) && get_post_meta($post->ID, 'ghostpool_frame', true) != "Default") {
		$gp_settings['frame'] = get_post_meta($post->ID, 'ghostpool_frame', true);
	} else {
		$gp_settings['frame'] = $theme_page_frame;
	}

	// Title
	if(get_post_meta($post->ID, 'ghostpool_title', true) && get_post_meta($post->ID, 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta($post->ID, 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_page_title;
	} 	
 
	// Breadcrumbs
	if(get_post_meta($post->ID, 'ghostpool_breadcrumbs', true) && get_post_meta($post->ID, 'ghostpool_breadcrumbs', true) != "Default") {
		$gp_settings['breadcrumbs'] = get_post_meta($post->ID, 'ghostpool_breadcrumbs', true);
	} else {
		$gp_settings['breadcrumbs'] = $theme_page_breadcrumbs;
	}
	
	// Search Bar
	if(get_post_meta($post->ID, 'ghostpool_search', true) && get_post_meta($post->ID, 'ghostpool_search', true) != "Default") {
		$gp_settings['search'] = get_post_meta($post->ID, 'ghostpool_search', true);
	} else {
		$gp_settings['search'] = $theme_page_search;
	} 
	
	// Post Meta						
	$gp_settings['meta_date'] = $theme_page_date;
	$gp_settings['meta_author'] = $theme_page_author;
	$gp_settings['meta_comments'] = $theme_page_comments;
	
	// Author Info Panel
	$gp_settings['author_info'] = $theme_page_author_info;
	
}

?>