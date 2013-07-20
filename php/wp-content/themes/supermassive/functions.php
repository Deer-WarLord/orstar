<?php

/////////////////////////////////////// Localisation ///////////////////////////////////////


load_theme_textdomain('gp_lang', get_template_directory() . '/languages');
$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if(is_readable($locale_file)) require_once($locale_file);


/////////////////////////////////////// Theme Information ///////////////////////////////////////


$themename = get_option('current_theme'); // Theme Name
$dirname = strtolower(str_replace(" ", "", get_option('current_theme'))); // Directory Name


/////////////////////////////////////// File Directories ///////////////////////////////////////


define("gp", get_template_directory() . '/');
define("gp_inc", get_template_directory() . '/lib/inc/');
define("gp_scripts", get_template_directory() . '/lib/scripts/');
define("gp_admin", get_template_directory() . '/lib/admin/inc/');
define("gp_bp", get_template_directory() . '/buddypress/');
define("BP_THEME_URL", get_template_directory_uri());


/////////////////////////////////////// Additional Functions ///////////////////////////////////////


// Main Theme Options
require_once(gp_admin . 'theme-options.php');
require(gp_inc . 'options.php');

// Meta Options
require_once(gp_admin . 'theme-meta-options.php');

// Widgets
//require_once(gp_admin . 'theme-widgets.php');  /* Remove // to enable Custom Content widget */

// Sidebars
require_once(gp_admin . 'theme-sidebars.php');

// Shortcodes
require_once(gp_admin . 'theme-shortcodes.php');

// Custom Post Types
require_once(gp_admin . 'theme-post-types.php');

// Envato Toolkit (Auto Updater)
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(!is_plugin_active('envato-wordpress-toolkit-master/index.php') && is_admin()) { include_once (gp_admin . 'envato-wordpress-toolkit-master/index.php'); }

// TinyMCE
if(is_admin()) { require_once (gp_admin . 'tinymce/tinymce.php'); }

// WP Show IDs
if(is_admin()) { require_once(gp_admin . 'wp-show-ids/wp-show-ids.php'); }

// Import/Export Widgets
if(is_admin()) { require_once(gp_admin . 'widget-settings-importexport/widget_data.php'); }

// Auto Install
if(is_admin()) { require_once(gp_admin . 'theme-auto-install.php'); }

// Image Resizer
require_once(gp_scripts . 'image-resizer.php');

// BuddyPress Functions
if(function_exists('bp_is_active') && file_exists(gp_bp.'functions-buddypress.php')) { require_once(gp_bp . 'functions-buddypress.php'); }

// Load Skins
if(isset($_GET['skin']) && $_GET['skin'] == "default") {
	$skin = $_COOKIE['SkinCookie']; 
	setcookie('SkinCookie', $skin, time()-3600);
	$skin = $theme_skin;
} elseif(isset($_GET['skin'])) {
	$skin = $_GET['skin'];
	setcookie('SkinCookie', $skin);			
} elseif(isset($_COOKIE['SkinCookie'])) {
	$skin = $_COOKIE['SkinCookie']; 
}


/////////////////////////////////////// Enqueue Styles ///////////////////////////////////////


function gp_enqueue_styles() { 
	if(!is_admin()){
	
		require(gp_inc . 'options.php'); global $post, $skin;

		wp_enqueue_style('reset', get_template_directory_uri().'/lib/css/reset.css');

		wp_enqueue_style('gp-style', get_stylesheet_directory_uri().'/style.css');
	
		wp_enqueue_style('prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/css/prettyPhoto.css');	

		if((isset($_GET['skin']) && $_GET['skin'] != "default") OR (isset($_COOKIE['SkinCookie']) && $_COOKIE['SkinCookie'] != "default")) {
			
			wp_enqueue_style('style-skin', get_template_directory_uri().'/style-'.$skin.'.css');		
		
		} else {

			if((is_singular() && !is_attachment() && !is_404()) && (get_post_meta($post->ID, 'ghostpool_skin', true) && get_post_meta($post->ID, 'ghostpool_skin', true) != "Default")) {

				wp_enqueue_style('style-skin', get_template_directory_uri().'/style-'.get_post_meta($post->ID, 'ghostpool_skin', true).'.css');		
	
			} else {
		
				wp_enqueue_style('style-skin', get_template_directory_uri().'/style-'.$theme_skin.'.css');
				
			}
		
		}
				
		if($theme_custom_stylesheet) {
		
			wp_enqueue_style('style-theme-custom', get_template_directory_uri().'/'.$theme_custom_stylesheet);		
		
		}
		
		if((is_single() OR is_page()) && get_post_meta($post->ID, 'ghostpool_custom_stylesheet', true)) {
		
			wp_enqueue_style('style-page-custom', get_template_directory_uri().'/'.get_post_meta($post->ID, 'ghostpool_custom_stylesheet', true));		
		
		}
	
	}
}
add_action('wp_print_styles', 'gp_enqueue_styles');


