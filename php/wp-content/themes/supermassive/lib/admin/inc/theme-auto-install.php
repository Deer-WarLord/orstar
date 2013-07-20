<?php

if(is_admin() && isset($_GET['activated']) && $pagenow == "themes.php") {

	global $dirname;

	if(get_option($dirname.'_theme_auto_install') !== '1') {


		/////////////////////////////////////// Delete Default Content ///////////////////////////////////////	

		// Default Posts
		$post = get_page_by_path('hello-world', OBJECT, 'post');
		if($post) { wp_delete_post($post->ID,true); }

		// Default Pages		
		$post = get_page_by_path('sample-page', OBJECT, 'page');
		if($post) { wp_delete_post($post->ID,true); }

  
		/////////////////////////////////////// Create Attachments ///////////////////////////////////////	


		require_once(ABSPATH . 'wp-admin/includes/file.php');
		require_once(ABSPATH . 'wp-admin/includes/media.php');
		require(ABSPATH . 'wp-admin/includes/image.php');		
		
		$filename1 = get_template_directory_uri().'/lib/images/placeholder1.png';
		$description1 = 'Image Description 1';
		media_sideload_image($filename1, 0, $description1);
		$last_attachment1 = $wpdb->get_row($query = "SELECT * FROM {$wpdb->prefix}posts ORDER BY ID DESC LIMIT 1", ARRAY_A);
		$attachment_id1 = $last_attachment1['ID'];
		
		$filename2 = get_template_directory_uri().'/lib/images/placeholder2.png';
		$description2 = 'Image Description 2';
		media_sideload_image($filename2, 0, $description2);
		$last_attachment2 = $wpdb->get_row($query = "SELECT * FROM {$wpdb->prefix}posts ORDER BY ID DESC LIMIT 2", ARRAY_A);
		$attachment_id2 = $last_attachment2['ID'];
		
		
		/////////////////////////////////////// Create Pages ///////////////////////////////////////	

		
		/*************************************** Homepage ***************************************/	
		
		$new_page_title = 'Homepage Example';
		$new_page_content = 
'[slider margins="-70,0,0,0" shadow="shadow-xl" align="aligncenter"]

[text text_align="text-center" size="40" line_height="60"]The Next Generation of WordPress Themes[/text]

[text text_align="text-center" color="#666" width="880" right="auto" left="auto"]This is just an ordinary WordPress page that has been customized using SuperMassive\'s huge array of shortcodes. Transform any page into a completely unique design in a matter of minutes all for $50. Click <a href="http://themeforest.net/item/supermassive-a-next-generation-wordpress-theme/132454?ref=GhostPool">here</a> to buy this theme today.[/text]

[curved]

[four type="joint" height="260"]
[text font="Lucida Grande, Lucida Sans Unicode, Arial" other="font-weight: bold;" size="15"]Lorem ipsum dolor[/text]
[text color="#777"]Sit amet, consectetur adipiscing elit. Nam a augue augue. n vel feugiat felis.[/text]
[image url="'.get_template_directory_uri().'/lib/images/placeholder1.png" width="190" height="140" shadow="shadow-s" left="8" bottom="10" align="aligncenter"]
[/four]

[four_middle type="joint" height="260"]
[text font="Lucida Grande, Lucida Sans Unicode, Arial" other="font-weight: bold;" size="15"]Libero quis elitr[/text]
[text color="#777"]Ut hendrerit, nibh quis auctor pulvinar, felis. Phasellus euismod sodales lectus.[/text]
[image url="'.get_template_directory_uri().'/lib/images/placeholder2.png" width="190" height="140" shadow="shadow-s" left="8" bottom="10" align="aligncenter"]
[/four_middle]

[four_middle type="joint" height="260"]
[text font="Lucida Grande, Lucida Sans Unicode, Arial" other="font-weight: bold;" size="15"]Rutrum non[/text]
[text color="#777"]Praesent rutrum libero quis elit egestas pulvinar.[/text]
[image url="'.get_template_directory_uri().'/lib/images/placeholder1.png" width="190" height="140" shadow="shadow-s" left="8" bottom="10" align="aligncenter"]
[/four_middle]

[four_last type="joint" height="260"]
[text font="Lucida Grande, Lucida Sans Unicode, Arial" other="font-weight: bold;" size="15"]Sollicitudin eget[/text]
[text color="#777"]Suspendisse laoreet blandit turpis, ut congue nislt hendrerit, nibh quis auctor.[/text]
[image url="'.get_template_directory_uri().'/lib/images/placeholder2.png" width="190" height="140" shadow="shadow-s" left="8" bottom="10" align="aligncenter"]
[/four_last]

[clear][clear]

[two][image shadow="shadow-m" align="aligncenter" url="'.get_template_directory_uri().'/lib/images/placeholder1.png" width="450" height="318"][/two]

[two_last]
[text size="20" width="100%" text_align="text-right" color="#808080" line_height="20"]A stylish panel[/text]
[text size="40" width="100%" text_align="text-right" line_height="40" margins="0,0,10,0"]Without Borders.[/text]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a augue augue. Nam ac lacus a libero lacinia imperdiet at non elit. Vestibulum vel metus pellentesque nibh pulvinar consectetur. Praesent nisl risus, vestibulum sed pellentesque blandit, porttitor adipiscing ipsum. Vivamus tincidunt nisi at quam condimentum eget tempor lectus vehicula. Phasellus dictum, nulla sit amet semper facilisis.

Progressively aggregate extensible e-tailers and high standards in quality vectors. Distinctively fashion bricks-and-clicks intellectual capital for state of the art initiatives. Distinctively syndicate real-time technologies through open-source e-markets. Completely morph technically.

[/two_last]

[clear]

[two type="separate" height="304"]

[text width="180" align="alignleft"]

<strong>Leget tempor lectus vehicula</strong>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a augue augue. Nam ac lacus a libero lacinia imperdiet at non elit. Vestibulum vel metus. Efficiently disseminate backend resources via real-time architectures. Seamlessly.

[button]Read On...[/button]

[/text]

[image url="'.get_template_directory_uri().'/lib/images/placeholder1.png" link="'.get_template_directory_uri().'/lib/images/placeholder1.png" lightbox="image" width="218" height="175" margins="35,0,0,20" reflection="reflection-s" align="alignright"]

[/two]

[two_last]

[accordion]

[panel title="Accordion Panel 1"]Morbi euismod suscipit enim, <a href="#">vitae hendrerit elit</a> cursus et. Vestibulum vel metus pellentesque nibh pulvinar consectetur. Nunc volutpat risus a libero condimentum. Vestibulum vel metus pellentesque nibh pulvinar. Vestibulum vel metus pellentesque nibh pulvinar consectetur. Nunc volutpat risus a libero condimentum sit amet placerat nisi feugiat. Morbi euismod suscipit enim, vitae hendrerit elit cursus et. Praesent nisl risus, vestibulum sed pellentesque blandit, porttitor adipiscing ipsum. Vivamus tincidunt nisi at.[/panel]

[panel title="Accordion Panel 2"]Vestibulum vel metus pellentesque nibh pulvinar consectetur. Vestibulum vel metus pellentesque nibh pulvinar consectetur. Nunc volutpat risus a libero condimentum sit amet placerat nisi feugiat. Morbi euismod suscipit enim, vitae hendrerit elit cursus et.[/panel]

[panel title="Accordion Panel 3"]Vestibulum vel metus pellentesque nibh pulvinar consectetur. Nunc volutpat risus a libero condimentum sit amet placerat nisi feugiat. Morbi euismod suscipit enim, vitae hendrerit elit cursus et.[/panel]

[/accordion]

[/two_last]';
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_option('page_on_front', $new_page_id);
			update_option('show_on_front', 'page');
			update_post_meta($new_page_id, 'ghostpool_layout', 'fullwidth');
			update_post_meta($new_page_id, 'ghostpool_frame', 'no-frame');
			update_post_meta($new_page_id, 'ghostpool_title', 'Hide');
			update_post_meta($new_page_id, 'ghostpool_breadcrumbs', 'Hide');
			update_post_meta($new_page_id, 'ghostpool_search', 'Hide');
		}
				
			
		/*************************************** Blog Page ***************************************/	
		
		$new_page_title = 'Blog Page Example';
		$new_page_content = '[blog]';
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
		}


		/*************************************** Contact Page ***************************************/	
		
		$new_page_title = 'Contact Page Example';
		$new_page_content = '[contact email="youraddress@email.com"]';
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_sidebar', 'gp-contact-page');
		}
		

		/////////////////////////////////////// Create Posts ///////////////////////////////////////	


		/*************************************** Post 1 ***************************************/	
				
		$new_page_title = 'Post Example 1';
		$new_page_content = 'Compellingly drive goal-oriented initiatives without high-payoff internal or "organic" sources. Objectively provide access to cooperative human capital after highly efficient value. Credibly administrate multimedia based applications with cooperative niche markets. Seamlessly evolve focused models for state of the art quality vectors. Assertively harness long-term high-impact catalysts for change with.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_link_type', 'Page');
			set_post_thumbnail($new_page_id, $attachment_id1);
		}
		
		
		/*************************************** Post 2 ***************************************/	
				
		$new_page_title = 'Post Example 2';
		$new_page_content = 'Proactively foster superior growth strategies and adaptive users. Conveniently deploy timely strategic theme areas vis-a-vis B2B scenarios. Progressively cultivate viral partnerships after state of the art e-commerce. Proactively synergize sticky best practices without ethical e-tailers. Quickly visualize customized data and synergistic infrastructures.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_link_type', 'Page');
			set_post_thumbnail($new_page_id, $attachment_id2);
		}			
				
				
		/////////////////////////////////////// Create Slides ///////////////////////////////////////	
		

		/*************************************** Slide 1 ***************************************/	
				
		$new_page_title = 'Custom Slide Example';
		$new_page_content = 
