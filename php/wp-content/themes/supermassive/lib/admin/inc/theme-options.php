<?php // Themes Options Menu

$shortname = "theme";
$page_handle = $shortname . '-options';
$options = array (

array(	"name" => __('General Settings', 'gp_lang'),
      	"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_general_settings"),

		array(
		"name" => __('General Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_general_header",
      	"desc" => __('SM shared on W P L OC K E R .C O M - This section controls the general settings for the theme.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		
 		array(  
		"name" => __('Theme Skin', 'gp_lang'),
        "desc" => __('Choose the theme skin (can be overridden on individual posts/pages).', 'gp_lang'),
        "id" => $shortname."_skin",
        "std" => "obsidian",
		"options" => array('obsidian' => __('Obsidian', 'gp_lang'), 'obsidian-grunge' => __('Obsidian Grunge', 'gp_lang'), 'chocolate' => __('Chocolate', 'gp_lang'), 'arcticfox' => __('Arctic Fox', 'gp_lang'), 'tiger' => __('Tiger', 'gp_lang')),
        "type" => "select"),
      
        array(
		"name" => __('Custom Stylesheet', 'gp_lang'),
		"desc" => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code> (can be overridden on individual posts/pages).', 'gp_lang'),
        "id" => $shortname."_custom_stylesheet",
        "std" => "",
        "details" => "",
        "type" => "text"),
        
		array("type" => "divider"), 
		
		array(
		"name" => __('Custom Logo Image', 'gp_lang'),
        "desc" => __('Upload your own logo.', 'gp_lang'),
        "id" => $shortname."_custom_logo",
        "std" => "",
        "type" => "upload"),
        
		array(
		"name" => __('Logo Top Margin', 'gp_lang'),
        "desc" => __('Enter the top margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_top",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array(
		"name" => __('Logo Left Margin', 'gp_lang'),
        "desc" => __('Enter the left margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_left",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
		
		array(
		"name" => __('Logo Bottom Margin', 'gp_lang'),
        "desc" => __('Enter the bottom margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_bottom",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
		
		array("type" => "divider"),

		array(
		"name" => __('Login/Register/Profile Links', 'gp_lang'),
        "desc" => __('Choose whether to display the login, register and profile links.', 'gp_lang'),
        "id" => $shortname."_profile_links",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(
		"name" => __('Login Page URL', 'gp_lang'),
        "desc" => __('Enter the URL of the page you have assigned the Login page template to.', 'gp_lang'),
        "id" => $shortname."_login_url",
        "std" => "",
        "details" => "",
		"type" => "text"),

		array(
		"name" => __('Register Page URL', 'gp_lang'),
        "desc" => __('Enter the URL of the page you have assigned the Register page template to (leave blank if you are using BuddyPress, as a register page will have already been created).', 'gp_lang'),
        "id" => $shortname."_register_url",
        "std" => "",
        "details" => "",
		"type" => "text"),
		
		array("type" => "divider"), 
		
		array(
		"name" => __('Search Form', 'gp_lang'),
        "desc" => __('Choose whether to display the search form in the navigation panel.', 'gp_lang'),
        "id" => $shortname."_search_form",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array("type" => "divider"),
		
		array(
		"name" => __('Contact Info', 'gp_lang'),
        "desc" => __('Enter your contact info to display at the top of the page.', 'gp_lang'),
        "id" => $shortname."_contact_info",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"),  

		array(
		"name" => __('Social Icons', 'gp_lang'),
        "desc" => __('Choose where to display your social icons.', 'gp_lang'),
        "id" => $shortname."_social_icons",
        "std" => "Header",
		"options" => array('Header' => __('Header', 'gp_lang'), 'Footer' => __('Footer', 'gp_lang'), 'Both' => __('Both', 'gp_lang')),
        "type" => "select"),
		
		array(  
		"name" => __('RSS Feed Button', 'gp_lang'),
        "desc" => __('Display the RSS feed button with the default RSS feed or enter a custom feed below.', 'gp_lang'),
        "id" => $shortname."_rss_button",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(
		"name" => __('RSS URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_rss",
        "std" => "",
        "details" => "",
        "type" => "text"),
        
        array(
		"name" => __('Twitter URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_twitter",
        "std" => "",
        "details" => "",
        "type" => "text"),
        
        array(
		"name" => __('Facebook URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_facebook",
        "std" => "",
        "details" => "",
        "type" => "text"),
        
        array(
		"name" => __('Myspace URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_myspace",
        "std" => "",
        "details" => "",
        "type" => "text"),
        
        array(
		"name" => __('Digg URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_digg",
        "std" => "",
        "details" => "",
        "type" => "text"),    
                
        array(
		"name" => __('Flickr URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_flickr",
        "std" => "",
        "details" => "",
        "type" => "text"),

        array(
		"name" => __('Delicious URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_delicious",
        "std" => "",
        "details" => "",
        "type" => "text"),

        array(
		"name" => __('YouTube URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_youtube",
        "std" => "",
        "details" => "",
        "type" => "text"),
 
        array(
		"name" => __('Google+ URL', 'gp_lang'),
		"desc" => "",
        "id" => $shortname."_google_plus",
        "std" => "",
        "details" => "",
        "type" => "text"),
               
 		array(
		"name" => __('Additional Social Icons', 'gp_lang'),
        "desc" => __('Add additional social icons by entering the link and image HTML code e.g. <code>&lt;a href=&quot;http://social-link.com&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;'.get_template_directory_uri().'/images/socialicon.png&quot; alt=&quot;&quot; /&gt;&lt;/a&gt;</code>', 'gp_lang'),
        "id" => $shortname."_additional_social_icons",
        "std" => "",
        "type" => "textarea"),
                
		array("type" => "divider"), 
		
        array(
		"name" => __('Favicon URL (.ico)', 'gp_lang'),
        "desc" => __('Type the URL of your favicon image (.ico, 16x16 or 32x32)', 'gp_lang'),
        "id" => $shortname."_favicon_ico",
        "std" => "",
        "type" => "upload"),

        array(
		"name" => __('Favicon URL (.png)', 'gp_lang'),
        "desc" => __('Type the URL of your favicon image (.png, 16x16 or 32x32)', 'gp_lang'),
        "id" => $shortname."_favicon_png",
        "std" => "",
        "type" => "upload"),
        
         array(
		"name" => __('Apple Icon URL (.png)', 'gp_lang'),
        "desc" => __('Type the URL of your apple icon image (.png, 57x57), used for display on the Apple iPhone', 'gp_lang'),
        "id" => $shortname."_apple_icon",
        "std" => "",
        "type" => "upload"),
        
		array("type" => "divider"),
		
		array(
		"name" => __('Footer Content', 'gp_lang'),
        "desc" => __('Enter the content you want to display in your footer.', 'gp_lang'),
        "id" => $shortname."_footer_content",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"), 
		
		array(
		"name" => __('Scripts', 'gp_lang'),
        "desc" => __('Enter any scripts that need to be embedded into your theme (e.g. Google Analytics)', 'gp_lang'),
        "id" => $shortname."_scripts",
        "std" => "",
        "type" => "textarea"),
        
		array("type" => "divider"),

	 	array(
		"name" => __('Preload Effect', 'gp_lang'),
        "desc" => __('Choose whether to use the preload effect on content in category, archive, tag pages etc (this can be specified individually from shortcodes using <code>preload="true"</code>).', 'gp_lang'),
        "id" => $shortname."_preload",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array("type" => "close"),	
		
array(	"name" => __('Category Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_category_settings"),

		array(
		"name" => __('Category Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_cat_header",
      	"desc" => __('This section controls the global settings for all category, archive, tag and search result pages.', 'gp_lang')
      	),
 
  		array("type" => "divider"),
  		
        array(
		"name" => __('Thumbnail Width', 'gp_lang'),
        "desc" => __('The width to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'gp_lang'),
        "id" => $shortname."_cat_thumbnail_width",
        "std" => "640",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Thumbnail Height', 'gp_lang'),
        "desc" => __('The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_cat_thumbnail_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image.', 'gp_lang'),
        "id" => $shortname."_cat_image_wrap",
        "std" => "Enable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Reflection', 'gp_lang'),
        "desc" => __('Choose the size of the reflection on featured images.', 'gp_lang'),
        "id" => $shortname."_cat_image_reflection",
        "std" => "reflection-s",
		"options" => array('reflection-s' => __('Small', 'gp_lang'), 'reflection-m' => __('Medium', 'gp_lang'), 'reflection-l' => __('Large', 'gp_lang'), 'reflection-none' => __('None', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Shadow', 'gp_lang'),
        "desc" => __('Choose the size of the shadow on featured images.', 'gp_lang'),
        "id" => $shortname."_cat_image_shadow",
        "std" => "shadow-l",
		"options" => array('shadow-xs' => __('Extra Small', 'gp_lang'), 'shadow-s' => __('Small', 'gp_lang'), 'shadow-m' => __('Medium', 'gp_lang'), 'shadow-l' => __('Large', 'gp_lang'), 'shadow-xl' => __('Extra Large', 'gp_lang'), '' => __('None', 'gp_lang')),
        "type" => "select"),
        
   		array("type" => "divider"),

 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_cat_sidebar",
        "std" => "default",
		"style" => "",
        "type" => "select_sidebar"),
                               
  		array("type" => "divider"),
  		        
		array( 
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout.', 'gp_lang'),
        "id" => $shortname."_cat_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

        array("type" => "divider"), 
        		
 		array(  
		"name" => __('Frame', 'gp_lang'),
        "desc" => __('Choose whether to display a frame.', 'gp_lang'),
        "id" => $shortname."_cat_frame",
        "std" => "frame",
		"options" => array('frame' => __('Enable', 'gp_lang'), 'no-frame' => __('Disable', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title.', 'gp_lang'),
        "id" => $shortname."_cat_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Breadcrumbs', 'gp_lang'),
        "desc" => __('Choose whether to display breadcrumbs.', 'gp_lang'),
        "id" => $shortname."_cat_breadcrumbs",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Search Bar', 'gp_lang'),
        "desc" => __('Choose whether to display the search bar.', 'gp_lang'),
        "id" => $shortname."_cat_search",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

  		array("type" => "divider"),
  		
		array(
		"name" => __('Content Display', 'gp_lang'),
        "desc" => __('Choose whether to display the full post content or an excerpt.', 'gp_lang'),
        "id" => $shortname."_cat_content_display",
        "std" => "0",
		"options" => array(__('Excerpt', 'gp_lang'), __('Full Content', 'gp_lang')),
        "type" => "radio"),
        
		array("type" => "divider"),
		
        array(
		"name" => __('Excerpt Length', 'gp_lang'),
        "desc" => __('The number of characters in excerpts.', 'gp_lang'),
        "id" => $shortname."_cat_excerpt_length",
        "std" => "400",
        "type" => "text",
        "details" => "",
		"size" => "small"),
 
  		array("type" => "divider"),
		
		array(  
		"name" => __('Read More Link', 'gp_lang'),
        "desc" => __('Choose whether to display the read more links.', 'gp_lang'),
        "id" => $shortname."_cat_read_more",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_cat_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_cat_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_cat_cats",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the post comments.', 'gp_lang'),
        "id" => $shortname."_cat_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
 
		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_cat_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                
		array("type" => "close"),
			
array(	"name" => __('Post Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_post_settings"),

		array(
		"name" => __('Post Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_post_header",
      	"desc" => __('This section controls the global settings for all posts, but most settings can be overridden on individual posts.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		        
		array(  
		"name" => __('Featured Image', 'gp_lang'),
        "desc" => __('Choose whether to display the featured image within your post (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_show_post_image",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'gp_lang'),
        "id" => $shortname."_post_image_width",
        "std" => "640",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_post_image_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 
		
		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_image_wrap",
        "std" => "Disable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Reflection', 'gp_lang'),
        "desc" => __('Choose the size of the reflection on featured images (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_image_reflection",
        "std" => "reflection-s",
		"options" => array('reflection-s' => __('Small', 'gp_lang'), 'reflection-m' => __('Medium', 'gp_lang'), 'reflection-l' => __('Large', 'gp_lang'), 'reflection-none' => __('None', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Shadow', 'gp_lang'),
        "desc" => __('Choose the size of the shadow on featured images (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_image_shadow",
        "std" => "shadow-l",
		"options" => array('shadow-xs' => __('Extra Small', 'gp_lang'), 'shadow-s' => __('Small', 'gp_lang'), 'shadow-m' => __('Medium', 'gp_lang'), 'shadow-l' => __('Large', 'gp_lang'), 'shadow-xl' => __('Extra Large', 'gp_lang'), '' => __('None', 'gp_lang')),
        "type" => "select"),
        
   		array("type" => "divider"),

 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_post_sidebar",
        "std" => "default",
		"style" => "",
        "type" => "select_sidebar"),
                                      
  		array("type" => "divider"),
      
		array( 
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_layout",
        "std" => "sb-left",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

        array("type" => "divider"), 
        		
 		array(  
		"name" => __('Frame', 'gp_lang'),
        "desc" => __('Choose whether to display a frame (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_frame",
        "std" => "frame",
		"options" => array('frame' => __('Enable', 'gp_lang'), 'no-frame' => __('Disable', 'gp_lang')),
        "type" => "select"),
        
 		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Breadcrumbs', 'gp_lang'),
        "desc" => __('Choose whether to display breadcrumbs (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_breadcrumbs",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Search Bar', 'gp_lang'),
        "desc" => __('Choose whether to display the search bar (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_search",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

 		array("type" => "divider"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_post_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
	
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_post_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_post_cats",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comment Number', 'gp_lang'),
        "desc" => __('Choose whether to display the number of post comments.', 'gp_lang'),
        "id" => $shortname."_post_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
 
 		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_post_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
  		
         array(
		"name" => __('Author Info Panel', 'gp_lang'),
        "desc" => __('Choose whether to display the author info panel (can also be inserted in individual posts using the <code>[author]</code> shortcode).', 'gp_lang'),
        "id" => $shortname."_post_author_info",
       "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
		
		array( 
		"name" => __('Related Items', 'gp_lang'),
        "desc" => __('Choose whether to display a related items section (can also be inserted in individual posts using the <code>[related_posts]</code> shortcode).', 'gp_lang'), 
        "id" => $shortname."_post_related_items",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'),
        "id" => $shortname."_post_related_image_width",
        "std" => "55",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_post_related_image_height",
        "std" => "55",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 
		
        array(
		"name" => __('Number Of Related Items', 'gp_lang'),
        "desc" => __('The number of related items.', 'gp_lang'),
        "id" => $shortname."_post_related_limit",
        "std" => "6",
        "type" => "text",
        "details" => "",
		"size" => "small"),
         
		array("type" => "close"),

array(	"name" => __('Page Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_page_settings"),

		array(
		"name" => __('Page Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_page_header",
      	"desc" => __('This section controls the global settings for all pages, but most settings can be overridden on individual pages.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		   		
		array(  
		"name" => __('Featured Image', 'gp_lang'),
        "desc" => __('Choose whether to display the featured image within your page (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_show_page_image",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate width).', 'gp_lang'),
        "id" => $shortname."_page_image_width",
        "std" => "640",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_page_image_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"),  
 		
		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_image_wrap",
        "std" => "Disable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Reflection', 'gp_lang'),
        "desc" => __('Choose the size of the reflection on featured images (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_image_reflection",
        "std" => "reflection-s",
		"options" => array('reflection-s' => __('Small', 'gp_lang'), 'reflection-m' => __('Medium', 'gp_lang'), 'reflection-l' => __('Large', 'gp_lang'), 'reflection-none' => __('None', 'gp_lang')),
        "type" => "select"),

		array(
		"name" => __('Image Shadow', 'gp_lang'),
        "desc" => __('Choose the size of the shadow on featured images (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_image_shadow",
        "std" => "shadow-l",
		"options" => array('shadow-xs' => __('Extra Small', 'gp_lang'), 'shadow-s' => __('Small', 'gp_lang'), 'shadow-m' => __('Medium', 'gp_lang'), 'shadow-l' => __('Large', 'gp_lang'), 'shadow-xl' => __('Extra Large', 'gp_lang'), '' => __('None', 'gp_lang')),
        "type" => "select"),
 
    	array("type" => "divider"),

 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_page_sidebar",
        "std" => "default",
		"style" => "",
        "type" => "select_sidebar"),
                                      
   		array("type" => "divider"), 
   		
		array( 
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

        array("type" => "divider"), 
        		
 		array(  
		"name" => __('Frame', 'gp_lang'),
        "desc" => __('Choose whether to display a frame (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_frame",
        "std" => "frame",
		"options" => array('frame' => __('Enable', 'gp_lang'), 'no-frame' => __('Disable', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Breadcrumbs', 'gp_lang'),
        "desc" => __('Choose whether to display breadcrumbs (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_breadcrumbs",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),
   		
 		array(
		"name" => __('Search Bar', 'gp_lang'),
        "desc" => __('Choose whether to display the search bar (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_search",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),

   		array("type" => "divider"),

		array(  
		"name" => __('Page Author', 'gp_lang'),
        "desc" => __('Choose whether to display the page author.', 'gp_lang'),
        "id" => $shortname."_page_author",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
   		
		array(  
		"name" => __('Page Date', 'gp_lang'),
        "desc" => __('Choose whether to display the page date.', 'gp_lang'),
        "id" => $shortname."_page_date",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Page Comment Number', 'gp_lang'),
        "desc" => __('Choose whether to display the number of page comments.', 'gp_lang'),
        "id" => $shortname."_page_comments",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

   		array("type" => "divider"),
   		
		array(  
		"name" => __('Author Info Panel', 'gp_lang'),
        "desc" => __('Choose whether to display an author info panel.', 'gp_lang'),
        "id" => $shortname."_page_author_info",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
		                		
		array("type" => "close"),

array(	"name" => __('Style Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_css_settings"),

		array(
		"name" => __('Style Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_style_header",
      	"desc" => __('This section provides you with some basic settings to change the look of the theme. If you want to customize the design of the theme further you can add your own CSS styling in "CSS Settings" tab.', 'gp_lang')
      	),
  		
  		array("type" => "divider"),
  		
		array(
		"name" => __('Header Background Image', 'gp_lang'),
        "desc" => __('Upload your header background image (will appear across the top of your page behind the logo and navigaiton).', 'gp_lang'),
        "id" => $shortname."_custom_header",
        "std" => "",
        "type" => "upload"),

 		array(  
		"name" => __('Header Background Repeat', 'gp_lang'),
        "desc" => __('Choose how to repeat your header background.', 'gp_lang'),
        "id" => $shortname."_header_repeat",
        "std" => "Repeat",
		"options" => array('Repeat' => __('Repeat', 'gp_lang'), 'Repeat Horizontally' => __('Repeat Horizontally', 'gp_lang'), 'Repeat Vertically' => __('Repeat Vertically', 'gp_lang'), 'No Repeat' => __('No Repeat', 'gp_lang')),
        "type" => "select"),

 		array(  
		"name" => __('Header Background Position', 'gp_lang'),
        "desc" => __('Choose how to position your background.', 'gp_lang'),
        "id" => $shortname."_header_position",
        "std" => "Centered",
		"options" => array('Centered' => __('Centered', 'gp_lang'), 'Left' => __('Left', 'gp_lang'), 'Right' => __('Right', 'gp_lang')),
        "type" => "select"),
  
		array("type" => "divider"),
		
 		array(  
		"name" => __('Body Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_body_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => __('Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => __('Heading Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_heading_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Heading Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_heading_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Heading Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_heading_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
        
 		array(  
		"name" => __('Sidebar Heading Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_sidebar_heading_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Sidebar Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_sidebar_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Sidebar Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_sidebar_link_color",
        "std" => "",
        "type" => "colorpicker"),
 
 		array(  
		"name" => __('Sidebar Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_sidebar_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => __('Footer Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_footer_text_color",
        "std" => "",
        "type" => "colorpicker"),
 
 		array(  
		"name" => __('Footer Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_footer_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Footer Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_footer_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => __('Footer Copyright Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_footer_copyright_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => __('Navigation Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_nav_link_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => __('Navigation Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_nav_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => __('Contact Info Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_contact_info_text_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => __('Breadcrumbs Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_breadcrumbs_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),

 		array(  
		"name" => __('Meta Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_meta_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Meta Link Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_meta_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Meta Link Hover Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_meta_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => __('Divider Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_divider_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => __('Gradient 1 Top Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_1_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => __('Gradient 1 Bottom Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_1_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Gradient 1 Border Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_1_border_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Gradient 1 Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_1_text_color",
        "std" => "",
        "type" => "colorpicker"),        

		array("type" => "divider"),
		
 		array(  
		"name" => __('Gradient 2 Top Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_2_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => __('Gradient 2 Bottom Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_2_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Gradient 2 Border Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_2_border_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => __('Gradient 2 Text Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_grad_2_text_color",
        "std" => "",
        "type" => "colorpicker"), 
 
 		array("type" => "divider"),
 		
  		array(  
		"name" => __('Input Boxes Top Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_input_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),        

  		array(  
		"name" => __('Input Boxes Bottom Background Color', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_input_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),        

  		array(  
		"name" => __('Input Boxes Text Background Colour', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_input_text_color",
        "std" => "",
        "type" => "colorpicker"),  
        
  		array(  
		"name" => __('Input Boxes Border Colour', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_input_border_color",
        "std" => "",
        "type" => "colorpicker"),
 
 		array("type" => "divider"), 		
      	
		array( 
		"name" => __('Cufon Fonts', 'gp_lang'),
        "desc" => __('<span class="chunkfive">Chunk Five</span>', 'gp_lang'),
        "id" => $shortname."_chunkfive",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
		"name" => '',
        "desc" => __('<span class="journal">Journal</span>', 'gp_lang'),
        "id" => $shortname."_journal",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
		"name" => '',
        "desc" => __('<span class="leaguegothic">League Gothic</span>', 'gp_lang'),
        "id" => $shortname."_leaguegothic",
        "extras" => "multi",
        "type" => "checkbox"),

		array( 
		"name" => '',
        "desc" => __('<span class="nevis">Nevis</span>', 'gp_lang'),
        "id" => $shortname."_nevis",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
		"name" => '',
        "desc" => __('<span class="quicksand">Quicksand</span>', 'gp_lang'),
        "id" => $shortname."_quicksand",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
		"name" => '',
        "desc" => __('<span class="sansation">Sansation</span>', 'gp_lang'),
        "id" => $shortname."_sansation",
        "extras" => "multi",
        "type" => "checkbox"),

		array( 
		"name" => '',
        "desc" => __('<span class="vegur">Vegur</span>', 'gp_lang'),
        "id" => $shortname."_vegur",
        "extras" => "multi",
        "type" => "checkbox"),
        
 		array("type" => "divider"),
 		
		array(
		"name" => __('Cufon Replacement Code', 'gp_lang'),
        "desc" => __('If you want to add cufon to other text or use more than one cufon font e.g. <code>Cufon.replace("h1,h2,h3,h4,h5,h6", {fontFamily: "Vegur"});</code><br/><code>Cufon.replace("#logo-text", {fontFamily: "Sansation"});</code>', 'gp_lang'),
        "id" => $shortname."_cufon_code",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"),
		
  		array(  
		"name" => __('Body Text Size', 'gp_lang'),
        "desc" => __('Default value 13px.', 'gp_lang'),
        "id" => $shortname."_body_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),

  		array(  
		"name" => __('H1 Text Size', 'gp_lang'),
        "desc" => __('Default value 30px.', 'gp_lang'),
        "id" => $shortname."_h1_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
  		array(  
		"name" => __('H2 Text Size', 'gp_lang'),
        "desc" => __('Default value 25px.', 'gp_lang'),
        "id" => $shortname."_h2_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
        array(  
		"name" => __('H3 Text Size', 'gp_lang'),
        "desc" => __('Default value 22px.', 'gp_lang'),
        "id" => $shortname."_h3_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
        array(  
		"name" => __('H4 Text Size', 'gp_lang'),
        "desc" => __('Default value 18px.', 'gp_lang'),
        "id" => $shortname."_h4_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
        array(  
		"name" => __('H5 Text Size', 'gp_lang'),
        "desc" => __('Default value 15px.', 'gp_lang'),
        "id" => $shortname."_h5_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
        array(  
		"name" => __('H6 Text Size', 'gp_lang'),
        "desc" => __('Default value 14px.', 'gp_lang'),
        "id" => $shortname."_h6_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),
		
  		array(  
		"name" => __('Sidebar Heading Text Size', 'gp_lang'),
        "desc" => __('Default value 18px.', 'gp_lang'),
        "id" => $shortname."_sidebar_heading_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
  		array(  
		"name" => __('Sidebar Text Size', 'gp_lang'),
        "desc" => __('Default value 13px.', 'gp_lang'),
        "id" => $shortname."_sidebar_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),
		
  		array(  
		"name" => __('Footer Heading Text Size', 'gp_lang'),
        "desc" => __('Default value 20px.', 'gp_lang'),
        "id" => $shortname."_footer_heading_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
  		array(  
		"name" => __('Footer Text Size', 'gp_lang'),
        "desc" => __('Default value 13px.', 'gp_lang'),
        "id" => $shortname."_footer_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

  		array(  
		"name" => __('Footer Copyright Text Size', 'gp_lang'),
        "desc" => __('Default value 11px.', 'gp_lang'),
        "id" => $shortname."_footer_copyright_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => __('Top Level Navigation Text Size', 'gp_lang'),
        "desc" => __('Default value 14px.', 'gp_lang'),
        "id" => $shortname."_nav_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
 
  		array(  
		"name" => __('Dropdown Navigation Text Size', 'gp_lang'),
        "desc" => __('Default value 12px.', 'gp_lang'),
        "id" => $shortname."_dropdown_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),
		
  		array(  
		"name" => __('Contact Info Text Size', 'gp_lang'),
        "desc" => __('Default value 13px.', 'gp_lang'),
        "id" => $shortname."_contact_info_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),
		
  		array(  
		"name" => __('Breadcrumbs Text Size', 'gp_lang'),
        "desc" => __('Default value 11px.', 'gp_lang'),
        "id" => $shortname."_breadcrumbs_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array("type" => "divider"),

  		array(  
		"name" => __('Meta Text Size', 'gp_lang'),
        "desc" => __('Default value 11px.', 'gp_lang'),
        "id" => $shortname."_meta_text_size",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
		array("type" => "close"),
		
array(	"name" => __('CSS Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_css_settings"),

		array(
		"name" => __('CSS Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_css_header",
      	"desc" => __('You can add your own CSS below to style the theme. This CSS will not be lost if you update the theme. For more information on how to find the names of the elements you want to style  click', 'gp_lang').' <a href="http://ghostpool.com/help/'.$dirname.'/help.html#customizing-design" target="_blank">'.__('here', 'gp_lang').'</a>.'
      	),

  		array("type" => "divider"),
  				
		array(
		"name" => __('Custom CSS', 'gp_lang'),
        "desc" => __('If you want to modify the theme style in some way add your own code here instead of editing the style sheets. Note: You may have to add <code>!important</code> to your tags in some cases so it overwrites the default settings e.g. <code>body {background: #000000 !important;}</code>.', 'gp_lang'),
        "id" => $shortname."_custom_css",
        "std" => "",
        "type" => "textarea",
        "size" => "large"),

		array("type" => "close"),
	
);

function gp_add_admin(){

    global $themename, $dirname, $shortname, $options;
			
    if(isset($_GET['page']) && $_GET['page'] == basename(__FILE__)){

        if (isset($_REQUEST['action']) && 'save' == $_REQUEST['action']){

                foreach ($options as $value){
                    update_option($value['id'], $_REQUEST[ $value['id'] ]); }

                foreach ($options as $value){
                    if(isset($_REQUEST[ $value['id'] ])){ update_option($value['id'], $_REQUEST[ $value['id'] ] ); } else { delete_option($value['id']); } }

                header("Location: themes.php?page=theme-options.php&saved=true");
                die;

        } else if(isset($_REQUEST['action']) && 'reset' == $_REQUEST['action']){

            foreach ($options as $value){
                delete_option($value['id']);
            }

			update_option($dirname.'_theme_setup_status', '0');

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        }

		else if(isset($_REQUEST['action']) && 'export' == $_REQUEST['action'])export_settings();
		else if(isset($_REQUEST['action']) && 'import' == $_REQUEST['action'])import_settings();

    }

    add_theme_page(__('Theme Options', 'gp_lang'), __('Theme Options', 'gp_lang'), 'manage_options', basename(__FILE__), 'gp_admin');

}

function gp_admin(){

    global $themename, $dirname, $shortname, $options;

    if (isset($_REQUEST['saved']) && $_REQUEST['saved'])echo '<div id="message" class="updated"><p><strong>'.__('Options Saved', 'gp_lang').'</strong></p></div>';
    if (isset($_REQUEST['reset']) && $_REQUEST['reset'])echo '<div id="message" class="updated"><p><strong>'.__('Options Reset', 'gp_lang').'</strong></p></div>';

?>

<!--Begin Theme Wrapper-->
<div id="gp-theme-options" class="wrap">
	
	<?php screen_icon('options-general'); ?>
	<h2><?php _e('Theme Options', 'gp_lang'); ?></h2>
	
	<p><h3><a href="http://ghostpool.com/help/<?php echo $dirname; ?>/help.html" target="_blank"><?php _e('Help File', 'gp_lang'); ?></a> | <a href="http://ghostpool.com/help/<?php echo $dirname; ?>/changelog.html" target="_blank"><?php _e('Changelog', 'gp_lang'); ?></a> | <a href="http://ghostpool.ticksy.com" target="_blank"><?php _e('Setup Help & Bug Fixes', 'gp_lang'); ?></a> | <a href="http://ghostpool.com/hire-a-developer" target="_blank"><?php _e('Tweaks & Customizations', 'gp_lang'); ?></a></h3></p>
	
	<div id="import_export" class="hide-if-js">
	
		<h3><?php _e('Import Theme Options', 'gp_lang'); ?></h3>
		<div class="option-desc"><?php _e('If you have a back up of your theme options you can import them below.', 'gp_lang'); ?></div>
		
		<form method="post" enctype="multipart/form-data">
			<p class="submit"><input type="file" name="file" id="file" />
			<input type="submit" name="import" class="button" value="<?php _e('Upload', 'gp_lang'); ?>" /></p>
			<input type="hidden" name="action" value="import" />
		</form>

		<div class="divider"></div>
		
		<h3><?php _e('Export Theme Options', 'gp_lang'); ?></h3>
		<div class="option-desc"><?php _e('If you want to create a back up of all your theme options click the Export button below (will only back up your theme options and not your post/page/images data).', 'gp_lang'); ?></div>
		
		<form method="post">
			<p class="submit"><input name="export" type="submit" class="button" value="<?php _e('Export Theme Settings', 'gp_lang'); ?>" /></p>
			<input type="hidden" name="action" value="export" />
		</form>	
	
	</div>

	
	<form method="post">
		
		<div class="submit">	

			<a href="#TB_inline?height=300&amp;width=500&amp;inlineId=import_export" onclick="return false;" class="thickbox"><input type="button" class="button" value="<?php _e('Import/Export Theme Options' ,'gp_lang'); ?>"></a>
		
			<input name="save" type="submit" class="button-primary right" value="<?php _e('Save Changes', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="save" />
			
		</div>
		
		<div id="panels">


<?php foreach ($options as $value){
switch($value['type']){
case "open":
?>

<?php break;
case "title":
?>

<div class="panel" id="<?php echo $value['name']; ?>">


<?php break;
case "header":
?>

	<div class="option option-header">
		<?php if($value['name']) { ?><h2><?php echo $value['name']; ?></h2><?php } ?>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>
	
	
<?php break;
case "close":
?>

</div>
<!--End Panel-->


<?php break;
case "divider":
?>

<div class="divider"></div>


<?php break;
case "clear":
?>

<div class="clear"></div>


<?php break;
case 'text':
?>
	
	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?><?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if(get_option($value['id'])!= "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" size="<?php if($value['size'] == "small") { ?>3<?php } else { ?>40<?php } ?>" /><?php if($value['details']) { ?> <span><?php echo $value['details']; ?></span>&nbsp;<?php } ?>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php break;
case 'upload':
?>

	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option uploader"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" size="40" class="upload" value="<?php echo get_option($value['id']); ?>" />
		<input type="button" id="<?php echo $value['id']; ?>_button" class="upload-image-button button" value="<?php _e('Upload', 'gp_lang'); ?>" />
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>
	

<?php
break;

case 'textarea':
?>

	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="70" rows="<?php if($value['size'] == "large") { ?>50<?php } else { ?>10<?php } ?>"><?php if(get_option($value['id'])!= ""){ echo stripslashes(get_option($value['id'])); } else { echo $value['std']; } ?></textarea>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select':
?>
	
	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $key=>$option){ ?>
					<?php if(get_option($value['id']) != "") { ?>
						<option value="<?php echo $key; ?>" <?php if(get_option($value['id']) == $key){ echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } else { ?>
						<option value="<?php echo $key; ?>" <?php if($value['std'] == $key) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
			<?php } ?>
		</select>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select_taxonomy':
?>
		
	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php $terms = get_terms($value['cats'], 'hide_empty=0'); ?>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><option value=''><?php _e('None', 'gp_lang'); ?></option><?php foreach ($terms as $term): ?><option value="<?php echo $term->slug; ?>" <?php if(get_option($value['id'])==  $term->slug){ echo ' selected="selected"'; } ?>><?php echo $term->name; ?></option><?php endforeach; ?></select>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	


<?php
break;
case 'select_sidebar':
global $post, $wp_registered_sidebars;
?>
		
	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php $sidebars = $wp_registered_sidebars; 
		if(is_array($sidebars) && !empty($sidebars)) { 
			foreach($sidebars as $sidebar) { 
				if(get_option($value['id']) != "") { ?>
					<option value="<?php echo $sidebar['id']; ?>"<?php if(get_option($value['id']) == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
				<?php } else { ?>				
					<option value="<?php echo $sidebar['id']; ?>"<?php if($value['std'] == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>				
		<?php }}} ?>	
		</select>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case "checkbox":
?>
   
   
   	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option<?php if($value['extras'] == "multi"){ ?> multi-checkbox<?php } ?>">
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "radio":
?>

	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php foreach ($value['options'] as $key=>$option){
		$radio_setting = get_option($value['id']);
		if($radio_setting != ''){
			if ($key == get_option($value['id'])){
				$checked = "checked=\"checked\"";
				} else {
					$checked = "";
				}
		}else{
			if($key == $value['std']){
				$checked = "checked=\"checked\"";
			}else{
				$checked = "";
			}
		}?>
			<div class="radio-buttons">
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label>
			</div>	
		<?php } ?>
		<div class="clear"></div>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "colorpicker":
?>

	<?php if($value['name']) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if($value['style']) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<script type="text/javascript">
			jQuery(document).ready(function($){  
			<?php global $wp_version; if(version_compare($wp_version, '3.5', '>=')) { ?>
				$("#<?php echo $value['id']; ?>").wpColorPicker();
			<?php } else { ?>
				$("#<?php echo $value['id']; ?>_picker").farbtastic('#<?php echo $name; ?>');	
			<?php } ?>
			});
		</script>
		<input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if(get_option($value['id'])!= "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" />
		<div id="<?php echo $value['id']; ?>_picker"></div>
		<?php if($value['desc']) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>
	

<?php        
break;
}}
?>

	</div>
	
	<div class="submit">

			<input name="save" type="submit" class="button-primary right" value="<?php _e('Save Changes', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="save" />

		</form>
	
		<form method="post" onSubmit="if(confirm('<?php _e('Are you sure you want to reset all the theme options&#63;', 'gp_lang'); ?>')) return true; else return false;">	
			<input name="reset" type="submit" class="button right" style="margin-right: 10px;" value="<?php _e('Reset', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="reset" />			
		</form>
		
		<div class="clear"></div>
	
	</div>

</div>
<!--End Theme Wrapper-->


<?php } 

if(is_admin() && $pagenow == "themes.php") {
	global $wp_version;
	if(version_compare($wp_version, '3.5', '>=')) {	
		function gp_admin_scripts() {
			wp_enqueue_style('thickbox');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('admin', get_template_directory_uri().'/lib/admin/css/admin.css');	
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('thickbox');
			wp_enqueue_media();
			wp_enqueue_script('tabs', get_template_directory_uri().'/lib/admin/scripts/jquery.tabs.js', array('jquery'));
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('cufon', get_template_directory_uri().'/lib/scripts/cufon-yui.js', array('jquery'));
			wp_enqueue_script('chunkfive', get_template_directory_uri().'/lib/scripts/fonts/ChunkFive_400.font.js', array('cufon'));
			wp_enqueue_script('journal', get_template_directory_uri().'/lib/scripts/fonts/Journal_400.font.js', array('cufon'));
			wp_enqueue_script('leaguegothic', get_template_directory_uri().'/lib/scripts/fonts/League_Gothic_400.font.js', array('cufon'));
			wp_enqueue_script('nevis', get_template_directory_uri().'/lib/scripts/fonts/nevis_700.font.js', array('cufon'));
			wp_enqueue_script('quicksand', get_template_directory_uri().'/lib/scripts/fonts/Quicksand_Book.font.js', array('cufon'));
			wp_enqueue_script('sansation', get_template_directory_uri().'/lib/scripts/fonts/Sansation_400-Sansation_700.font.js', array('cufon'));
			wp_enqueue_script('vegur', get_template_directory_uri().'/lib/scripts/fonts/Vegur_400-Vegur_700-Vegur_300.font.js', array('cufon'));		
			wp_enqueue_script('cufon-replace', get_template_directory_uri().'/lib/admin/scripts/cufon.js');		
			wp_enqueue_script('uploader', get_template_directory_uri().'/lib/admin/scripts/uploader.js');
		}
		add_action('admin_print_scripts', 'gp_admin_scripts');				
	} else {
		function gp_admin_scripts() {
			wp_enqueue_style('thickbox');
			wp_enqueue_style('farbtastic');
			wp_enqueue_style('admin', get_template_directory_uri().'/lib/admin/css/admin.css');	
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');	
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('tabs', get_template_directory_uri().'/lib/admin/scripts/jquery.tabs.js', array('jquery'));
			wp_enqueue_script('farbtastic');
			wp_enqueue_script('cufon', get_template_directory_uri().'/lib/scripts/cufon-yui.js', array('jquery'));
			wp_enqueue_script('chunkfive', get_template_directory_uri().'/lib/scripts/fonts/ChunkFive_400.font.js', array('cufon'));
			wp_enqueue_script('journal', get_template_directory_uri().'/lib/scripts/fonts/Journal_400.font.js', array('cufon'));
			wp_enqueue_script('leaguegothic', get_template_directory_uri().'/lib/scripts/fonts/League_Gothic_400.font.js', array('cufon'));
			wp_enqueue_script('nevis', get_template_directory_uri().'/lib/scripts/fonts/nevis_700.font.js', array('cufon'));
			wp_enqueue_script('quicksand', get_template_directory_uri().'/lib/scripts/fonts/Quicksand_Book.font.js', array('cufon'));
			wp_enqueue_script('sansation', get_template_directory_uri().'/lib/scripts/fonts/Sansation_400-Sansation_700.font.js', array('cufon'));
			wp_enqueue_script('vegur', get_template_directory_uri().'/lib/scripts/fonts/Vegur_400-Vegur_700-Vegur_300.font.js', array('cufon'));			
			wp_enqueue_script('cufon-replace', get_template_directory_uri().'/lib/admin/scripts/cufon.js');
			wp_enqueue_script('custom', get_template_directory_uri().'/lib/admin/scripts/custom.js');
		}
		add_action('admin_print_scripts', 'gp_admin_scripts');
	}
}

add_action('admin_menu', 'gp_add_admin'); 


// Export Theme Options
function export_settings(){
	global $options;
	header("Cache-Control: public, must-revalidate");
	header("Pragma: hack");
	header("Content-Type: text/plain");
	header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
	foreach ($options as $value)$theme_settings[$value['id']] = get_option($value['id']);	
	echo serialize($theme_settings);
}

// Import Theme Options
function import_settings(){
	global $options;
	if ($_FILES["file"]["error"] > 0){
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	} else {
		$rawdata = file_get_contents($_FILES["file"]["tmp_name"]);		
		$theme_settings = unserialize($rawdata);		
		foreach ($options as $value){
			if ($theme_settings[$value['id']]){
				update_option($value['id'], $theme_settings[$value['id']]);
				$$value['id'] = $theme_settings[$value['id']];
			} else {
				if ($value['type'] == 'checkbox_multiple')$$value['id'] = array();
				else $$value['id'] = $value['std'];
			}
		}
		
	}
	if (in_array('cacheStyles', get_option('theme_misc')))cache_settings();
	wp_redirect($_SERVER['PHP_SELF'].'?page=theme-options.php');
}

// Help Tab
if(is_admin() && $pagenow == "themes.php") {
	function theme_help_tab() {
		global $dirname;
		$screen = get_current_screen();
		$screen->add_help_tab(array( 
			'id' => 'help', 'title' => 'Help', 'content' => '<p><a href="http://ghostpool.com/help/'.$dirname.'/help.html" target="_blank">'.__('Help File', 'gp_lang').'</a></p><p><a href="http://ghostpool.com/help/'.$dirname.'/changelog.html" target="_blank">'.__('Changelog', 'gp_lang').'</a></p><p><a href="http://ghostpool.ticksy.com" target="_blank">'.__('Setup Help & Bug Fixes', 'gp_lang').'</a></p><p><a href="http://ghostpool.com/hire-a-developer" target="_blank">'.__('Tweaks & Customizations', 'gp_lang').'</a></p>'
		));	
	}
	add_action('admin_head', 'theme_help_tab');
}


/*************************** Save Default Theme Options ***************************/

add_action('after_setup_theme', 'the_theme_setup');
function the_theme_setup() {
	
	// Check if user is updating from earlier version of theme
	if(!get_option('theme_skin') && !get_option('theme_rss_button')) {
	
		if(get_option($dirname.'_theme_setup_status') !== '1') {
		
			$core_settings = array(
			
				/* General Settings */
				'theme_skin' => 'obsidian',
				'theme_profile_links' => '0',
				'theme_social_icons' => 'Header',
				'theme_rss_button' => '0',
				'theme_preload' => '1',
																											
				/* Category Settings */
				'theme_cat_thumbnail_width' => '640',
				'theme_cat_thumbnail_height' => '250',
				'theme_cat_image_wrap' => 'Disable',
				'theme_cat_image_reflection' => 'reflection-s',
				'theme_cat_image_shadow' => 'shadow-l',
				'theme_cat_sidebar' => 'default',
				'theme_cat_layout' => 'sb-right',
				'theme_cat_frame' => 'frame',
				'theme_cat_title' => 'Show',
				'theme_cat_breadcrumbs' => 'Show',
				'theme_cat_search' => 'Show',
				'theme_cat_content_display' => '0',
				'theme_cat_excerpt_length' => '400',		
				'theme_cat_read_more' => '0',						
				'theme_cat_date' => '0',
				'theme_cat_author' => '0',
				'theme_cat_cats' => '0',
				'theme_cat_comments' => '0',
				'theme_cat_tags' => '1',	
	
				/* Post Settings */
				'theme_show_post_image' => 'Show',
				'theme_post_image_width' => '640',
				'theme_post_image_height' => '250',
				'theme_post_image_wrap' => 'Disable',
				'theme_post_image_reflection' => 'reflection-s',
				'theme_post_image_shadow' => 'shadow-l',
				'theme_post_sidebar' => 'default',
				'theme_post_layout' => 'sb-right',
				'theme_post_frame' => 'frame',
				'theme_post_title' => 'Show',
				'theme_post_breadcrumbs' => 'Show',
				'theme_post_search' => 'Show',
				'theme_post_date' => '0',
				'theme_post_author' => '0',
				'theme_post_cats' => '0',
				'theme_post_comments' => '0',
				'theme_post_tags' => '1',	
				'theme_post_author_info' => '0',	
				'theme_post_related_items' => '0',	
				'theme_post_related_image_width' => '55',	
				'theme_post_related_image_height' => '55',			
				'theme_post_related_limit' => '6',		
				
				/* Page Settings */
				'theme_show_page_image' => 'Show',
				'theme_page_image_width' => '640',
				'theme_page_image_height' => '250',
				'theme_page_image_wrap' => 'Disable',
				'theme_page_image_reflection' => 'reflection-s',
				'theme_page_image_shadow' => 'shadow-l',
				'theme_post_sidebar' => 'default',
				'theme_page_layout' => 'sb-right',
				'theme_page_frame' => 'frame',
				'theme_page_title' => 'Show',
				'theme_page_breadcrumbs' => 'Show',
				'theme_page_search' => 'Show',
				'theme_page_date' => '1',
				'theme_page_author' => '1',
				'theme_page_comments' => '1',
				'theme_page_author_info' => '1',	
																				
			);
			foreach ($core_settings as $k => $v) {
				update_option($k, $v);
			}
	
			update_option($dirname.'_theme_setup_status', '1');

		}
			
	}
	
}

?>