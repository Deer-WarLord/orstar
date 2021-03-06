<?php // Meta Options (WPShout.com)

require(gp_inc . 'options.php');

add_action('admin_menu', 'ghostpool_create_meta_box');
add_action('save_post', 'ghostpool_save_meta_data');

function ghostpool_create_meta_box() {
	add_meta_box('gp-theme-options', __('Post Settings', 'gp_lang'), 'post_meta_boxes', 'post', 'normal', 'high');
	add_meta_box('gp-theme-options', __('Page Settings', 'gp_lang'), 'page_meta_boxes', 'page', 'normal', 'high');
	add_meta_box('gp-theme-options', __('Slide Settings', 'gp_lang'), 'slide_meta_boxes', 'slide', 'normal', 'high');
}


/*************************** Post Settings ***************************/

function ghostpool_post_meta_boxes() {

	$meta_boxes = array(

	'thumbnail_settings' => array('name' => 'thumbnail_settings', 'type' => 'open', 'desc' => __('Controls the thumbnails used on category, archive, tag and search result pages.', 'gp_lang'), 'title' => __('Thumbnail Settings', 'gp_lang')),
	
		'ghostpool_thumbnail_width' => array('name' => 'ghostpool_thumbnail_width', 'title' => __('Thumbnail Width', 'gp_lang'), 'desc' => __('The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'std' => '', 'size' => 'small', 'details' => 'px'),	
				
		'ghostpool_thumbnail_height' => array('name' => 'ghostpool_thumbnail_height', 'title' => __('Thumbnail Height', 'gp_lang'), 'desc' => __('The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),	

	array('type' => 'separator'),		
	array('type' => 'close'),

	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'desc' => __('Controls the featured image displayed within this page.', 'gp_lang'), 'title' => __('Image Settings', 'gp_lang')),

		'ghostpool_show_image' => array('name' => 'ghostpool_show_image', 'title' => __('Featured Image', 'gp_lang'), 'desc' => __('Choose whether to display the featured image within your page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'type' => 'select'),	
		
		'ghostpool_image_width' => array('name' => 'ghostpool_image_width', 'title' => __('Image Width', 'gp_lang'), 'desc' => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_image_height' => array('name' => 'ghostpool_image_height', 'title' => __('Image Height', 'gp_lang'), 'desc' => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),
		
		'ghostpool_image_wrap' => array('name' => 'ghostpool_image_wrap', 'title' => __('Image Wrap', 'gp_lang'), 'desc' => __('Choose whether the page content wraps around the featured image.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'portfolio_settings' => array('name' => 'portfolio_settings', 'type' => 'open', 'desc' => __('Can be used when your posts are displayed in <code>[posts]</code> shortcodes.', 'gp_lang'), 'title' => __('Portfolio Settings', 'gp_lang')),
		
		'ghostpool_link_type' => array('name' => 'ghostpool_link_type', 'title' => __('Link Type', 'gp_lang'), 'desc' => __('Choose how your portfolio link opens.', 'gp_lang'), 'options' => array('Page' => __('Page', 'gp_lang'), 'Lightbox Image' => __('Lightbox Image', 'gp_lang'), 'Lightbox Video' => __('Lightbox Video', 'gp_lang'), 'None' => __('None', 'gp_lang')), 'std' => 'Page', 'type' => 'select'),
	
		'ghostpool_custom_url' => array('name' => 'ghostpool_custom_url', 'title' => __('Custom URL', 'gp_lang'), 'desc' => __('A custom URL which your image links to (overrides the default post URL).', 'gp_lang'), 'type' => 'text', 'std' => '', 'details' => ''),
		
		'ghostpool_lightbox_content' => array('name' => 'ghostpool_lightbox_content', 'title' => __('Lightbox Content', 'gp_lang'), 'desc' => __('Upload images/audio/videos that will be opened in the lightbox.', 'gp_lang'), 'type' => 'gallery'),
		
		array('type' => 'separator'),		
		array('type' => 'close'),
		
	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'desc' => __('General formatting settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),
			
		'ghostpool_sidebar' => array('name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'gp_lang'), 'desc' => __('Choose which sidebar area to display on this page.', 'gp_lang'), 'std' => 'default', 'type' => 'select_sidebar'),
			
		'ghostpool_layout' => array('name' => 'ghostpool_layout', 'title' => __('Layout', 'gp_lang'), 'desc' => __('Choose the layout for this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_frame' => array('name' => 'ghostpool_frame', 'title' => __('Frame', 'gp_lang'), 'desc' => __('Choose whether to display a page frame.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'frame' => __('Enable', 'gp_lang'), 'no-frame' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_title' => array('name' => 'ghostpool_title', 'title' => __('Title', 'gp_lang'), 'desc' => __('Choose whether to display the title on this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		array('type' => 'divider'),
				
		'ghostpool_breadcrumbs' => array('name' => 'ghostpool_breadcrumbs', 'title' => __('Breadcrumbs', 'gp_lang'), 'desc' => __('Choose whether to display breadcrumbs on this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_search' => array('name' => 'ghostpool_search', 'title' => __('Search Bar', 'gp_lang'), 'desc' => __('Choose whether to display the search bar.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_skin' => array('name' => 'ghostpool_skin', 'title' => __('Page Skin', 'gp_lang'), 'desc' => __('Choose the skin of this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'obsidian' => __('Obsidian', 'gp_lang'), 'obsidian-grunge' => __('Obsidian Grunge', 'gp_lang'), 'chocolate' => __('Chocolate', 'gp_lang'), 'arcticfox' => __('Arctic Fox', 'gp_lang'), 'tiger' => __('Tiger', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_custom_stylesheet' => array('name' => 'ghostpool_custom_stylesheet', 'title' => __('Custom Stylesheet URL', 'gp_lang'), 'desc' => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code>.', 'gp_lang'), 'std' => '', 'type' => 'text', 'details' => ''),

		array('type' => 'divider'),
		
		'ghostpool_top_content' => array('name' => 'ghostpool_top_content', 'title' => __('Top Content', 'gp_lang'), 'desc' => __('Add content above your main content and sidebar including text, images and shortcodes.', 'gp_lang'), 'type' => 'textarea', 'size' => 'large'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('ghostpool_post_meta_boxes', $meta_boxes);
}


/*************************** Page Options ***************************/

function ghostpool_page_meta_boxes() {
	
	$meta_boxes = array(
	
	'thumbnail_settings' => array('name' => 'thumbnail_settings', 'type' => 'open', 'desc' => __('Controls the thumbnails used on category, archive, tag and search result pages.', 'gp_lang'), 'title' => __('Thumbnail Settings', 'gp_lang')),
	
		'ghostpool_thumbnail_width' => array('name' => 'ghostpool_thumbnail_width', 'title' => __('Thumbnail Width', 'gp_lang'), 'desc' => __('The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),	
				
		'ghostpool_thumbnail_height' => array('name' => 'ghostpool_thumbnail_height', 'title' => __('Thumbnail Height', 'gp_lang'), 'desc' => __('The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),	

	array('type' => 'separator'),		
	array('type' => 'close'),

	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'desc' => __('Controls the featured image displayed within this page.', 'gp_lang'), 'title' => __('Image Settings', 'gp_lang')),

		'ghostpool_show_image' => array('name' => 'ghostpool_show_image', 'title' => __('Featured Image', 'gp_lang'), 'desc' => __('Choose whether to display the featured image within your page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
		'ghostpool_image_width' => array('name' => 'ghostpool_image_width', 'title' => __('Image Width', 'gp_lang'), 'desc' => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_image_height' => array('name' => 'ghostpool_image_height', 'title' => __('Image Height', 'gp_lang'), 'desc' => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'), 'std' => '', 'type' => 'text', 'size' => 'small', 'details' => 'px'),
		
		'ghostpool_image_wrap' => array('name' => 'ghostpool_image_wrap', 'title' => __('Image Wrap', 'gp_lang'), 'desc' => __('Choose whether the page content wraps around the featured image.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'desc' => __('General formatting settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),
	
		'ghostpool_sidebar' => array('name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'gp_lang'), 'desc' => __('Choose which sidebar area to display on this page.', 'gp_lang'), 'std' => 'default', 'type' => 'select_sidebar'),
		
		'ghostpool_layout' => array('name' => 'ghostpool_layout', 'title' => __('Layout', 'gp_lang'), 'desc' => __('Choose the layout for this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_frame' => array('name' => 'ghostpool_frame', 'title' => __('Frame', 'gp_lang'), 'desc' => __('Choose whether to display a page frame.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'frame' => __('Enable', 'gp_lang'), 'no-frame' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
	
		'ghostpool_title' => array('name' => 'ghostpool_title', 'title' => __('Title', 'gp_lang'), 'desc' => __('Choose whether to display the title on this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		array('type' => 'divider'),
				
		'ghostpool_breadcrumbs' => array('name' => 'ghostpool_breadcrumbs', 'title' => __('Breadcrumbs', 'gp_lang'), 'desc' => __('Choose whether to display breadcrumbs on this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_search' => array('name' => 'ghostpool_search', 'title' => __('Search Bar', 'gp_lang'), 'desc' => __('Choose whether to display the search bar.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_skin' => array('name' => 'ghostpool_skin', 'title' => __('Page Skin', 'gp_lang'), 'desc' => __('Choose the skin of this page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'obsidian' => __('Obsidian', 'gp_lang'), 'obsidian-grunge' => __('Obsidian Grunge', 'gp_lang'), 'chocolate' => __('Chocolate', 'gp_lang'), 'arcticfox' => __('Arctic Fox', 'gp_lang'), 'tiger' => __('Tiger', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_custom_stylesheet' => array('name' => 'ghostpool_custom_stylesheet', 'title' => __('Custom Stylesheet URL', 'gp_lang'), 'desc' => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code>.', 'gp_lang'), 'std' => '', 'type' => 'text', 'details' => ''),

		array('type' => 'divider'),
		
		'ghostpool_top_content' => array('name' => 'ghostpool_top_content', 'title' => __('Top Content', 'gp_lang'), 'desc' => __('Add content above your main content and sidebar including text, images and shortcodes.', 'gp_lang'), 'type' => 'textarea', 'size' => 'large'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('ghostpool_page_meta_boxes', $meta_boxes);
}


/*************************** Slide Options ***************************/
	 
function ghostpool_slide_meta_boxes() {

	$meta_boxes = array(

	'slide_type_settings' => array('name' => 'slide_type_settings', 'type' => 'open', 'title' => __('Slide Type Settings', 'gp_lang'), 'desc' => __('Choose the slider type.', 'gp_lang')),
	
		'ghostpool_slide_type' => array('name' => 'ghostpool_slide_type', 'title' => __('Slide Type', 'gp_lang'), 'desc' => __('Choose the slide type.', 'gp_lang'), 'options' => array('Image/Video Slide' => __('Image/Video Slide', 'gp_lang'), 'Custom Slide' => __('Custom Slide', 'gp_lang')), 'std' => 'Image/Video Slide', 'type' => 'select'),
		
		'ghostpool_slide_timeout' => array('name' => 'ghostpool_slide_timeout', 'title' => __('Slide Timeout', 'gp_lang'), 'std' => '', 'desc' => __('The number of seconds this slide remains in view for (match the length of your video to the timeout value).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => __('seconds', 'gp_lang')),
		
	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'general_settings' => array('name' => 'general_settings', 'type' => 'open', 'desc' => __('General product slide settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),

		'ghostpool_slide_type' => array('name' => 'ghostpool_slide_type', 'title' => __('Slide Type', 'gp_lang'), 'desc' => __('Choose the slide type.', 'gp_lang'), 'options' => array('Image/Video Slide' => __('Image/Video Slide', 'gp_lang'), 'Custom Slide' => __('Custom Slide', 'gp_lang')), 'std' => 'Image/Video Slide', 'type' => 'select'),
		
		'ghostpool_slide_timeout' => array('name' => 'ghostpool_slide_timeout', 'title' => __('Slide Timeout', 'gp_lang'), 'std' => '', 'desc' => __('The number of seconds this slide remains in view for (match the length of your video to the timeout value).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => __('seconds', 'gp_lang')),
			
		'ghostpool_slide_url' => array('name' => 'ghostpool_slide_url', 'title' => __('Slide URL', 'gp_lang'), 'desc' => __('Enter the URL you want your slide to link to.', 'gp_lang'), 'type' => 'text', 'std' => '', 'details' => '', 'size' => ''),

		'ghostpool_slide_link_type' => array('name' => 'ghostpool_slide_link_type', 'title' => __('Link Type', 'gp_lang'), 'desc' => __('Choose how your slide links to the URL you provided to the left.', 'gp_lang'), 'options' => array('Page' => __('Page', 'gp_lang'), 'Lightbox Image' => __('Lightbox Image', 'gp_lang'), 'Lightbox Video' => __('Lightbox Video', 'gp_lang'), 'None' => __('None', 'gp_lang')), 'std' => 'Page', 'type' => 'select'),
		
		'ghostpool_slide_reflection' => array('name' => 'ghostpool_slide_reflection', 'title' => __('Image Reflection', 'gp_lang'), 'desc' => __('Add a reflection to your image.', 'gp_lang'), 'std' => '', 'type' => 'checkbox'),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'video_settings' => array('name' => 'video_settings', 'type' => 'open', 'desc' => __('The settings for a video used in this slide.', 'gp_lang'), 'title' => __('Video Settings', 'gp_lang')),
	
		'ghostpool_slide_video' => array('name' => 'ghostpool_slide_video', 'title' => __('Video URL', 'gp_lang'), 'desc' => __('The URL of your video or audio file (YouTube/Vimeo/FLV/MP4/M4V/MP3).', 'gp_lang'), 'type' => 'upload'),

		'ghostpool_webm_mp4_slide_video' => array('name' => 'ghostpool_webm_mp4_slide_video', 'title' => __('HTML5 Video URL (Safari/Chrome)', 'gp_lang'), 'desc' => __('Enter your HTML5 video URL for Safari/Chrome (WEBM/MP4).', 'gp_lang'), 'type' => 'upload'),

		'ghostpool_ogg_slide_video' => array('name' => 'ghostpool_ogg_slide_video', 'title' => __('HTML5 Video URL (FireFox/Opera)', 'gp_lang'), 'desc' => __('Enter your HTML5 video URL for FireFox/Opera (OGG/OGV).', 'gp_lang'), 'type' => 'upload'),
				
		'ghostpool_slide_autostart_video' => array('name' => 'ghostpool_slide_autostart_video', 'title' => __('Autostart Video', 'gp_lang'), 'desc' => __('Plays the video automatically when the slide comes into view (works in the first slide only).', 'gp_lang'), 'std' => '', 'type' => 'checkbox'),

		array('type' => 'divider'),
		
		'ghostpool_slide_video_priority' => array('name' => 'ghostpool_slide_video_priority', 'title' => __('Video Priority', 'gp_lang'), 'desc' => __('If you have provided both flash and HTML5 videos, select which one will take priority if the browser can play both.', 'gp_lang'), 'options' => array('Flash' => __('Flash', 'gp_lang'), 'HTML5' => __('HTML5', 'gp_lang')), 'std' => 'Flash', 'type' => 'select'),
		
		'ghostpool_slide_video_controls' => array('name' => 'ghostpool_slide_video_controls', 'title' => __('Video Controls', 'gp_lang'), 'desc' => __('Choose how to display the video controls (does not apply to Vimeo videos).', 'gp_lang'), 'options' => array('None' => __('None', 'gp_lang'), 'Bottom' => __('Bottom', 'gp_lang'), 'Over' => __('Over', 'gp_lang')), 'std' => 'None', 'type' => 'select'),
		
	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'caption_settings' => array('name' => 'caption_settings', 'type' => 'open', 'desc' => __('The settings for a caption in this slide.', 'gp_lang'),  'title' => __('Caption Settings', 'gp_lang')),
		
		'ghostpool_slide_caption_type' => array('name' => 'ghostpool_slide_caption_type', 'title' => __('Caption Type', 'gp_lang'), 'desc' => __('The type of caption for your slide.', 'gp_lang'), 'options' => array('None' => __('None', 'gp_lang'), 'Left Frame' => __('Left Frame', 'gp_lang'), 'Right Frame' => __('Right Frame', 'gp_lang'), 'Top Left Overlay' => __('Top Left Overlay', 'gp_lang'), 'Top Right Overlay' => __('Top Right Overlay', 'gp_lang'), 'Bottom Left Overlay' => __('Bottom Left Overlay', 'gp_lang'), 'Bottom Right Overlay' => __('Bottom Right Overlay', 'gp_lang')), 'std' => 'None', 'type' => 'select'),
		
		'ghostpool_slide_caption_style' => array('name' => 'ghostpool_slide_caption_style', 'title' => __('Caption Style', 'gp_lang'), 'desc' => __('The style of caption for your slide.', 'gp_lang'), 'options' => array('Dark' => __('Dark', 'gp_lang'), 'Light' => __('Light', 'gp_lang')), 'std' => 'Dark', 'type' => 'select'),

		'ghostpool_hide_slide_title' => array('name' => 'ghostpool_hide_slide_title', 'title' => __('Hide Slider Title', 'gp_lang'), 'desc' => __('Hide the page title from appearing in the caption.', 'gp_lang'), 'std' => '', 'type' => 'checkbox'),

	array('type' => 'separator'),		
	array('type' => 'close'),

	'custom_slide_settings' => array('name' => 'custom_slide_settings', 'type' => 'open', 'title' => __('Custom Slide Settings', 'gp_lang'), 'desc' => __('Add your own content (text/images/video) to the text box above.', 'gp_lang')),
		
		'ghostpool_slide_bg_color' => array('name' => 'ghostpool_slide_bg_color', 'title' => __('Background Color', 'gp_lang'), 'desc' => __('Background color for the slide (e.g. #ff0000).', 'gp_lang'), 'type' => 'text', 'std' => '', 'details' => '', 'size' => ''),

		'ghostpool_slide_bg_image' => array('name' => 'ghostpool_slide_bg_image', 'title' => __('Background Image', 'gp_lang'), 'desc' => __('Background image for the slide (e.g. http://example.com/images/bg.jpg).', 'gp_lang'), 'extras' => 'getimage', 'type' => 'text', 'std' => '', 'details' => '', 'size' => ''),

		'ghostpool_slide_bg_repeat' => array('name' => 'ghostpool_slide_bg_repeat', 'title' => __('Background Image Repeat', 'gp_lang'), 'desc' => __('Choose how to repeat your background image.', 'gp_lang'), 'options' => array('Repeat' => __('Repeat', 'gp_lang'), 'Repeat Horizontally' => __('Repeat Horizontally', 'gp_lang'), 'Repeat Vertically' => __('Repeat Vertically', 'gp_lang'), 'None' => __('None', 'gp_lang')), 'std' => 'Repeat', 'type' => 'select'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('ghostpool_slide_meta_boxes', $meta_boxes);
}

/*************************** Meta Fields ***************************/

function post_meta_boxes() {
	global $post;
	$meta_boxes = ghostpool_post_meta_boxes();
	
	foreach($meta_boxes as $meta) :
	if(isset($meta['name'])) { $value = get_post_meta($post->ID, $meta['name'], true); }
	if($meta['type'] == 'text')
		get_meta_text($meta, $value);	
	elseif($meta['type'] == 'upload')
		get_meta_upload($meta, $value);			
	elseif($meta['type'] == 'textarea')
		get_meta_textarea($meta, $value);
	elseif($meta['type'] == 'select')
		get_meta_select($meta, $value);
	elseif($meta['type'] == 'select_sidebar')
		get_meta_select_sidebar($meta, $value);			
	elseif($meta['type'] == 'checkbox')
		get_meta_checkbox($meta, $value);			
	elseif($meta['type'] == 'open')
		get_meta_open($meta, $value);		
	elseif($meta['type'] == 'close')
		get_meta_close($meta, $value);
	elseif($meta['type'] == 'divider')
		get_meta_divider($meta, $value);	
	elseif ($meta['type'] == 'separator')
		get_meta_separator($meta, $value);					
	elseif($meta['type'] == 'clear')
		get_meta_clear($meta, $value);
	elseif($meta['type'] == 'gallery')
		get_meta_gallery($meta, $value);		
	endforeach;
}

function page_meta_boxes() {
	global $post;
	$meta_boxes = ghostpool_page_meta_boxes(); 
	
	foreach($meta_boxes as $meta) :
	if(isset($meta['name'])) { $value = get_post_meta($post->ID, $meta['name'], true); }
	if($meta['type'] == 'text')
		get_meta_text($meta, $value);	
	elseif($meta['type'] == 'upload')
		get_meta_upload($meta, $value);			
	elseif($meta['type'] == 'textarea')
		get_meta_textarea($meta, $value);
	elseif($meta['type'] == 'select')
		get_meta_select($meta, $value);
	elseif($meta['type'] == 'select_sidebar')
		get_meta_select_sidebar($meta, $value);			
	elseif($meta['type'] == 'checkbox')
		get_meta_checkbox($meta, $value);			
	elseif($meta['type'] == 'open')
		get_meta_open($meta, $value);		
	elseif($meta['type'] == 'close')
		get_meta_close($meta, $value);
	elseif($meta['type'] == 'divider')
		get_meta_divider($meta, $value);
	elseif ($meta['type'] == 'separator')
		get_meta_separator($meta, $value);					
	elseif($meta['type'] == 'clear')
		get_meta_clear($meta, $value);
	endforeach;
}

function slide_meta_boxes() { 
	global $post;	
	$meta_boxes = ghostpool_slide_meta_boxes(); ?>

	<script>

	jQuery(document).ready(function(){

		var $general_settings = jQuery("#general_settings");
		var $video_settings = jQuery("#video_settings");
		var $caption_settings = jQuery("#caption_settings");
		var $custom_slide_settings = jQuery("#custom_slide_settings");
		
		if (jQuery("select[name='ghostpool_slide_type']").val() == 'Image/Video Slide') {
			$general_settings.removeClass('hidden');
			$video_settings.removeClass('hidden');	
			$caption_settings.removeClass('hidden');
			$custom_slide_settings.addClass('hidden');
		} else if (jQuery("select[name='ghostpool_slide_type']").val() == 'Custom Slide') {
			$general_settings.addClass('hidden');
			$video_settings.addClass('hidden');	
			$caption_settings.addClass('hidden');
			$custom_slide_settings.removeClass('hidden');
		}
		
		jQuery("select[name='ghostpool_slide_type']").change(function() {
			
			if (jQuery(this).val() == 'Image/Video Slide') {
				$general_settings.slideDown();
				$video_settings.slideDown();
				$caption_settings.slideDown();
				$custom_slide_settings.slideUp();
			} else if (jQuery(this).val() == 'Custom Slide') {	
				$general_settings.slideUp();
				$video_settings.slideUp();
				$caption_settings.slideUp();
				$custom_slide_settings.slideDown();
			}
			
		});
		
	});
	</script>
		
		
	<?php foreach($meta_boxes as $meta) :
	if(isset($meta['name'])) { $value = get_post_meta($post->ID, $meta['name'], true); }
	if($meta['type'] == 'text')
		get_meta_text($meta, $value);	
	elseif($meta['type'] == 'upload')
		get_meta_upload($meta, $value);		
	elseif($meta['type'] == 'textarea')
		get_meta_textarea($meta, $value);
	elseif($meta['type'] == 'select')
		get_meta_select($meta, $value);
	elseif($meta['type'] == 'checkbox')
		get_meta_checkbox($meta, $value);			
	elseif($meta['type'] == 'open')
		get_meta_open($meta, $value);		
	elseif($meta['type'] == 'close')
		get_meta_close($meta, $value);
	elseif($meta['type'] == 'divider')
		get_meta_divider($meta, $value);
	elseif ($meta['type'] == 'separator')
		get_meta_separator($meta, $value);			
	elseif($meta['type'] == 'clear')
		get_meta_clear($meta, $value);
	endforeach;
	
} function get_meta_open($args = array(), $value = false){
extract($args); ?>
	
	<div class="meta-settings" id="<?php echo $name; ?>">
	
		<h2><?php echo $title; ?></h2>
		<div class="clear"></div>
	
		<div class="meta-settings-desc"><?php echo $desc; ?></div><div class="clear"></div>
	
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_close($args = array(), $value = false){
extract($args); ?>
	
	</div><div class="clear"></div>
	
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_divider($args = array(), $value = false){
extract($args); ?>

	<div class="clear"></div>
	<div class="divider"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		


<?php } function get_meta_separator($args = array(), $value = false){
extract($args); ?>
	
	<div class="clear"></div>
	<div class="separator"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_clear($args = array(), $value = false){
extract($args); ?>
	
	<div class="clear"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_text($args = array(), $value = false){
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box<?php if($size == "small") { ?> text-small<?php } ?>">
		<?php if($title) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html($value, 1); ?>" size="<?php if($size == "small") { ?>3<?php } else { ?>30<?php } ?>" /><?php if($details) { ?> <span><?php echo $details; ?></span><?php } ?>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_upload($args = array(), $value = false) {
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box uploader">
		<strong><?php echo $title; ?></strong>
		<br/><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="upload" value="<?php echo esc_html($value, 1); ?>" size="30" />
		<input type="button" id="<?php echo $name; ?>_button" class="upload-image-button button" value="<?php _e('Upload', 'gp_lang'); ?>" />
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	
	
<?php } function get_meta_select($args = array(), $value = false) {
extract($args); ?>
	
	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if($title) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php foreach($options as $key=>$option) : ?>
			<?php if($value != "") { ?>
				<option value="<?php echo $key; ?>" <?php if(htmlentities($value, ENT_QUOTES) == $key) echo ' selected="selected"'; ?>><?php echo $option; ?></option>
			<?php } else { ?>
				<option value="<?php echo $key; ?>" <?php if($std == $key) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
			<?php } ?>	
		<?php endforeach; ?>
		</select>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_select_sidebar($args = array(), $value = false) {
extract($args); global $post, $wp_registered_sidebars; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if($title) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<option value="Default" <?php if(htmlentities($value, ENT_QUOTES) == 'Default') echo ' selected="selected"'; ?>>Default</option>
			<?php $sidebars = $wp_registered_sidebars;
			if(is_array($sidebars) && !empty($sidebars)) { foreach($sidebars as $sidebar) { if($value != '') { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if($value == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php } else { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if($std == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php }}} ?>
		</select>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	
	
<?php } function get_meta_textarea($args = array(), $value = false){
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box<?php if($size == "large") { ?> text-large<?php } ?>">	
		<?php if($title) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30"><?php echo esc_html($value, 1); ?></textarea>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_checkbox($args = array(), $value = false){
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if($title) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<?php if(esc_html($value, 1)){ $checked = "checked=\"checked\""; } else { if($std === "true"){ $checked = "checked=\"checked\""; } else { $checked = ""; } } ?>
		<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="false" <?php echo $checked; ?> />
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	</div>


<?php } function get_meta_gallery( $args = array(), $value = false ) {
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
	
		<?php if($title) { ?><strong><?php echo $title; ?></strong><?php } ?>
		<div class="clear"></div>
			
		<?php global $wp_version; if(version_compare($wp_version, '3.5', '>=')) { ?>
			<div id="wp-content-media-buttons" class="wp-media-buttons" style="margin-top: 5px;">
				<a href="#" class="button insert-media add_media" data-editor="content" title="<?php _e('Add Media', 'gp_lang'); ?>"><span class="wp-media-buttons-icon"></span> <?php _e('Add Media', 'gp_lang'); ?></a>
			</div>
		<?php } else { ?>
			<br/><a href="media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=image&amp;TB_iframe=true&amp;width=640&amp;height=790" id="add_image" class="thickbox button" title="<?php _e('Add Media', 'gp_lang'); ?>" onclick="return false;"><?php _e('Add Media', 'gp_lang'); ?></a> <a href="media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=image&amp;tab=gallery&amp;TB_iframe=true&amp;width=640&amp;height=790" id="add_image" class="thickbox button" title="<?php _e('View Media', 'gp_lang'); ?>" onclick="return false;"><?php _e('View Media', 'gp_lang'); ?></a>
		<?php } ?>
		
		<div class="clear"></div>
		
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		
		<?php $image_url = site_url().'/wp-includes/images/crystal/video.png';
		$args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => -1, 'orderby' => 'date', 'order' => 'desc', 'post__not_in' => array(get_post_thumbnail_id())); $attachments = get_children($args); ?>		
		<?php if($attachments) { foreach ($attachments as $attachment) { ?>
			<?php if($attachment->post_mime_type == 'image/jpeg' OR $attachment->post_mime_type == 'image/jpg' OR $attachment->post_mime_type == 'image/png' OR $attachment->post_mime_type == 'image/gif') { $image = vt_resize($attachment->ID, '', 50, 50, true); } else { $image = vt_resize('', $image_url, 50, 50, true); } ?>
			<img src="<?php echo $image['url']; ?>" width="50" height="50" alt="" style="margin-top: 5px;" />	
		<?php }} ?>		
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	
	</div>


<?php } function get_meta_colorpicker( $args = array(), $value = false ) {
extract($args); global $wp_version; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<script type="text/javascript">
			jQuery(document).ready(function($){  
			<?php if(version_compare($wp_version, '3.5', '>=')) { ?>
				$("#<?php echo $name; ?>").wpColorPicker();
			<?php } else { ?>
				$("#<?php echo $name; ?>_picker").farbtastic('#<?php echo $name; ?>');	
			<?php } ?>
			});
		</script>
		<strong><?php echo $title; ?></strong>
		<br/><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php if($value != "") { echo $value; } else { echo $std; } ?>" />	
		<div id="<?php echo $name; ?>_picker"></div>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
		

<?php }

if(is_admin() && ($pagenow == "post.php" OR $pagenow == "post-new.php")) {	
	global $wp_version;
	if(version_compare($wp_version, '3.5', '>=')) {	
		function gp_admin_scripts() {	
			wp_enqueue_style('admin', get_template_directory_uri().'/lib/admin/css/admin.css');
			wp_enqueue_style('wp-color-picker');
			//wp_enqueue_media();
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('uploader', get_template_directory_uri().'/lib/admin/scripts/uploader.js', array('media-upload'));
		}	
		add_action('admin_print_scripts', 'gp_admin_scripts');		
	} else {
		function gp_admin_scripts() {	
			wp_enqueue_style('admin', get_template_directory_uri().'/lib/admin/css/admin.css');
			wp_enqueue_style('farbtastic');
			wp_enqueue_script('farbtastic');
			wp_enqueue_script('custom', get_template_directory_uri().'/lib/admin/scripts/custom.js', array('media-upload'));
		}	
		add_action('admin_print_scripts', 'gp_admin_scripts');
	}
}

function ghostpool_save_meta_data($post_id){
	global $post;

	if('page' == $_POST['post_type'])
		$meta_boxes = array_merge(ghostpool_page_meta_boxes());
	elseif('post' == $_POST['post_type'])
		$meta_boxes = array_merge(ghostpool_post_meta_boxes());	
	else
		$meta_boxes = array_merge(ghostpool_slide_meta_boxes());

	foreach ($meta_boxes as $meta_box) :

		if(!wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__)))
			return $post_id;

		if('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id))
			return $post_id;

		elseif('post' == $_POST['post_type'] && !current_user_can('edit_post', $post_id))
			return $post_id;
		
		elseif('slide' == $_POST['post_type'] && !current_user_can('edit_post', $post_id))
			return $post_id;
			
		$data = stripslashes($_POST[$meta_box['name']]);

		if(get_post_meta($post_id, $meta_box['name']) == '')
			add_post_meta($post_id, $meta_box['name'], $data, true);

		elseif($data != get_post_meta($post_id, $meta_box['name'], true))
			update_post_meta($post_id, $meta_box['name'], $data);

		elseif($data == '')
			delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));

	endforeach;
}

?>