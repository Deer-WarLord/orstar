<?php get_header(); ?>
<?php $options = get_option('stimulus_theme_options'); ?>

<?php if($options['showPosts'] == false && is_home() ) {} else { ?>
<div id="content" class="blog-entries group <?php if( $options['numcols'] != null ) { echo $options['numcols']; } else { echo 'two-col'; } ?>">
	<h2 class="updates">
		<?php if(is_home()) { ?>Новое на сайте
		<?php /* If this is a category archive */ } elseif (is_category()) { ?>
		Рубрика: <?php single_cat_title(); ?>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		Метка: <?php single_tag_title(); ?>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Архив за <?php the_time('d M Y'); ?>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Архив за <?php the_time('F Y'); ?>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Архив за <?php the_time('Y'); ?>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Архив автора
		<?php /* If this is an author archive */ } elseif (is_search()) { ?>
		Результаты поиска &laquo;<?php the_search_query(); ?>&raquo;
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Архив сайта
		<?php } ?></h2>
	<div id="main-content">
	
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
		<div <?php post_class('group'); ?> id="post-<?php the_ID(); ?>">
			<?php if($options['showDates'] == true) { ?>
			<span class="date"><?php the_time('M'); ?><strong><?php the_time('d'); ?></strong></span>
			<?php } ?>
			<div class="post-content">	
				<div class="post-content-container">				
					<h3><a href="<?php the_permalink(); ?>"><?php if( get_the_title() ) { the_title(); } else { echo 'Постоянная ссылка'; } ?></a></h3>
					<div class="post-text group">
					<?php if($options['numcols'] == 'three-col') { the_post_thumbnail('post-thumb-threecol'); } else { the_post_thumbnail('post-thumb-onetwocol');  } ?>
					<?php the_content(); ?>
					</div><!-- .post-text -->	
				</div><!-- .post-content-container -->	
				<div class="post-meta group">
					<p class="author-cat">
						<strong class="author"><?php the_author_link(); ?></strong> Рубрика: <?php the_category(', '); ?>
					</p>
					<p class="comments">
						<a href="<?php comments_link(); ?>"><?php comments_number('Ваш отзыв', '1 отзыв', 'Отзывов (%)'); ?></a>
					</p>
					<p class="keep-reading">
						<a href="<?php the_permalink(); ?>" class="btn">Подробно &rarr;</a>
					</p>
				</div><!-- .post-meta -->
			</div><!-- .post-content -->
		</div><!-- .post -->	

		<?php endwhile; else : ?>
	
			<div class="post">
			
				<h2>Не найдено</h2>
				
				<p>К сожалению, по вашему запросу ничего не найдено. Вы можете поискать информацию в <a href="">рубриках</a>, <a href="">архивах</a>, или воспользоваться формой поиска.</p>
				
				<?php include(TEMPLATEPATH.'/searchform.php'); ?>
			
			</div> <!-- .post -->
	
		<?php endif; ?>
	
		
		<div id="blog-nav" class="group">
			<span class="prev btn"><?php previous_posts_link('&larr; &nbsp; Назад') ?></span> 
			<span class="next btn"><?php next_posts_link('Вперед &nbsp; &rarr;') ?></span>
		</div>
	
	</div><!-- #main-content -->

	<?php get_sidebar(); ?>

</div>
<?php } ?>

<?php get_footer(); ?>