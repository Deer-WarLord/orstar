<?php 

//*************************** Slider ***************************//

function gp_slider($atts, $content = null) {
    extract(shortcode_atts(array(
		'name' => 'slider',
        'width' => '980',
        'height' => '400',
        'cats' => '',
        'slides' => '-1',
        'effect' => 'fade',
        'timeout' => '6',
        'orderby' => 'menu_order',
        'order' => 'asc',        
        'nav' => '1',
        'arrows' => 'true',
		'margins' => '',
        'align' => 'alignnone',
		'preload' => 'false',
		'shadow' => ''
    ), $atts));

	require(gp_inc . 'options.php'); global $wp_query, $post, $gp_settings;


	// Remove spaces from slider name
	
	$name = preg_replace('/[^a-zA-Z0-9]/', '', $name);

	
	// Categories
	
	if($cats) { 
		$cats = array('taxonomy' => 'slide_categories', 'terms' => explode(',', $cats), 'field' => 'id');
	} else {
		$cats = null;
	}
	
	
	// Margins
	
	if($margins != "") {
		if(preg_match('/%/', $margins) OR preg_match('/em/', $margins) OR preg_match('/px/', $margins)) {
			$margins = str_replace(",", " ", $margins);
			$margins = 'margin: '.$margins.'; ';	
		} else {
			$margins = str_replace(",", "px ", $margins);
			$margins = 'margin: '.$margins.'px; ';		
		}
		$margins = str_replace("autopx", "auto", $margins);
	} else {
		$margins = "";
	}
		
		
	// Preload
	
	if($preload == "true") {
		$preload = " preload";
	} else {
		$preload = "";
	}
	
	
	// Slider Query	
	
	$args=array(
	'post_type' => 'slide',
	'posts_per_page' => $slides,
	'ignore_sticky_posts' => 0,
	'orderby' => $orderby,
	'order' => $order,
	'tax_query' => array('relation' => 'OR', $cats)
	);
		
	$featured_query = new wp_query($args);
	
	ob_start(); ?>
	
	<?php if ($featured_query->have_posts()) : ?>
	
	
	<!-- BEGIN SLIDER WRAPPER -->
	
	<div class="slider-wrapper <?php echo $align; ?> <?php echo $shadow; ?><?php if($shadow != "none") { if($nav == "1") { ?> nav-padding<?php } else { ?> padding<?php }} ?>" id="<?php echo $name; ?>-wrapper" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px; <?php echo $margins; ?>">
		
		
		<!-- BEGIN SLIDER ARROWS -->

		<?php if($arrows == "true") { $slider_arrow_position = ($height - 56)/2 ;?>			
			<div class="slide-prev" style="top: <?php echo $slider_arrow_position; ?>px;"></div>
			<div class="slide-next" style="top: <?php echo $slider_arrow_position; ?>px;"></div>
		<?php } else {} ?>

		<!-- END SLIDER ARROWS -->
			
			
		<!-- BEGIN SLIDER -->

		<div id="<?php echo $name; ?>" class="slider" style="height: <?php echo $height; ?>px;">

			<?php while ($featured_query->have_posts()) : $featured_query->the_post(); $slide_counter++;
			
			
				// Placeholder Image	
							
				if(get_post_meta($post->ID, 'ghostpool_slide_image', true)) {
					$gp_settings['placeholder'] = get_post_meta($post->ID, 'ghostpool_slide_image', true);
				} else {
					$gp_settings['placeholder'] = get_template_directory_uri().'/lib/images/placeholder1.png';
				}
				
				$slide_caption_type = get_post_meta($post->ID, 'ghostpool_slide_caption_type', true); ?>
		
		
				<!-- BEGIN SLIDE -->
				
				<div class="slide<?php if($slide_counter != '1') {} elseif(get_post_meta($post->ID, 'ghostpool_slide_autostart_video', true)) { ?> video-autostart<?php } ?>" id="<?php echo $name; ?>-slide-<?php the_ID(); ?>" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;">

					
					<?php if(get_post_meta($post->ID, 'ghostpool_slide_type', true) == "Custom Slide") { ?>
					
					
						<!-- BEGIN CUSOTM CONTENT -->		
										
						<div class="custom-slide" style="height: <?php echo $height; ?>px; width: <?php echo $width; ?>px; background-color: <?php echo get_post_meta($post->ID, 'ghostpool_slide_bg_color', true); ?>; background-image: url(<?php echo get_post_meta($post->ID, 'ghostpool_slide_bg_image', true); ?>); background-repeat: <?php if(get_post_meta($post->ID, 'ghostpool_slide_bg_repeat', true) == "Repeat Horizontally") { ?>repeat-x<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_bg_repeat', true) == "Repeat Vertically") { ?>repeat-y<?php } else {} ?>;">
							<?php do_shortcode(the_content(__('Read More &raquo;', 'gp_lang'))); ?>
						</div>	
								
						<!-- END CUSTOM CONTENT -->
						
						
					<?php } else { ?>	
						
						
						<!-- BEGIN FIXED CONTENT -->	
										
						<?php


						// Default Image Width
						
						$image_width = $width;
						
						// Caption Type
						if($slide_caption_type == "Left Frame") {
							$caption_class = "caption-left";
						} elseif($slide_caption_type == "Right Frame") {
							$caption_class = "caption-right";
						} elseif($slide_caption_type == "Top Left Overlay") {
							$caption_class = "caption-topleft";
						} elseif($slide_caption_type == "Top Right Overlay") {
							$caption_class = "caption-topright";
						} elseif($slide_caption_type == "Bottom Left Overlay") {
							$caption_class = "caption-bottomleft ";
						} elseif($slide_caption_type == "Bottom Right Overlay") {
							$caption_class = "caption-bottomright";
						}
					
					
						// Caption Frame	
										
						if($slide_caption_type == "Left Frame" OR $slide_caption_type == "Right Frame") { 
						
						
							// Frame Dimensions
							
							$image_width = round($width/1.5);
							$frame_width = $width - $image_width - 40;
							$frame_height = $height - 40;
						
						?>
						
							<div class="caption-frame <?php echo $caption_class; ?> <?php if(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Light") { ?>caption-light<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Dark") { ?>caption-dark<?php } ?>" style="width: <?php echo $frame_width; ?>px; height: <?php echo $frame_height; ?>px;">
								<?php if(!get_post_meta($post->ID, 'ghostpool_hide_slide_title', true)) { ?><h2><?php the_title(); ?></h2><?php } ?>
								<?php do_shortcode(the_content(__('Read More &raquo;', 'gp_lang'))); ?>
							</div>
						
						<?php // Caption Overlay 
						
						} elseif($slide_caption_type != "None") { ?>
						
							<div class="caption-overlay <?php echo $caption_class; ?> <?php if(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Light") { ?>caption-light<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Dark") { ?>caption-dark<?php } ?> <?php if(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Image" OR get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Video") { ?>lightbox<?php } ?>">
								<?php if(!get_post_meta($post->ID, 'ghostpool_hide_slide_title', true)) { ?><h2><?php the_title(); ?></h2><?php } ?>
								<?php do_shortcode(the_content(__('Read More &raquo;', 'gp_lang'))); ?>
							</div>
							
						<?php } ?>
						
						
						<!-- BEGIN VIDEO -->
						
						<?php if(get_post_meta($post->ID, 'ghostpool_slide_video', true) OR get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true) OR get_post_meta($post->ID, 'ghostpool_ogg_slide_video', true)) { ?>
	
							<?php
											
													
							// Video Type	
							
							$vimeo = strpos(get_post_meta($post->ID, 'ghostpool_slide_video', true),"vimeo.com");
							$yt1 = strpos(get_post_meta($post->ID, 'ghostpool_slide_video', true),"youtube.com");
							$yt2 = strpos(get_post_meta($post->ID, 'ghostpool_slide_video', true),"youtu.be"); 
							
							?>
						
							<div class="slide-video" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;">
							
								<div class="play-video" id="<?php echo $name; ?>-play-video-<?php the_ID(); ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;">
								
									<div class="play-video-button" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;"></div>

									<div class="slide-image">
										<div>
											<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $height, true); ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { echo get_the_title(); } ?>" />	
										</div>
									</div>
									
								</div>
							
								<?php if($vimeo) { // Vimeo
								
								
								// Vimeo Clip ID
								
								if(preg_match('/www.vimeo/', get_post_meta($post->ID, 'ghostpool_slide_video', true))) {							
									$vimeoid = trim(get_post_meta($post->ID, 'ghostpool_slide_video', true),'http://www.vimeo.com/');
								} else {							
									$vimeoid = trim(get_post_meta($post->ID, 'ghostpool_slide_video', true),'http://vimeo.com/');
								}
								
								?>
	
									<div class="video-player" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;">
										<iframe src="http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=<?php if($slide_counter != "1") { ?>0<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_autostart_video', true)) { ?>1<?php } else { ?>0<?php } ?>" width="<?php echo $image_width; ?>" height="<?php echo $height; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									</div>
									
									<script>						
									jQuery(window).load(function() { // Play Vimeo video
										jQuery("#<?php echo $name; ?>-play-video-<?php the_ID(); ?>").click(function(){
										  var thePage = jQuery("#<?php echo $name; ?>-slide-<?php the_ID(); ?> .video-player");
										  thePage.html(thePage.html().replace('http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=0', 'http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=1'));
										});
										jQuery("#<?php echo $name; ?>-wrapper .slide-prev, #<?php echo $name; ?>-wrapper .slide-next, #<?php echo $name; ?>-wrapper .slider-button").click(function(){ // Pause Vimeo video
										  var thePage = jQuery("#<?php echo $name; ?>-slide-<?php the_ID(); ?> .video-player");
										  thePage.html(thePage.html().replace('http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=1', 'http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=0'));
										});
									});
									</script>
									
							<?php } else { // JW Player ?>								
											
								<?php if(($gp_settings['iPhone'] OR $gp_settings['iPad']) && (!$yt1 && !$yt2)) { ?>
			
									<video id="<?php echo $name; ?>-player-<?php the_ID(); ?>" class="video-player" controls="controls" poster="<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $height, true); echo $image['url']; ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;">
										<source src="<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>" type="video/mp4" />
										<source src="<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>" type="video/webm" />
										<source src="<?php echo get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true); ?>" type="video/mp4" />
										<source src="<?php echo get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true); ?>" type="video/webm" />
										<source src="<?php echo get_post_meta($post->ID, 'ghostpool_ogg_slide_video', true); ?>" type="video/ogg" />
									</video>
								
								<?php } else { ?>	
								
									<div class="video-player">
										<div id="<?php echo $name; ?>-player-<?php the_ID(); ?>"></div>
									</div>
										
								<?php } ?>
									
								<script>
								
									//<![CDATA[
	
									jwplayer("<?php echo $name; ?>-player-<?php the_ID(); ?>").setup({
										image: "<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $height, true); echo $image['url']; ?>",
										icons: "true",
										autostart: "<?php if($slide_counter != '1') { ?>false<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_autostart_video', true)) { ?>true<?php } else { ?>false<?php } ?>",
										stretching: "fill",
										controlbar: "<?php if(get_post_meta($post->ID, 'ghostpool_slide_video_controls', true) == 'Over') { ?>over<?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_video_controls', true) == 'Bottom') { ?>bottom<?php } else { ?>none<?php } ?>",
										skin: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/fs39/fs39.xml",
										height: <?php echo $height; ?>,
										width: <?php echo $image_width; ?>,
										screencolor: "000000",
										modes:
											[
											<?php if($gp_settings['MSIE'] OR get_post_meta($post->ID, 'ghostpool_slide_video_priority', true) == 'Flash') { ?>
												{type: "flash", src: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/player.swf", config: {file: "<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>"}},					
												{type: "html5", config: {file: "<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>"<?php if(($gp_settings['iPhone'] OR $gp_settings['iPad']) && ($yt1 OR $yt2)) {} else { ?>, file: "<?php echo get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true); ?>", file: "<?php echo get_post_meta($post->ID, 'ghostpool_ogg_slide_video', true); ?>"<?php } ?>}}
											<?php } else { ?>
												{type: "html5", config: {file: "<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>"<?php if(($gp_settings['iPhone'] OR $gp_settings['iPad']) && ($yt1 OR $yt2)) {} else { ?>, file: "<?php echo get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true); ?>", file: "<?php echo get_post_meta($post->ID, 'ghostpool_ogg_slide_video', true); ?>"<?php } ?>}},	
												{type: "flash", src: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/player.swf", config: {file: "<?php echo get_post_meta($post->ID, 'ghostpool_slide_video', true); ?>"}}
											<?php } ?>
											],
										plugins: {}
									});
									
									//]]>

									
									// Play JW Player	
														
									jQuery(document).ready(function(){
										jQuery("#<?php echo $name; ?>-play-video-<?php the_ID(); ?>").click(function() {
											jwplayer("<?php echo $name; ?>-player-<?php the_ID(); ?>").play();	
										});	
									});
									
									
									// Stop JW Player
									
									jQuery(document).ready(function(){
										jQuery("#<?php echo $name; ?>-wrapper .slide-prev, #<?php echo $name; ?>-wrapper .slide-next, #<?php echo $name; ?>-wrapper .slider-button").click(function() {
											if(jwplayer("<?php echo $name; ?>-player-<?php the_ID(); ?>").getState() === "PLAYING") {
												jwplayer("<?php echo $name; ?>-player-<?php the_ID(); ?>").stop();
											}
										});
									});
									
								</script>
								
							<?php } ?>
							
							<script>
							jQuery(document).ready(function(){
		
								// Hide Play Button
								jQuery("#<?php echo $name; ?>-play-video-<?php the_ID(); ?>").click(function() {
									jQuery('#<?php echo $name; ?>-play-video-<?php the_ID(); ?>').hide();
									jQuery('#<?php echo $name; ?>-slide-<?php the_ID(); ?> .caption').hide();
								});
								
							});	
							</script>

							</div>
							
							<!-- END VIDEO -->
	
	
						<?php } else { ?>
						
																					
							<?php if(get_post_meta($post->ID, 'ghostpool_slide_url', true) OR  get_post_meta($post->ID, 'ghostpool_slide_link_type', true) != "None") { ?>
								<a href="<?php if(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Video") { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_slide_url', true); } elseif(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Image") { if(get_post_meta($post->ID, 'ghostpool_slide_url', true)) { echo get_post_meta($post->ID, 'ghostpool_slide_url', true); } else { echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); }} else { if(get_post_meta($post->ID, 'ghostpool_slide_url', true)) { echo get_post_meta($post->ID, 'ghostpool_slide_url', true); } else { the_permalink(); }} ?>" title="<?php the_title(); ?>"<?php if(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) != "Page") { ?> rel="prettyPhoto"<?php } ?>>
							<?php } ?>
																																															
								<?php if(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Image") { ?><span class="hover-image" style="width: <?php echo $image[width]; ?>px; height: <?php echo $image[height]; ?>px;"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Video") { ?><span class="hover-video" style="width: <?php echo $image_width; ?>px; height: <?php echo $height; ?>px;"></span><?php } ?>							
								
								<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $height, true); ?>
																
								<img src="<?php echo $image['url']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { echo get_the_title(); } ?>" class="<?php if(get_post_meta($post->ID, 'ghostpool_slide_reflection', true)) { ?>reflection-m<?php } ?> <?php echo $caption_class; ?>" />
								
							<?php if(get_post_meta($post->ID, 'ghostpool_slide_url', true) OR  get_post_meta($post->ID, 'ghostpool_slide_link_type', true) != "None") { ?></a><?php } ?>
		
		
						<?php } ?>	
								
						<!-- END FIXED CONTENT -->
						
						
					<?php } ?>	
	
	
				</div>
	
				<!-- END SLIDE -->
			
			
				<?php
				
				$meta_timeout = get_post_meta($post->ID, 'ghostpool_slide_timeout', true);
				
				if($meta_timeout) {
					$timeout_array = $timeout_array . $meta_timeout .","; 
				} else {
					$timeout_array = $timeout_array . $timeout.",";
				} ?> 


			<?php endwhile; wp_reset_query(); ?>
		
		
			</div>
			
			<!-- END SLIDER -->


			<!-- BEGIN SLIDER NAV -->
			
			<?php if($nav != "0") { ?>
				
				<div class="slider-nav-wrapper<?php if($nav == "1") { ?> nav-type-1<?php } elseif($nav == "2") { ?> nav-type-2<?php } ?>">
				
					<span class="slider-nav">
						
					<?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
						
						<span class="slider-button"></span>
						
					<?php endwhile; wp_reset_query(); ?>
										
					</span>
					
				</div>
			
			<?php } ?>
			
			<!-- END SLIDER NAV -->
		
		
		</div>
		
		<!-- END SLIDER WRAPPER -->


	<?php endif; wp_reset_query(); ?>
		
		
	<script>
	jQuery(document).ready(function(){
		
		jQuery("#<?php echo $name; ?>").cycle({ 
			fx: "<?php echo $effect; ?>",
			<?php if($timeout == "0") { ?>timeout: <?php echo $timeout; ?><?php } else { ?>timeoutFn: slideTimeout<?php echo $name; ?><?php } ?>,
			speed: 1000,
			pause: 0,
			pauseOnPagerHover: 0,
			cleartype: true,
			cleartypeNoBg: true,	
			prev: "#<?php echo $name; ?>-wrapper .slide-prev", 
			next: "#<?php echo $name; ?>-wrapper .slide-next",
			pager: "#<?php echo $name; ?>-wrapper .slider-nav",
			pagerAnchorBuilder: function(idx, slide) {return "#<?php echo $name; ?>-wrapper .slider-nav span:eq(" + idx + ")";}  
		});						


		// Display Slider 
		
		jQuery('.slider-wrapper').show();


		// Show Play Button
		
		jQuery("#<?php echo $name; ?>-wrapper .slide-prev, #<?php echo $name; ?>-wrapper .slide-next, #<?php echo $name; ?>-wrapper .slider-button").click(function() {
			jQuery('#<?php echo $name; ?> .play-video').show();
			jQuery('#<?php echo $name; ?> .caption').show();
		});	
				
				
		// Pause Slider
		
		jQuery("#<?php echo $name; ?>-wrapper .slider-button, #<?php echo $name; ?> .play-video").click(function() { 
			jQuery("#<?php echo $name; ?>").cycle("pause"); 
		});
		
									
		// Resume Slider
		
		jQuery("#<?php echo $name; ?>-wrapper .slide-prev, #<?php echo $name; ?>-wrapper .slide-next").click(function() {
			jQuery('#<?php echo $name; ?>').cycle('resume');
		});
								
	});
	
		
	// Timeouts per slide (in seconds) 
	
	var posttimeouts<?php echo $name; ?> = [<?php echo $timeout_array; ?>]; 
	function slideTimeout<?php echo $name; ?>(currElement, nextElement, opts, isForward) { 
	var index = opts.currSlide; 
	return posttimeouts<?php echo $name; ?>[index] * 1000; 
	} 
	
	</script>
	
	
<?php

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	return $output_string;

}
add_shortcode('slider', 'gp_slider');

?>