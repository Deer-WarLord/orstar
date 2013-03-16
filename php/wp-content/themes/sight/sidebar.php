<div class="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) :
        $widget_args = array(
            'after_widget' => '</div></div>',
            'before_title' => '<h3>',
            'after_title' => '</h3><div class="widget-body clear">'
        );
    ?>

    <?php the_widget( 'GetConnected', 'title=Будьте на связи', $widget_args); ?>

    <?php the_widget( 'Recentposts_thumbnail', 'title=Новое на сайте', $widget_args); ?>

    <div class="widget sponsors">
        <h3>Наши спонсоры</h3>
        <div class="widget-body">
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/example/sponsor01.jpg" width="200" height="125" alt=""/></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/example/sponsor02.jpg" width="200" height="125" alt=""/></a>
            <a href="#"><img src="<?php bloginfo('template_url'); ?>/example/sponsor03.jpg" width="200" height="125" alt=""/></a>
        </div>
    </div>
            
    <?php endif; ?>
</div>