<?php get_header(); 

global $gp_settings;

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


		<!-- BEGIN POST META -->
		
		<?php if($gp_settings['meta_date'] == "0" OR $gp_settings['meta_author'] == "0" OR $gp_settings['meta_cats'] == "0" OR $gp_settings['meta_comments'] == "0") { ?>

			<?php if($gp_settings['meta_cats'] == "0") { ?><div class="post-cats"><?php the_category(' / '); ?></div><?php } ?>

			<div class="post-meta">
			
				<?php if($gp_settings['meta_author'] == "0") { ?><?php _e('Posted by', 'gp_lang'); ?> <?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
				
				<?php if($gp_settings['meta_date'] == "0") { ?><?php the_time(get_option('date_format')); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
				
				<?php if($gp_settings['meta_comments'] == "0" && 'open' == $post->comment_status) { ?><?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?>&nbsp;&nbsp;&nbsp;<?php } ?></div>
					
		<?php } ?>
		
		<!-- END POST META -->
				
				
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
		
		
		<!-- BEGIN POST NAV -->
		
		<?php wp_link_pages('before=<div class="clear"></div><div class="post-navi">&pagelink=<span>%</span>&after=</div>'); ?>		
		
		<!-- END POST NAV -->
		
	
		<!-- BEGIN POST TAGS -->	

		<?php if($gp_settings['meta_tags'] == "0") { ?>
			<?php the_tags('<div class="post-meta post-tags">'.__('Tags: ', 'gp_lang'), ', ', '</div>'); ?>
		<?php } ?>	
		
		<!-- END POST TAGS -->	
					
					
		<!-- BEGIN AUTHOR INFO PANEL -->
		
		<?php if($gp_settings['author_info'] == "0") { ?><?php echo do_shortcode('[author]'); ?><?php } ?>	
		
		<!-- END AUTHOR INFO PANEL -->


		<!-- BEGIN RELATED POSTS -->	
		
		<?php if($gp_settings['related_items'] == "0") { ?>				
			<div class="sc-divider curved"></div>		
			<?php echo do_shortcode('[related_posts header="'.__('Related Posts', 'gp_lang').'" per_page="'.$theme_post_related_limit.'" image_width="'.$theme_post_related_image_width.'" image_height="'.$theme_post_related_image_height.'"]'); ?>			
		<?php } ?>
		
		<!-- END RELATED POSTS -->	
				
		
		<!-- BEGIN COMMENTS -->	
		
		<?php comments_template(); ?>

		<!-- END COMMENTS -->	
		
		
	</div>
	
	<!-- END CONTENT -->	
	
	
	<?php get_sidebar(); ?>


<?php endwhile; endif; ?>


<?php get_footer(); ?>