/////////////////////////////////////// Enqueue Scripts ///////////////////////////////////////


function gp_enqueue_scripts() { 
	if(!is_admin()){
	
		require(gp_inc . 'options.php');

		wp_enqueue_script('jquery');
		
		wp_enqueue_script('jquery-ui-accordion');
		
		wp_enqueue_script('jquery-ui-tabs');
				
		if(is_singular()) wp_enqueue_script('comment-reply');
		
		wp_enqueue_script('swfobject', 'http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
		
		wp_enqueue_script('jwplayer', get_template_directory_uri().'/lib/scripts/mediaplayer/jwplayer.js', array('jquery'));
		
		wp_enqueue_script('cycle-slider', get_template_directory_uri().'/lib/scripts/jquery.cycle.all.js', array('jquery'));
		
		wp_enqueue_script('prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'));
		
		//wp_enqueue_script('flashfix', get_template_directory_uri().'/lib/scripts/flashfix.js', array('jquery'));

		wp_enqueue_script('reflection', get_template_directory_uri().'/lib/scripts/reflection.js', array('jquery'));

		wp_enqueue_script('cufon', get_template_directory_uri().'/lib/scripts/cufon-yui.js', array('jquery'));
		
		if($theme_chunkfive) wp_enqueue_script('chunkfive', get_template_directory_uri().'/lib/scripts/fonts/ChunkFive_400.font.js', array('cufon'));
		
		if($theme_journal) wp_enqueue_script('journal', get_template_directory_uri().'/lib/scripts/fonts/Journal_400.font.js', array('cufon'));
		
		if($theme_leaguegothic) wp_enqueue_script('leaguegothic', get_template_directory_uri().'/lib/scripts/fonts/League_Gothic_400.font.js', array('cufon'));
		
		if($theme_nevis) wp_enqueue_script('nevis', get_template_directory_uri().'/lib/scripts/fonts/nevis_700.font.js', array('cufon'));
		
		if($theme_quicksand) wp_enqueue_script('quicksand', get_template_directory_uri().'/lib/scripts/fonts/Quicksand_Book.font.js', array('cufon'));
		
		if($theme_sansation) wp_enqueue_script('sansation', get_template_directory_uri().'/lib/scripts/fonts/Sansation_400-Sansation_700.font.js', array('cufon'));
		
		if($theme_vegur) wp_enqueue_script('vegur', get_template_directory_uri().'/lib/scripts/fonts/Vegur_400-Vegur_700-Vegur_300.font.js', array('cufon'));
	
		wp_enqueue_script('custom-js', get_template_directory_uri().'/lib/scripts/custom.js', array('jquery'));
			
	}
}
add_action('wp_print_scripts', 'gp_enqueue_scripts');


/////////////////////////////////////// WP Header Hooks ///////////////////////////////////////


