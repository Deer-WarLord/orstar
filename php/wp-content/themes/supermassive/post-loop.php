<?php global $gp_settings; ?>

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

	<?php if($gp_settings['title'] == "Show") { ?>
		<h1 class="page-title">
		<?php if(is_search()) { ?>
			<?php echo $wp_query->found_posts; ?> <?php _e('search results for', 'gp_lang'); ?> "<?php echo esc_html($s); ?>"
		<?php } elseif(is_category()) { ?>
			<?php single_cat_title(); ?>
		<?php } elseif(is_tag()) { ?>
			<?php single_tag_title(); ?>
		<?php } elseif(is_author()) { ?>
			<?php wp_title(''); ?>'s Posts
		<?php } elseif(is_archive()) { ?>
			<?php _e('Archives', 'gp_lang'); ?> <?php wp_title(' / '); ?>			
		<?php } ?>
		</h1>
	<?php } ?>
	
	<!-- BEGIN TITLE -->
	
	
	<!-- BEGIN POST WRAPPER -->
	
	<div class="post-wrapper">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
		
		// Image Dimensions
		
		if(get_post_meta($post->ID, 'ghostpool_thumbnail_width', true) != "") {
			$gp_settings['image_width'] = get_post_meta($post->ID, 'ghostpool_thumbnail_width', true);
		} else {
			$gp_settings['image_width'] = $gp_settings['thumbnail_width'];
		}
		if(get_post_meta($post->ID, 'ghostpool_thumbnail_height', true) != "") {
			$gp_settings['image_height'] = get_post_meta($post->ID, 'ghostpool_thumbnail_height', true);
		} else {
			$gp_settings['image_height'] = $gp_settings['thumbnail_height'];
		}	
		
		?>
		
			
			<!-- BEGIN POST -->
			
			<div <?php post_class('post-loop '.$gp_settings['preload']); ?>>
		
				
				<!-- BEGIN IMAGE -->
				
				<?php if(has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
					<div class="post-thumbnail <?php echo $gp_settings['shadow']; ?><?php if($gp_settings['image_wrap'] == "Enable") { ?> wrap<?php } ?>" style="background-position: center <?php echo ($gp_settings['image_height'] - 16); ?>px;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
							<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { echo get_the_title(); } ?>" class="<?php echo $gp_settings['reflection']; ?>" />			
						</a>
					</div><?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>
				<?php } ?>
				
				<!-- END IMAGE -->
					
				
				<!-- BEGIN POST TEXT -->
								
				<div class="post-text"<?php if((has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) && $gp_settings['image_wrap'] == "Enable") { ?> style="margin-left: <?php echo $gp_settings['image_width'] + 20; ?>px;"<?php } ?>>
				
					
					<!-- BEGIN TITLE -->
					
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<!-- END TITLE -->
					
					
					<!-- BEGIN POST META -->
					
					<?php if($gp_settings['meta_date'] == "0" OR $gp_settings['meta_author'] == "0" OR $gp_settings['meta_cats'] == "0" OR $gp_settings['meta_comments'] == "0") { ?>
					
						<?php if($gp_settings['meta_cats'] == "0") { ?><div class="post-cats"><?php the_category(' / '); ?></div><?php } ?>
	
						<div class="post-meta">
						
							<?php if($gp_settings['meta_author'] == "0") { ?><?php _e('Posted by', 'gp_lang'); ?> <?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
							
							<?php if($gp_settings['meta_date'] == "0") { ?><?php the_time(get_option('date_format')); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
							
							<?php if($gp_settings['meta_comments'] == "0" && 'open' == $post->comment_status) { ?><?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
							
						</div>
						
					<?php } ?>	
					
					<!-- END POST META -->
					
							
					<!-- BEGIN POST CONTENT -->
							
					<?php if($gp_settings['content_display'] == "1") { ?>
						
						<?php the_content(__('Read More &raquo;', 'gp_lang')); ?>
						
					<?php } else { ?>
					
						<?php if($gp_settings['excerpt_length'] != "0") { ?><p><?php echo excerpt($gp_settings['excerpt_length']); ?><?php if($gp_settings['read_more'] == "0") { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title(); ?>"><?php _e('Read More &raquo;', 'gp_lang'); ?></a><?php } ?></p><?php } ?>
						
					<?php } ?>
					
					<!-- END POST CONTENT -->
					
					
					<!-- BEGIN POST TAGS -->
					
					<?php if($gp_settings['meta_tags'] == "0") { ?>
						<?php the_tags('<div class="post-meta post-tags">'.__('Tags', 'gp_lang').' :', ', ', '</div>'); ?>
					<?php } ?>	
					
					<!-- END TITLE -->
					
					
				</div>
				
				<!-- END POST TEXT -->
				
										
				<div class="clear"></div>			
				<div class="sc-divider curved"></div>
	
			</div>
			
			<!-- END POST -->
			
			
		<?php endwhile; ?>
			
			
			<?php gp_pagination(); ?>
	
	
		<?php else : ?>	
	
	
			<h4><?php _e('Try searching again using the search form below.', 'gp_lang'); ?></h4>
		
			<div class="sc-divider curved"></div>
			
			<h3><?php _e('Search The Site', 'gp_lang'); ?></h3>
			<?php get_search_form(); ?>	
		
		
		<?php endif; ?>	
	
	
	</div>
	
	<!-- END POST WRAPPER -->
	
	
</div>

<!-- END CONTENT -->

	
<?php get_sidebar(); ?>