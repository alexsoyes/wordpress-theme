<?php

/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$soyes_comment_count = get_comments_number();
?>

<div id="comments"
     class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		?>
        <h2 class="comments-title">
			<?php if ( '1' === $soyes_comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'soyes' ); ?>
			<?php else : ?>
				<?php
				printf(
				/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $soyes_comment_count, 'Comments title', 'soyes' ) ),
					esc_html( number_format_i18n( $soyes_comment_count ) )
				);
				?>
			<?php endif; ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 50,
					'short_ping'  => true,
					'walker'      => new Soyes_Walker_Comment()
				)
			);
			?>
        </ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'soyes' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					"<",
					esc_html__( 'Older comments', 'soyes' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'soyes' ),
					">"
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'soyes' ); ?></p>
	<?php endif; ?>
	<?php endif; ?>

    <div class="entry-comment-leave">
		<?php
		comment_form(
			array(
				'logged_in_as'         => null,
				'comment_notes_before' => '<p class="comment-form-note">' . esc_html__( 'Thank you for sharing your story with us!', 'soyes' ) . "</p>",
				'title_reply'          => esc_html__( 'Leave a comment', 'soyes' ),
				'title_reply'          => __( '👩‍💻 Leave a Reply 👨‍💻', 'soyes' ),
				'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'    => '</h2>',
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="wp-block-button__link %3$s" value="%4$s" />',
			)
		);
		?>
    </div><!-- . entry-comment-leave -->

</div><!-- #comments -->
