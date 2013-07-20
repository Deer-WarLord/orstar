<div class="social">

	<?php if($theme_rss_button == "1") {} else { ?><a href="<?php if($theme_rss) { ?><?php echo($theme_rss); ?><?php } else { ?><?php bloginfo('rss2_url'); ?><?php } ?>" title="<?php _e('RSS Feed', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/feed.png" alt="<?php _e('RSS Feed', 'gp_lang'); ?>" /></a><?php } ?>
	
	<?php if($theme_twitter) { ?><a href="<?php echo $theme_twitter; ?>" title="<?php _e('Twitter', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/twitter.png" alt="<?php _e('Twitter', 'gp_lang'); ?>" /></a><?php } ?>
	
	<?php if($theme_facebook) { ?><a href="<?php echo $theme_facebook; ?>" title="<?php _e('Facebook', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/facebook.png" alt="<?php _e('Facebook', 'gp_lang'); ?>" /></a><?php } ?>
	
	<?php if($theme_myspace) { ?><a href="<?php echo $theme_myspace; ?>" title="<?php _e('MySpace', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/myspace.png" alt="<?php _e('MySpace', 'gp_lang'); ?>" /></a><?php } ?>
	
	<?php if($theme_digg) { ?><a href="<?php echo $theme_digg; ?>" title="<?php _e('Digg', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/digg.png" alt="<?php _e('Digg', 'gp_lang'); ?>" /></a><?php } ?>
	
	<?php if($theme_flickr) { ?><a href="<?php echo $theme_flickr; ?>" title="<?php _e('Flickr', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/flickr.png" alt="<?php _e('Flickr', 'gp_lang'); ?>" /></a><?php } ?>

	<?php if($theme_delicious) { ?><a href="<?php echo $theme_delicious; ?>" title="<?php _e('Delicious', 'gp_lang'); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/delicious.png" alt="<?php _e('Delicious', 'gp_lang'); ?>" /></a><?php } ?>

	<?php if($theme_youtube) { ?><a href="<?php echo $theme_youtube; ?>" title="<?php _e('YouTube', 'gp_lang'); ?>"  rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/youtube.png" alt="<?php _e('YouTube', 'gp_lang'); ?>" /></a><?php } ?>

	<?php if($theme_google_plus) { ?><a href="<?php echo $theme_google_plus; ?>" title="<?php _e('Google+', 'gp_lang'); ?>"  rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social/google_plus_1.png" alt="<?php _e('Google+', 'gp_lang'); ?>" /></a><?php } ?>
		
	<?php echo stripslashes($theme_additional_social_icons); ?>
	
</div>