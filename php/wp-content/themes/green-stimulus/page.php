<?php get_header(); ?>

<div id="content" class="group two-col">
	<div id="main-content" class="single-<?php the_ID(); ?>">
		
		<h1> <?php the_title(); ?> </h1>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
			<div class="single-content">	
						<?php the_content(); ?>
						<?php edit_post_link( __( '[Править]'), '<span class="edit-link">', '</span>' ); ?>
						
			</div><!-- .single-content -->
		
		<?php endwhile; else : ?>
	
			<div class="single-content">
			
				<h2>Страница не найдена</h2>
				
				<p>К сожалению, по вашему запросу ничего не найдено. Вы можете воспользоваться формой поиска ниже.</p>
				
				<?php include(TEMPLATEPATH.'/searchform.php'); ?>
				
			</div> <!-- .single -->
			
		<?php endif; ?>
		
		<!--<div id="comments-area">
			<?php // uncomment this to enable comments on pages comments_template( '', true ) ?>
		</div>-->
		
	</div><!-- #main-content -->
	<div id="sidebar">
		<div class="widget page-navigation">
			<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'stimulus_mainnav', 'depth' => '0' ) ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>