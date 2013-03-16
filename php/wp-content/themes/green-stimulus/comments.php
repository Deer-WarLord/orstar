
			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( '������� ������ ��� ��������� ������������.', '' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( '���� ����� �� %2$s', '%1$s ������� �� %2$s', get_comments_number(), '' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div id="blog-nav" class="group">
			<span class="prev btn"><?php previous_comments_link('&larr; &nbsp; �����') ?></span> 
			<span class="next btn"><?php next_comments_link('������ &nbsp; &rarr;') ?></span>
		</div>
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					wp_list_comments('avatar_size=60');
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div id="blog-nav" class="group">
			<span class="prev btn"><?php previous_comments_link('&larr; &nbsp; �����') ?></span> 
			<span class="next btn"><?php next_comments_link('������ &nbsp; &rarr;') ?></span>
		</div>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
