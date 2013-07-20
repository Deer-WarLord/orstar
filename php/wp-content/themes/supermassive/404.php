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
	
	<h1 class="page-title"><?php _e('Page Not Found', 'gp_lang'); ?></h1>

	<!-- END TITLE -->
	
	
	<h4><?php _e('SM theme shared on W P L O C K E R .C O M - Oops, it looks like this page does not exist. If you are lost try using the search box.', 'gp_lang'); ?></h4>

	<div class="sc-divider curved"></div>

	<h3><?php _e('Search The Site', 'gp_lang'); ?></h3>
	<?php get_search_form(); ?>


</div>

<!-- END CONTENT -->


<?php get_sidebar(); ?>


<?php get_footer(); ?>