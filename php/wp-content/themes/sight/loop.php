<?php if ( have_posts() ) : ?>

    <div id="loop" class="<?php if ($_COOKIE['mode'] == 'grid') echo 'grid'; else echo 'list'; ?> clear">

    <?php while ( have_posts() ) : the_post(); ?>

        <div <?php post_class('post clear'); ?> id="post_<?php the_ID(); ?>">
            <?php if ( has_post_thumbnail() ) :?>
            <a href="<?php the_permalink() ?>" class="thumb"><?php the_post_thumbnail('thumbnail', array(
                        'alt'	=> trim(strip_tags( $post->post_title )),
                        'title'	=> trim(strip_tags( $post->post_title )),
                    )); ?></a>
            <?php endif; ?>

            <div class="post-category"><?php the_category(' / '); ?></div>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

            <div class="post-meta">Автор: <span class="post-author"><a
                    href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="Публикации автора: <?php the_author(); ?>"><?php the_author(); ?></a></span>, <span
                        class="post-date"><?php the_time(__('d M Y')) ?></span> <em>&bull; </em><?php comments_popup_link(__('Ваш отзыв'), __('1 отзыв'), __('Отзывов (%)'), '', __('Обсуждение закрыто')); ?> <?php edit_post_link( __( 'Править'), '<em>&bull; </em>'); ?>
            </div>
            <div class="post-content"><?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 55); ?></div>
        </div>

    <?php endwhile; ?>

    </div>

<?php endif; ?>
