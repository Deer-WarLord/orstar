<?php
/*
Template Name: Page List
*/
get_header(); global $gp_settings; ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


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
		

		<!-- BEGIN PAGE LIST -->
								
		<?php $children = wp_list_pages('depth=1&title_li=&child_of='.$post->ID.'&echo=0'); if($children) { ?>
		
			<ul class="page-list">
				<?php echo $children; ?>
			</ul>
			
		<?php } ?>
		
		<!-- END PAGE LIST -->
			
	
	</div>
	
	<!-- END CONTENT -->
	
	
	<?php get_sidebar(); ?>


<?php endwhile; endif; ?>


<?php get_footer(); ?>