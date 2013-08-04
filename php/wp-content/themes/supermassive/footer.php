<?php require(gp_inc . 'options.php'); ?>


<?php if(!is_page_template('blank-page.php')) { ?>

		
		</div>
		
		<!-- END CONTENT WRAPPER -->
			
			
		<div class="clear"></div>
	
	
	</div>
	
	<!-- END PAGE WRAPPER -->	


	<div class="clear"></div>
	
	
	<!-- BEGIN FOOTER -->
	
	<?php if(is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4')) { ?>
	
		<div id="footer-top-outer">
		
			<div id="footer-top-inner">
				
				<?php
				if(is_active_sidebar('footer-1') && is_active_sidebar('footer-2') && is_active_sidebar('footer-3') && is_active_sidebar('footer-4')) { $footer_widgets = "footer-fourth"; }
				elseif(is_active_sidebar('footer-1') && is_active_sidebar('footer-2') && is_active_sidebar('footer-3')) { $footer_widgets = "footer-third"; }
				elseif(is_active_sidebar('footer-1') && is_active_sidebar('footer-2')) {
				$footer_widgets = "footer-half"; }	
				elseif(is_active_sidebar('footer-1')) { $footer_widgets = "footer-whole"; }
				?>
			
				<?php if(is_active_sidebar('footer-1')) { ?>
					<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
						<?php dynamic_sidebar('footer-1'); ?>
					</div>
				<?php } ?>
			
				<?php if(is_active_sidebar('footer-2')) { ?>
					<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
						<?php dynamic_sidebar('footer-2'); ?>
					</div>
				<?php } ?>
				
				<?php if(is_active_sidebar('footer-3')) { ?>
					<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
						<?php dynamic_sidebar('footer-3'); ?>
					</div>
				<?php } ?>
				
				<?php if(is_active_sidebar('footer-4')) { ?>
					<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
						<?php dynamic_sidebar('footer-4'); ?>
					</div>
				<?php } ?>
		
			</div>
			
		</div>
	
		<div class="clear"></div>
		
		<div id="footer-curve"></div>
	
	<div id="footer-bottom-outer">
	
	<?php } else { ?>
	
		<div id="footer-bottom-outer" class="footer-padding">
	
	<?php } ?>
		
		<div id="footer-bottom-inner">
		
			<?php wp_nav_menu('sort_column=menu_order&container=ul&theme_location=footer-nav&fallback_cb=null'); ?>
		
			<div class="right">
				
				<div id="copyright"><?php if($theme_footer_content) { echo stripslashes($theme_footer_content); } else { ?><?php _e('Copyright &copy;', 'gp_lang'); ?> <?php echo date('Y'); ?> <?php echo $themename; ?>. <?php _e('Центр гражданских инициатив "Звезда Ора".', 'gp_lang'); ?><?php } ?></div>
	
				<?php if($theme_social_icons != "Header") { require('social-icons.php'); } ?>
				
			</div>
			
		</div>
			
	</div>
	
	<!-- END FOOTER -->


<?php } ?>


<?php if($theme_chunkfive OR $theme_journal OR $theme_leaguegothic OR $theme_nevis OR $theme_quicksand OR $theme_sansation OR $theme_vegur) { ?>
	<script>Cufon.now();</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>