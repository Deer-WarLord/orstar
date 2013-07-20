<?php

//////////////////////////////////////// Portfolio ////////////////////////////////////////

function gp_portfolio($atts, $content = null) {
	extract(shortcode_atts(array(
		'name' => '',
		'type' => 'three-col',
		'cats' => '',
		'col_height' => '',
		'image_width' => '',
		'image_height' => '',
		'per_page' => '9',
		'orderby' => 'date',
		'order' => 'desc',
		'excerpt_length' => '50',
		'title' => 'true',
		'link' => 'both',
		'read_more' => 'true',	
		'pagination' => 'true',
		'preload' => 'false',
		'shadow' => 'none',
		'reflection' => 'none',	
	),$atts));

	global $wp_query, $paged, $post; 
	require(gp_inc . 'options.php');
	
	// Portfolio Type
	if(esc_attr($type) == 'three-col') { 
		$type_class = 'portfolio-three-col';
	} elseif(esc_attr($type) == 'two-col') { 
		$type_class = 'portfolio-two-col';
	} elseif(esc_attr($type) == 'large') { 
		$type_class = 'portfolio-large';
	} elseif(esc_attr($type) == 'grid') { 
		$type_class = 'portfolio-grid';
	}

	// Columns
	$style_classes_1 = array('first','middle','last');
	$style_classes_2 = array('first','last');
	$style_classes_grid = array('first','middle','last');
	$style_index = 0;
	$col_counter = 0;
	
	// Order By
	if(esc_attr($orderby) == 'random') { 
		$orderby = "rand";
	} elseif(esc_attr($orderby) == 'title') { 
		$orderby = "title";
	} else {
		$orderby = "date";
	}
	
	// Order
	if(esc_attr($order) == 'asc') { 
		$order = "asc";
	} else {
		$order = "desc";
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
	$args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => $cats,
	'paged' => $paged,
	'caller_get_posts'=> 1,
	'orderby' => $orderby,
	'order' => $order,
	'posts_per_page' => $per_page
	);
	
	$featured_query = new wp_query($args); 
	
	ob_start(); ?>
	
	<!--Begin Portfolio Container-->
	<div class="portfolio <?php echo $name; ?> <?php echo $type_class; ?><?php if($reflection != "none") { ?> no-padding<?php } ?>">
		
		<?php while ($featured_query->have_posts()) : $featured_query->the_post(); $col_counter = $col_counter + 1;

		// Image Sizes
		if($type == "three-col" OR $type == "two-col") {
			if($image_width) {} else { $image_width = "300"; }
			if($image_height) {} else { $image_height = "180"; }
		} elseif($type == "large") {
			if($image_width) {} else { $image_width = "460"; }
			if($image_height) {} else { $image_height = "300"; }
		} elseif($type == "grid") {
			if($image_width) {} else { $image_width = "270"; }
			if($image_height) {} else { $image_height = "180"; }
		}

		?>
		

		<?php if($type == 'three-col') { ?>

			<div class="portfolio-item  columns three blank <?php $k = $style_index%3; echo "$style_classes_1[$k]"; $style_index++; ?><?php echo $preload; ?>" style="height: <?php echo $col_height; ?>px;">
		
				<?php require('portfolio-loop.php'); ?>
			
			</div>
				
			<?php if($col_counter %3 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>
			
		<?php } ?>
		
		
		<?php if($type == 'two-col') { ?>

			<div class="portfolio-item columns two blank <?php $k = $style_index%2; echo "$style_classes_2[$k]"; $style_index++; ?><?php echo $preload; ?>" style="height: <?php echo $col_height; ?>px;">
		
				<?php require('portfolio-loop.php'); ?>
			
			</div>
				
			<?php if($col_counter %2 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>

		<?php } ?>

		
		<?php if($type == 'large') { ?>
				
			<div class="portfolio-item<?php echo $preload; ?>" style="height: <?php echo $col_height; ?>px;">
		
				<?php require('portfolio-loop.php'); ?>
			
			</div>
			
			<div class="sc-divider curved"></div>
			
		<?php } ?>

		
		<?php if($type == 'grid') { ?>

			<div class="portfolio-item columns three joint <?php if($col_counter > 3) { ?>level-class<?php } ?>  <?php $k = $style_index%3; echo "$style_classes_grid[$k]"; $style_index++; ?><?php echo $preload; ?>">

				<?php if($type == 'grid') { ?><div style="height: <?php echo $col_height; ?>px;"><?php } ?>
						
					<?php require('portfolio-loop.php'); ?>
				
				<?php if($type == 'grid') { ?></div><?php } ?>
				
			</div>
				
			<?php if($col_counter %3 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>
			
		<?php } ?>
		
		
	<?php endwhile; ?>
	
	</div>
	<!--End Portfolio Container-->
	
	<div class="clear"></div>
	
<?php

	wp_reset_query();
	
	if($pagination == "true") { gp_pagination($featured_query->max_num_pages); }
	
	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	return $output_string;

}
add_shortcode("portfolio", "gp_portfolio");

?>