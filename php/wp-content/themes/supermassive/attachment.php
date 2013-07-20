<?php get_header(); global $gp_settings; ?>


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
	
	<h1 class="page-title"><?php the_title(); ?></h1>
	
	<!-- END TITLE -->		
		
	
	<!-- BEGIN IMAGE -->
		
	<?php the_attachment_link($post->post_ID, true) ?>
	
	<!-- END IMAGE -->
	
	
	<!-- BEGIN POST CONTENT -->
	
	<div id="post-content">
	
		<?php the_content(__('Read More &raquo;', 'gp_lang')); ?>
	
	</div>
	
	<!-- END POST CONTENT -->
	

</div>

<!-- END CONTENT -->


<?php get_footer(); ?>