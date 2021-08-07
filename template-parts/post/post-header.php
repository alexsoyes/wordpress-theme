<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="post-header-overlay">
        <div class="entry-content">
			<?php $category = soyes_get_the_main_category(); ?>
			<?php if ( $category ): ?>
                <div class="entry-category">
                <span>
                <?php echo esc_html( $category->name ); ?>
                </span>
                </div>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
            <div class="entry-excerpt">
				<?php the_excerpt(); ?>
            </div>
            <div class="entry-links">
                <div class="link-share">
                    <p>Partager :</p>
					<?php get_template_part( 'template-parts/elements/share-icons' ); ?>
                </div>
                <div class="link-comment">
                    <a href="#comments">
	                    <?php $soyes_comment_count = get_comments_number(); ?>
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
	                    <?php printf(
		                    '<img src="%s" alt="%s" width="15" height="15" />',
		                    get_stylesheet_directory_uri() . "/assets/images/icons/chatbox-outline.svg",
		                    __( 'Comments' ),
	                    ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
