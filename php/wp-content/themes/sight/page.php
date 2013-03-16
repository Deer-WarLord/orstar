<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="entry">
            <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
                <div class="post-meta">
                    <h1><?php the_title(); ?></h1>
                    Автор <span class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="Публикации автора: <?php the_author(); ?>"><?php the_author(); ?></a></span>, <span
                        class="post-date"><?php the_time(__('d M Y')) ?></span> &bull; <span><?php the_time() ?></span> <?php edit_post_link( __( 'Править'), '&bull; '); ?>
                    <?php if ( comments_open() ) : ?>
                        <a href="#comments" class="post-comms"><?php comments_number(__('Ваш отзыв'), __('1 отзыв'), __('Отзывов (%)'), '', __('Комментарии закрыты') ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="post-content"><?php the_content(); ?></div>
                <div class="post-footer"><?php the_tags(__('<strong>Метки: </strong>'), ', '); ?></div>
            </div>
        </div>

        <?php endwhile; ?>
    <?php endif; ?>

<?php comments_template(); ?>

<?php get_footer(); ?>