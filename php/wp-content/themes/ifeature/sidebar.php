<?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
       
		
		<div class="widget-container">    
		<h2 class="widget-title"><?php printf( __('Страницы', 'core' )); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>
		<?php include (TEMPLATEPATH . "/inc.php"); ?>
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __( 'Архивы', 'core' )); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
		<div class="widget-container">    
       <h2 class="widget-title"><?php printf( __('Рубрики', 'core' )); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __('Управление', 'core' )); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="widget-container">
    	<h2 class="widget-title"><?php printf( __('Подписка', 'core' )); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php printf( __('Публикации (RSS)', 'core' )); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php printf( __('Комментарии (RSS)', 'core' )); ?></a></li>
    	</ul>
    	</div>
	
<?php endif; ?>