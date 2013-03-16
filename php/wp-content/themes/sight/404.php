<?php get_header(); ?>


<div class="content-title">
    404! Не найдено!
</div>

<div class="entry">
    <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
        <div class="post-content">
            <p>К сожалению, по вашему запросу ничего не найдено. Возможно страница была перемещена/удалена или вы ошиблись при вводе адреса.</p>
        </div>
    </div>
</div>



<?php get_footer(); ?>