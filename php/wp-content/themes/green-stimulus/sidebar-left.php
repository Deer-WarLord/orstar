<?php $options = get_option('stimulus_theme_options'); ?>
<?php if( $options['numcols'] != 'one-col') { ?>
    <div class="sidebar-left">
        <div class="sidebar widget-area group" id="sidebar-2">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2')) : ?>
            <?php endif; ?>
        </div> <!-- #sidebar-2 -->
    </div>
<?php } ?>
