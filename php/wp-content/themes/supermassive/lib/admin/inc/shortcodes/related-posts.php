<?php

//////////////////////////////////////// Related Posts ////////////////////////////////////////

function gp_related_posts($atts, $content = null) {
	extract(shortcode_atts(array(
		'name' => '',
		'header' => '',
        'id' => '',
		'cats' => '',
		'images' => 'true',
		'image_width' => '55',
		'image_height' => '55',
		'image_wrap' => 'true',
		'cols' => '3',
		'per_page' => '6',
		'link' => 'both',
		'orderby' => 'random',
		'order' => 'desc',
		'offset' => '0',
		'content_display' => 'excerpt',
		'excerpt_length' => '0',
		'title' => 'true',
		'title_size' => '',
		'title_font' => '',
		'meta' => 'true',
		'meta_author' => 'false',
		'meta_date' => 'true',
		'meta_cats' => 'false',
		'meta_comments' => 'false',
		'meta_tags' => 'false',
		'read_more' => 'false',
		'pagination' => 'false',
		'preload' => 'false',
		'spacing' => 'spacing-small'	
    ), $atts));

	global $wp_query, $post;
	require(gp_inc . 'options.php');


	// Post ID
	
	if($id == '') {
		$id = $post->ID;
	} else {
		$id;
	}


	// Title Size
	
	if($title_size != "") {
		if(preg_match('/%/', $title_size) OR preg_match('/em/', $title_size) OR preg_match('/px/', $title_size)) {
			$title_size = 'font-size: '.$title_size.'; ';				
		} else {
			$title_size = 'font-size: '.$title_size.'px; ';		
		}
	} else {
		$title_size = "";
	}
	
	
	// Preload
	
	if($preload == "true") {
		$preload = " preload ";
	} else {
		$preload = "";
	}
	
	
	// Pagination	
	
	if (get_query_var('paged')) {
		$paged = get_query_var('paged');
	} elseif (get_query_var('page')) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	
	// Post Query
	
	$tags = wp_get_post_tags($id);
	$tempQuery = $wp_query;
	
	if($tags) {
	$tag_ids = array();
	
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => $cats,
	'paged' => $paged,
	'ignore_sticky_posts' => 0,
	'orderby' => $orderby,
	'order' => $order,
	'posts_per_page' => $per_page,
	'offset' => $offset,
	'tag__in' => $tag_ids,
	'post__not_in' => array($id)
	);
	
	$featured_query = new wp_query($args); 
	
	ob_start(); ?>
	
	
	<!-- BEGIN POST WRAPPER -->
		
	<div class="post-wrapper related-posts <?php echo $name.' '.$spacing; ?>">
		
		
		<!-- BEGIN HEADER -->
		
		<?php if($header) { ?><h3><?php echo $header; ?></h3><?php } ?>
		
		<!-- END HEADER -->
		
			
		<?php while ($featured_query->have_posts()) : $featured_query->the_post(); $counter = $counter + 1;


		// Image Dimensions
		
		if(get_post_meta($post->ID, 'ghostpool_thumbnail_width', true) && get_post_meta($post->ID, 'ghostpool_thumbnail_width', true) != "") {
			$image_width = get_post_meta($post->ID, 'ghostpool_thumbnail_width', true);
		} else {
			$image_width;
		}
		if(get_post_meta($post->ID, 'ghostpool_thumbnail_height', true) && get_post_meta($post->ID, 'ghostpool_thumbnail_height', true) != "") {
			$image_height = get_post_meta($post->ID, 'ghostpool_thumbnail_height', true);
		} else {
			$image_height;
		}
		
		
		// Columns
		
		if($counter %$cols == 1) {
			$first_column = " first-column ";
		} else {
			$first_column = "";
		}
	
		if($cols > 1) {
			$columns = " post-columns ";
		} else {
			$columns = "";
		}

		$col_width = (100 - (($cols -1) * 4)) / $cols;
		
		?>
		
		
			<!-- BEGIN POST -->
			
			<div <?php post_class('post-loop'.$preload.$first_column.$columns); ?> style="width: <?php echo $col_width; ?>%;">

				<!-- BEGIN POST TEXT -->
									
				<div class="post-text"<?php if((has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) && $images == "true" && $image_wrap == "true") { ?> style="margin-left: <?php echo $image_width + 20; ?>px;"<?php } ?>>
					
					
					<!-- BEGIN TITLE -->
					
					<?php if($title == "true") { ?><h2 style="<?php echo $title_size; ?><?php if($title_font) { ?> font-family: <?php echo $title_font; ?>;<?php } ?>"><?php if($link == "title" OR $link == "both") { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php } ?><?php the_title(); ?><?php if($link == "title" OR $link == "both") { ?></a><?php } ?></h2><?php } ?>
					
					<!-- END TITLE -->
					
					
					<!-- BEGIN POST META -->
					
					<?php if($meta == "true" && ($meta_date == "true" OR $meta_author == "true" OR $meta_cats == "true" OR $meta_comments == "true")) { ?>
					
						<?php if($meta_cats == "true") { ?><div class="post-cats"><?php the_category(' / '); ?></div><?php } ?>
	
						<div class="post-meta">
						
							<?php if($meta_author == "true") { ?><?php _e('Posted by', 'gp_lang'); ?> <?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
							
							<?php if($meta_date == "true") { ?><?php the_time(get_option('date_format')); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
							
							<?php if($meta_comments == "true" && 'open' == $post->comment_status) { ?><?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?>&nbsp;&nbsp;&nbsp;<?php } ?></div>
											
					<?php } ?>
					
					<!-- END TITLE -->

                    <!-- BEGIN IMAGE -->

                    <?php if((has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) && $images == "true") { ?>
                        <div class="post-thumbnail<?php if($image_wrap == "true") { ?> wrap<?php } ?>">

                            <?php if($link == "image" OR $link == "both") { ?>
                            <a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { echo get_post_meta($post->ID, 'ghostpool_custom_url', true); } else { the_permalink(); } ?>">
                                <?php } ?>

                                <?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>

                                <img src="<?php echo $image['url']; ?>" width="<?php echo $image_width; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { echo get_the_title(); } ?>" />

                                <?php if($link == "image" OR $link == "both") { ?></a><?php } ?>

                        </div>

                        <?php if($image_wrap == "false") { ?><div class="clear"></div><?php } ?>

                    <?php } ?>

                    <!-- END IMAGE -->

					<!-- BEGIN POST CONTENT -->
														
					<?php if($content_display == "full") { ?>	
					
						<?php global $more; $more = 0; the_content(__('Read More &raquo;', 'gp_lang')); ?>
						
					<?php } else { ?>
					
						<?php if($excerpt_length != "0") { ?><p><?php echo excerpt($excerpt_length); ?><?php if($read_more == "true") { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title(); ?>"><?php _e('Read More', 'gp_lang'); ?> &raquo;</a><?php } ?></p><?php } ?>
					
					<?php } ?>
					
					<!-- END POST CONTENT -->
					
					
					<!-- BEGIN POST TAGS -->
					
					<?php if($meta == "true" && $meta_tags == "true") { ?>
						<?php the_tags('<div class="post-meta post-tags"><span class="tag-icon">', ', ', '</span></div>'); ?>
					<?php } ?>
					
					<!-- END POST TAGS -->
					
				
				</div>
				
				<!-- END POST TEXT -->
				
				
				<?php if($divider == "curved") {?><div class="clear"></div><div class="sc-divider curved"></div><?php } elseif($divider == "line") { ?><div class="clear"></div><div class="sc-divider"></div><?php } elseif($divider == "top") { ?><div class="clear"></div><div class="sc-divider top"></div><?php } else {} ?>
				
				
			</div>
			
			<!-- END POST -->
			
			
			<?php if($cols > 1 && $counter %$cols == 0) { ?><div class="clear"></div><?php } ?>
			
			
		<?php endwhile; ?>
		

		<div class="clear"></div>
		
		
	</div>
	
	<!-- END POST WRAPPER -->
	

<?php 

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	} wp_reset_query();
		
	return $output_string;

}

add_shortcode("related_posts", "gp_related_posts");

?>