<?php

/**
 * Linking to post.
 */

list ( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
$category = soyes_get_the_main_category()
?>

<div class="card">
    <div class="card-image">
		<?php if ( $thumbnail_url ): ?>
            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumbnail_width; ?>"
                 height="<?php echo $thumbnail_height; ?>">
		<?php endif; ?>
    </div><!-- .card-image -->

	<?php if ( $category ) : ?>
        <div class="card-category">
            <span>
            <?php echo esc_html( $category->name ); ?>
            </span>
        </div><!-- .card-category -->
	<?php endif; ?>

    <div class="card-content">

        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2><!-- .card-title -->

	    <?php if ( has_excerpt() ): ?>
            <p class="card-excerpt">
			    <?php the_excerpt(); ?>
            </p><!-- .card-excerpt -->
	    <?php endif; ?>

        <div class="card-metadata">
            <div class="card-date">
                <small>
				    <?php printf(
				    /* translators: %s is replaced with the lastly updated date from current post. */
					    __( 'Last commit: <strong>%s</strong>', 'soyes' ), get_the_modified_date() ); ?>
                </small>
            </div><!-- .card-date -->

            <div class="card-comments">
			    <?php soyes_the_comment_count( false ); ?>
            </div><!-- .card-comments -->
        </div><!-- .card-metada -->

    </div><!-- .card-content -->
</div><!-- .card -->
