<?php if (get_option('paging_mode') == 'default') : ?>
    <div class="pagination">
        <?php previous_posts_link(__('Следующая страница')); ?>
        <?php next_posts_link(__('Предыдущая страница')); ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
    </div>
    <?php else : ?>
    <div id="pagination"><?php next_posts_link(__('БОЛЬШЕ СТАТЕЙ')); ?></div>
<?php endif; ?>