<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js">
<head>
<meta charset=<?php bloginfo('charset'); ?> />
<title><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<?php require(gp_inc . 'options.php'); ?>
<?php wp_head(); ?>
<?php require(gp_inc . 'styling.php'); ?>
<?php require(gp_inc . 'page-styling.php'); ?>
</head>	
				
<!--[if !IE]><!-->
<body <?php body_class($gp_settings['browser'].' '.$gp_settings['layout'].' '.$gp_settings['frame'].' '.$gp_settings['skin']); ?>>
<!--<![endif]-->
<!--[if gt IE 8]>
<body <?php body_class('ie9 '.$gp_settings['browser'].' '.$gp_settings['layout'].' '.$gp_settings['frame'].' '.$gp_settings['skin']); ?>>
<![endif]-->
<!--[if lt IE 9]>
<body <?php body_class('ie8 '.$gp_settings['browser'].' '.$gp_settings['layout'].' '.$gp_settings['frame'].' '.$gp_settings['skin']); ?>>
<![endif]-->


<?php if(!is_page_template('blank-page.php')) { ?>

	
	<!-- BEGIN PAGE WRAPPER -->
	
	<div id="page-wrapper"<?php if($theme_custom_header) { ?> style="background: url(<?php echo $theme_custom_header; ?>)
	<?php if($theme_header_repeat == "No Repeat") { ?>no-repeat
	<?php } elseif($theme_header_repeat == "Repeat Vertically") { ?>repeat-y
	<?php } elseif($theme_header_repeat == "Repeat Horizontally") { ?>repeat-x
	<?php } else { ?>repeat<?php } ?>
	<?php if($theme_header_position == "Right") { ?> right top
	<?php } elseif($theme_header_position == "Left") { ?> left top
	<?php } else { ?> center top<?php } ?>;"<?php } ?>>
		
		
		<!-- BEGIN HEADER -->
		
		<div id="header">
		
		
			<!-- BEGIN HEADER TOP -->
			
			<div id="header-top">
	
				
				<!-- BEGIN LOGIN/REGISTER LINKS -->
				
				<?php if($theme_profile_links == "0") { ?>
				
					<div id="user-panel">
					
						<?php if(is_user_logged_in()) { global $bp, $current_user; get_currentuserinfo(); ?>	
											
							<span class="login-name"><?php echo $current_user->display_name; ?></span>
						
							<?php if(function_exists('bp_is_active')) { ?><a href="<?php echo $bp->loggedin_user->domain; ?>"><?php _e('Profile', 'gp_lang'); ?></a><?php } ?>		
							
							<a href="<?php echo wp_logout_url(esc_url($_SERVER['REQUEST_URI'])); ?>"><?php _e('Logout', 'gp_lang'); ?></a>
		
						<?php } else { ?>
							
							<a href="<?php if($theme_login_url) { echo $theme_login_url; } else { echo wp_login_url(); } ?>"><?php _e('Login', 'gp_lang'); ?></a>
							
							<?php if((function_exists('bp_is_active') && bp_get_signup_allowed()) OR $theme_register_url) { ?><a href="<?php if($theme_register_url) { echo $theme_register_url; } else { echo bp_get_signup_page(false); } ?>"><?php _e('Sign Up', 'gp_lang'); ?></a><?php } ?>
							
						<?php } ?>
					
					</div>
					
				<?php } ?>
				
				<!-- END LOGIN/REGISTER -->
			
			
				<!-- BEGIN LOGO -->
				
				<<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?> id="logo" style="<?php if($theme_logo_top) { ?> margin-top: <?php echo $theme_logo_top; ?>px;<?php } ?><?php if($theme_logo_left) { ?> margin-left: <?php echo $theme_logo_left; ?>px;<?php } ?><?php if($theme_logo_bottom) { ?> margin-bottom: <?php echo $theme_logo_bottom; ?>px;<?php } ?>">
					
					<span class="logo-details"><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></span>
					
					<?php if($theme_custom_logo) { ?><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo($theme_custom_logo); ?>" alt="<?php bloginfo('name'); ?>" /></a><?php } else { ?><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><span class="default-logo"></span></a><?php } ?>
					
				</<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?>>
				
				<!-- END LOGO -->
				
				
				<!-- BEGIN CONTACT INFO -->
					
				<?php if($theme_contact_info OR $theme_social_icons != "Footer") { ?>
				<div id="contact-info"<?php if($theme_profile_links == "0") { ?> class="profile-links-active"<?php } ?>>
					<?php echo do_shortcode(stripslashes($theme_contact_info)); ?>
					<div class="clear"></div>
					<?php if($theme_social_icons != "Footer") { require('social-icons.php'); } ?>
				</div>
				<?php } ?>
				
				<!-- END CONTACT INFO -->
				
			</div>
			
			<!-- END HEADER TOP -->
			
			
			<div class="clear"></div>
			
			
			<!-- BEGIN NAV -->
			
			<div id="nav">
			
				<?php wp_nav_menu('sort_column=menu_order&container=ul&theme_location=header-nav&fallback_cb=null'); ?>
				<?php if($theme_search_form == "0") { get_search_form(); } ?>
				
			</div>
			
			<!-- END NAV -->
		
		</div>	
		
		<!-- END HEADER -->
		
		
		<!-- BEGIN TOP CONTENT -->
		
		<?php if(get_post_meta($post->ID, 'ghostpool_top_content', true)) { ?>
			<div class="top-content">
				<?php echo stripslashes(do_shortcode(get_post_meta($post->ID, 'ghostpool_top_content', true))); ?>
			</div><div class="clear"></div>
		<?php } ?>
		
		<!-- END TOP CONTENT -->
	
	
		<!-- BEGIN CONTENT WRAPPER -->
	
		<div id="content-wrapper">
		

<?php } ?>	