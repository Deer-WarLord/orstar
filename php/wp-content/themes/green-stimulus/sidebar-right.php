<?php $options = get_option('stimulus_theme_options'); ?>
<?php if( $options['numcols'] != 'one-col') { ?>
    <div class="sidebar-right">
        <div class="sidebar widget-area group" id="sidebar-1">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1')) : ?>
            <?php endif; ?>
        </div><!-- #sidebar-1 -->
    </div>
<?php } ?>
