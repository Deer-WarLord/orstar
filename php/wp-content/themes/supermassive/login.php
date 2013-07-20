<?php
/*
Template Name: Login
*/
get_header(); global $gp_settings, $user_ID, $user_identity, $user_level;

$referrer = $_SERVER['HTTP_REFERER'];

if (have_posts()) : while (have_posts()) : the_post(); ?>

		
	<!-- BEGIN BREADCRUMBS WITH NO FRAME -->
	
	<?php if($gp_settings['frame'] == "no-frame") { ?>		
		<?php if($gp_settings['breadcrumbs'] == "Show") { ?>
			<div id="breadcrumbs"><?php echo the_breadcrumb(); ?></div><div class="clear"></div>
		<?php } else { ?>
			<div class="no-breadcrumbs"></div><div class="clear"></div>
		<?php } ?>	
	<?php } ?>
	
	<!-- END BREADCRUMBS WITH NO FRAME -->
	
	
	<!-- BEGIN CONTENT -->
	
	<div id="content">
	
		
		<!-- BEGIN BREADCRUMBS WITH FRAME -->
		
		<?php if($gp_settings['frame'] == "frame") { ?>		
			<?php if($gp_settings['breadcrumbs'] == "Show") { ?>
				<div id="breadcrumbs"><?php echo the_breadcrumb(); ?></div><div class="clear"></div>
			<?php } ?>
		<?php } ?>
		
		<!-- END BREADCRUMBS WITH FRAME -->
		
		
		<!-- BEGIN TITLE -->
		
		<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
		
		<!-- END TITLE -->
		
				
		<!-- BEGIN IMAGE -->
		
		<?php if((has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) && $gp_settings['show_image'] == "Show") { ?>
			<div class="post-thumbnail <?php echo $gp_settings['shadow']; ?><?php if($gp_settings['image_wrap'] == "Enable") { ?> wrap<?php } ?>" style="background-position: center <?php echo ($gp_settings['image_height'] - 16); ?>px;">
				<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
				<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { echo get_the_title(); } ?>" class="<?php echo $gp_settings['reflection']; ?>" />			
			</div><?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>
		<?php } ?>
		
		<!-- END IMAGE -->
		
		
		<!-- BEGIN POST CONTENT -->
		
		<div id="post-content">
		
			<?php the_content(__('Read More &raquo;', 'gp_lang')); ?>
		
		</div>
				
		<!-- END POST CONTENT -->
		
			
		<?php if($user_ID) { ?>
		
		
			<?php _e('You are already logged in.', 'gp_lang'); ?>
		
		
		<?php } else { ?>
		
			
			<!-- BEGIN LOGIN FORM -->
			
			<form action="<?php echo site_url(); ?>/wp-login.php" method="post" class="login-form">
			
				<p><label for="log"><?php _e('Username', 'gp_lang'); ?></label>
				<br/><input type="text" name="log" id="log" value="<?php echo esc_html(stripslashes($user_login), 1) ?>" size="22" /></p>
				
				<p><label for="pwd"><?php _e('Password', 'gp_lang'); ?></label><br/>
				<input type="password" name="pwd" id="pwd" size="22" /></p>
				
				<p><input type="submit" name="submit" value="<?php _e('Login', 'gp_lang'); ?>" class="button" />
				<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php _e('Remember Me', 'gp_lang'); ?></label></p>
				<input type="hidden" name="redirect_to" value="<?php if(preg_match("/key=/", $referrer)) { echo home_url(); } else { echo $referrer; } ?>"/>
				
			</form>
			
			<!-- END LOGIN FORM -->
			
			
			<!-- BEGIN LOGIN LINKS -->
					
			<?php if((function_exists('bp_is_active') && bp_get_signup_allowed()) OR $theme_register_url) { ?><a href="<?php if($theme_register_url) { echo $theme_register_url; } else { echo bp_get_signup_page(false); } ?>"><?php _e('Register', 'gp_lang'); ?></a> | <?php } ?><a href="<?php echo site_url(); ?>/wp-login.php?action=lostpassword"><?php _e('Lost Password', 'gp_lang'); ?></a>
			
			<!-- END LOGIN LINKS -->
			
		
		<?php } ?>
		
	
	</div>
	
	<!-- END CONTENT -->
		
		
	<?php get_sidebar(); ?>


<?php endwhile; endif; ?>


<?php get_footer(); ?>