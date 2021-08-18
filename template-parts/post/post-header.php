<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="post-header-overlay">
        <div class="entry-content">
			<?php $category = soyes_get_the_main_category(); ?>
			<?php if ( $category ) : ?>
                <div class="entry-category">
                <span>
                <?php echo esc_html( $category->name ); ?>
                </span>
                </div><!-- .entry-category -->
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
            <div class="entry-excerpt">
				<?php the_excerpt(); ?>
            </div><!-- .entry-excerpt -->

            <div class="entry-meta">

                <div class="entry-date">
                    <span>
						<?php printf( __( 'Last commit on: <strong>%s</strong>', 'soyes' ), get_the_modified_date() ); ?>
                    </span>
                </div><!-- .entry-date -->

                <div class="link-comment">
                    <a href="#comments"><?php soyes_the_comment_count(); ?></a>
                </div><!-- .link-comment -->

            </div><!-- .entry-links -->

        </div><!-- .entry-content -->
    </div><!-- .post-header-overlay -->

    <div class="link-share-container">
        <div class="link-share">
            <div class="link-share-buttons">
				<?php get_template_part( 'template-parts/elements/share-icons' ); ?>
            </div>
        </div><!-- .link-share -->
    </div>
</div><!-- .post-header -->
