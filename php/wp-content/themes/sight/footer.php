            </div>
            <!-- /Content -->

            <?php get_sidebar(); ?>

            </div>
            <!-- /Container -->

            <div class="footer">
                <p class="copyright">&copy; 2011 <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>. Все права защищены.<br /><?php if ( (is_home())&&!(is_paged()) ){ ?><span>Перевод: <a href="http://designlove.ru/" title="Русские темы WordPress">DesignLove.ru</a></span><?php } ?></p>
                <?php if ( (is_home())&&!(is_paged()) ){ ?><p class="credits">Дизайн: <a href="http://wpshower.com">WPSHOWER</a></p><?php } ?>
            </div>
        </div>
        <!-- Page generated: <?php timer_stop(1); ?> секунд, <?php echo get_num_queries(); ?> запросов -->
        <?php wp_footer(); ?>

        <?php echo (get_option('ga')) ? get_option('ga') : '' ?>

	</body>
</html>