function gp_wp_header() {
	
	require(gp_inc . 'options.php');
		
    if($theme_favicon_ico) echo '<link rel="shortcut icon" href="'.$theme_favicon_ico.'" /><link rel="icon" href="'.$theme_favicon_ico.'" type="image/vnd.microsoft.icon" />';
    
    if($theme_favicon_png) echo '<link rel="icon" type="image/png" href="'.$theme_favicon_png.'" />';
    
    if($theme_apple_icon) echo '<link rel="apple-touch-icon" href="'.$theme_apple_icon.'" />';
   
   	if($theme_custom_css) echo '<style>'.stripslashes($theme_custom_css).'</style>';

	echo stripslashes($theme_scripts);
	
	echo '
	<!--[if lte IE 9]>
	<style>
	#user-panel, .frame #content-wrapper, .sc-button, #nav .sub-menu, .separate > div, .first.joint > div, .middle.joint > div, .last.joint > div, .accordion .panel, .bypostauthor .post-author, #footer-top-inner, .dropcap2, .dropcap3, .dropcap4, .dropcap5, .ui-tabs-panel, .notify, .error, .success, .bp-wrapper .button, .button.submit, .bp-wrapper .generic-button a, .bp-wrapper ul.button-nav li a, .bp-wrapper .item-list .activity-meta a, .bp-wrapper .item-list .acomment-options a, .bp-wrapper .activity-meta a:hover span, .widget .item-options a, .widget .item-options a.selected, .bp-wrapper #content-wrapper div.item-list-tabs, .bp-wrapper #content-wrapper #item-header #item-header-content .activity, .bp-wrapper #content-wrapper span.activity, .bp-wrapper #content-wrapper .activity-content .activity-meta a, .bp-wrapper #content-wrapper .activity-content .date, .bp-wrapper #content-wrapper .acomment-options a, .bp-wrapper #content-wrapper .activity-list .activity-content .activity-header, .bp-wrapper #content-wrapper .activity-list .activity-content .comment-header, .bp-wrapper #content-wrapper .acomment-meta, .bp-wrapper #content-wrapper .activity-meta a span, .bp-wrapper #content-wrapper input[type="password"], .bp-wrapper #content-wrapper form#whats-new-form #whats-new-textarea, .bp-wrapper #content-wrapper div.activity-comments form .ac-textarea, .bp-wrapper #content-wrapper #message-thread .envelope-info,	 .bp-wrapper #content-wrapper table.forum, .bp-wrapper #content-wrapper .forum-list-container, .bp-wrapper #content-wrapper .standard-form#signup_form div div.error, .bp-wrapper #content-wrapper #message, .wp-pagenavi span, .wp-pagenavi.cat-navi a, .wp-pagenavi.comment-navi a, .wp-pagenavi.post-navi a span {
		behavior: url("'.get_template_directory_uri().'/lib/scripts/pie/PIE.php");
	}
	</style>
	<![endif]-->';
	
}
add_action('wp_head', 'gp_wp_header');


/////////////////////////////////////// Navigation Menus ///////////////////////////////////////


add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(array(
		'header-nav' => __('Header Navigation', 'gp_lang'),
		'footer-nav' => __('Footer Navigation', 'gp_lang')
	));
}


/////////////////////////////////////// Other Features ///////////////////////////////////////


// Featured images
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);

// Background customizer
global $wp_version;
if(version_compare($wp_version, '3.4', '>=')) {
		add_theme_support('custom-background');
} else {
	add_custom_background();
}

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Set the content width based on the theme's design and stylesheet.
if(!isset($content_width)) $content_width = 640;

// Add default posts and comments RSS feed links to <head>.
add_theme_support('automatic-feed-links');

// bbPress Support
if(is_admin() && function_exists('is_bbpress')) { add_theme_support('bbpress'); }


/////////////////////////////////////// Excerpts ///////////////////////////////////////


// Character Length
function new_excerpt_length($length) {
	return 10000;
}
add_filter('excerpt_length', 'new_excerpt_length');

function excerpt($count, $ellipsis = '...') {
	$excerpt = get_the_excerpt();
	$excerpt = strip_tags($excerpt);
	if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
		if(mb_strlen($excerpt) > $count) {
			$excerpt = mb_substr($excerpt, 0, $count).$ellipsis;
		}
	} else {
		if(strlen($excerpt) > $count) {
			$excerpt = substr($excerpt, 0, $count).$ellipsis;
		}	
	}
	return $excerpt;
}

// Replace Excerpt Ellipsis
function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');
remove_filter('the_excerpt', 'wpautop');

// Content More Text
function new_more_link($more_link, $more_link_text) {
	return str_replace('more-link', 'more-link read-more', $more_link);
}
add_filter('the_content_more_link', 'new_more_link', 10, 2);


/////////////////////////////////////// Title Length ///////////////////////////////////////


