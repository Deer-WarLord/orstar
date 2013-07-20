<!--Begin Image-->
<?php if(has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>					
	<div class="portfolio-thumbnail <?php echo $shadow; ?>" style="background-position: center <?php echo ($image_height - 16); ?>px;">
		
		<?php if($link == "image" OR $link == "both") { ?>
			<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), 9999, 9999, true); ?>
			<a href="<?php if(get_post_meta($post->ID, 'ghostpool_link_type', true) == "Lightbox Video") { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); } elseif(get_post_meta($post->ID, 'ghostpool_link_type', true) == "Lightbox Image") { if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { echo get_post_meta($post->ID, 'ghostpool_custom_url', true); } else { echo $image[url]; }} else { if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { echo get_post_meta($post->ID, 'ghostpool_custom_url', true); } else { the_permalink(); }} ?>"<?php if(get_post_meta($post->ID, 'ghostpool_link_type', true) != "Page") { ?> rel="prettyPhoto[gallery<?php the_ID(); echo $name; ?>]"<?php } ?>>
		<?php } ?>
														
			<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>
		
			<?php if($link == "image" OR $link == "both") { ?>
				<?php if(get_post_meta($post->ID, 'ghostpool_link_type', true) == "Lightbox Image") { ?><span class="hover-image" style="width: <?php echo $image[width]; ?>px; height: <?php echo $image[height]; ?>px;"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_link_type', true) == "Lightbox Video") { ?><span class="hover-video" style="width: <?php echo $image[width]; ?>px; height: <?php echo $image[height]; ?>px;"></span><?php } ?>
			<?php } ?>
			
			<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="" class="<?php echo $reflection; ?>" />
			
		<?php if($link == "image" OR $link == "both") { ?></a><?php } ?>
		
		
	</div>	
	
		<?php if($type != "large") { ?><div class="clear"></div><?php } ?>
	
<?php } ?>
<!--End Image-->

<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'asc'); $attachments = get_children($args); if($attachments) { foreach ($attachments as $attachment) { if($attachment->menu_order >= 1) { ?>

	<a href="<?php if(get_post_meta($attachment->ID, '_ghostpool_video_url', true)) { ?>file=<?php echo get_post_meta($attachment->ID, '_ghostpool_video_url', true); } else { echo wp_get_attachment_url($attachment->ID); } ?>" rel="prettyPhoto[gallery<?php the_ID(); echo $name; ?>]" title="<?php echo $attachment->post_content; ?>" style="display: none;"><img src="" alt="<?php echo $attachment->post_title; ?>"></a>

<?php }}} ?>

<div class="portfolio-text"<?php if($type == "large") { ?> style="margin-left: <?php echo $image[width] + 20; ?>px;"<?php } ?>>

	<?php if($title == "true") { ?><h2><?php if($link == "title" OR $link == "both") { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php } ?><?php the_title(); ?><?php if($link == "title" OR $link == "both") { ?></a><?php } ?></h2><?php } ?>

	<?php if($excerpt_length == "0") {} elseif($excerpt_length != "0") { ?>
		<p><?php echo excerpt($excerpt_length); ?> <?php if($read_more == "true") { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More', 'gp_lang'); ?> &raquo;&raquo;</a><?php } ?></p>
	<?php } ?>
	
</div>