'[two][text size="40" line_height="50" margins="40,0,0,40"]Rapidiously enhance proactive.[/text] [text size="14" line_height="25" margins="15,0,0,40"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec consectetur nibh. Nulla facilisi. Vestibulum non ullamcorper arcu. Mauris pellentesque consequat justo, eget pellentesque odio ullamcorper eu. Ut neque ligula, mollis quis hendrerit ac, ullamcorper et augue. Vivamus auctor faucibus felis in porta.[/text] [/two]

[two_last] [image url="'.get_template_directory_uri().'/lib/images/placeholder1.png" width="370" height="300" margins="50,0,0,60"] [/two_last]';
		$page_check = get_page_by_title($new_page_title, '', 'slide');
		$new_page = array(
			'post_type' => 'slide',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_slide_type', 'Custom Slide');
			update_post_meta($new_page_id, 'ghostpool_slide_bg_color', '#ffffff');
		}
		
		
		/*************************************** Slide 2 ***************************************/	
				
		$new_page_title = 'Image Slide Example';
		$new_page_content = '
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec consectetur nibh. Nulla facilisi. Vestibulum non ullamcorper arcu. Mauris pellentesque consequat justo, eget pellentesque odio ullamcorper eu.

Collaboratively communicate B2C innovation without interactive resources. Conveniently mesh scalable niches via excellent e-commerce. Collaboratively predominate user friendly technologies after exceptional users. Authoritatively parallel task distinctive platforms rather than state of.';
		$page_check = get_page_by_title($new_page_title, '', 'slide');
		$new_page = array(
			'post_type' => 'slide',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_slide_type', 'Image/Video Slide');
			update_post_meta($new_page_id, 'ghostpool_slide_url', '#');
			update_post_meta($new_page_id, 'ghostpool_slide_link_type', 'Page');
			update_post_meta($new_page_id, 'ghostpool_slide_caption_type', 'Left Frame');
			update_post_meta($new_page_id, 'ghostpool_slide_caption_style', 'Dark');
			set_post_thumbnail($new_page_id, $attachment_id2);
		}
		
		
		/*************************************** Slide 3 ***************************************/	
				
		$new_page_title = 'Video Slide Example';
		$new_page_content = '';
		$page_check = get_page_by_title($new_page_title, '', 'slide');
		$new_page = array(
			'post_type' => 'slide',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_slide_type', 'Image/Video Slide');
			update_post_meta($new_page_id, 'ghostpool_slide_video', 'http://vimeo.com/36006533');
			update_post_meta($new_page_id, 'ghostpool_slide_caption_type', 'None');
			update_post_meta($new_page_id, 'ghostpool_hide_slide_title', true);
			set_post_thumbnail($new_page_id, $attachment_id1);
		}

		
		/////////////////////////////////////// Create Navigation ///////////////////////////////////////	


		/*************************************** Header Nav ***************************************/	
		
		$menu_name = 'Header Example';
		$menu_location = 'header-nav';
		$menu_exists = wp_get_nav_menu_object($menu_name);			
		if(!$menu_exists) {
			$menu_id = wp_create_nav_menu($menu_name);
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Home',
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'), 
				'menu-item-status' => 'publish')
			);		
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Blog',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('blog-page-example')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);									
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Contact',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('contact-page-example')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);
			if(!has_nav_menu($menu_location)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$menu_location] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}   

		/*************************************** Footer Nav ***************************************/	
		
		$menu_name = 'Footer Example';
		$menu_location = 'footer-nav';
		$menu_exists = wp_get_nav_menu_object($menu_name);			
		if(!$menu_exists) {
			$menu_id = wp_create_nav_menu($menu_name);
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Home',
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'), 
				'menu-item-status' => 'publish')
			);								
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Blog',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('blog-page-example')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Contact',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('contact-page-example')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);
			if(!has_nav_menu($menu_location)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$menu_location] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}   		  
			
	}
	
	update_option($dirname.'_theme_auto_install', '1');

}	

?>