function the_title_limit($count, $ellipsis = '...') {
	$title = the_title('','',FALSE);
	$title = strip_tags($title);
	if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
		if(mb_strlen($title) > $count) {
			$title = mb_substr($title, 0, $count).$ellipsis;
		}
	} else {
		if(strlen($title) > $count) {
			$title = substr($title, 0, $count).$ellipsis;
		}	
	}
	return $title;
}


/////////////////////////////////////// Add Excerpt Support To Pages ///////////////////////////////////////


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


/////////////////////////////////////// Shortcode Support For Text Widget ///////////////////////////////////////


add_filter('widget_text', 'do_shortcode');


/////////////////////////////////////// Breadcrumbs ///////////////////////////////////////


function the_breadcrumb() {
global $post;
	if (!is_home()) {
		echo '<a href="'.home_url().'">'.__('Home', 'gp_lang').'</a>';
		if (is_category()) {
			echo " / ";
			echo single_cat_title();
		}
		elseif(is_singular('post') && !is_attachment()) {
			$cat = get_the_category(); $cat = $cat[0];
			echo " / ";
			if(get_the_category()) { 
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' / ');
			}
			echo the_title();
		}		
		elseif (is_search()) {
			echo " / ";
			_e('Search', 'gp_lang');
		}		
		elseif (is_page() && $post->post_parent) {
			echo ' / <a href="'.get_permalink($post->post_parent).'">';
			echo get_the_title($post->post_parent);
			echo "</a> / ";
			echo the_title();		
		}
		elseif (is_page() OR is_attachment()) {
			echo " / "; 
			echo the_title();
		}
		elseif (is_author()) {
			echo wp_title(' / ', true, 'left');
			echo "'s ".__('Posts', 'gp_lang');
		}
		elseif (is_404()) {
			echo " / "; 
			_e('Page Not Found', 'gp_lang');;
		}
		elseif (is_archive()) {
			echo wp_title(' / ', true, 'left');
		}
	}
}


/////////////////////////////////////// Page Navigation ///////////////////////////////////////


function gp_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     
	 if (get_query_var('paged')) {
		 $paged = get_query_var('paged');
	 } elseif (get_query_var('page')) {
		 $paged = get_query_var('page');
	 } else {
		 $paged = 1;
	 }

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
	
     if(1 != $pages)
     {
        echo "<div class='clear'></div><div class='wp-pagenavi cat-navi'>";
		echo '<span class="pages">'.__('Page', 'gp_lang').' '.$paged.' '.__('of', 'gp_lang').' '.$pages.'</span>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}


/////////////////////////////////////// Shortcode Empty Paragraph Fix ///////////////////////////////////////


// Plugin URI: http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/
add_filter('the_content', 'shortcode_empty_paragraph_fix');
function shortcode_empty_paragraph_fix($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']',
		']<br />' => ']'
	);

	$content = strtr($content, $array);

	return $content;
}


/////////////////////////////////////// Custom Media Gallery Field ///////////////////////////////////////


function ghostpool_attachment_fields_to_edit($form_fields, $post) {
	$form_fields["ghostpool_video_url"] = array(
		"label" => __('Audio/Video URL', 'gp_lang'),
		"input" => "text",
		"value" => get_post_meta($post->ID, "_ghostpool_video_url", true),
		"helps" => __('The URL of your video or audio file (YouTube/Vimeo/FLV/MP4/M4V/MP3).', 'gp_lang'),
	);
   return $form_fields;
}
add_filter("attachment_fields_to_edit", "ghostpool_attachment_fields_to_edit", null, 2);

function ghostpool_attachment_fields_to_save($post, $attachment) {
	if(isset($attachment['ghostpool_video_url'])){
		update_post_meta($post['ID'], '_ghostpool_video_url', $attachment['ghostpool_video_url']);
	}	
	return $post;
}
add_filter("attachment_fields_to_save", "ghostpool_attachment_fields_to_save", null , 2);


/////////////////////////////////////// Redirect to Theme Options after Activation ///////////////////////////////////////


if(is_admin() && isset($_GET['activated']) && $pagenow == "themes.php") {
	add_action('admin_head','ct_option_setup');
	header('Location: '.admin_url().'themes.php?page=theme-options.php');
}

?>