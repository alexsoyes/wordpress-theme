<?php

/**
 * Linking to post.
 */

list ( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
?>

<div class="card">
    <div class="card-image">
        <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumbnail_width; ?>"
             height="<?php echo $thumbnail_height; ?>">
    </div>
    <div class="card-content">
		<?php $category = soyes_get_the_main_category(); ?>
        <div class="card-metadata">
			<?php if ( $category ) : ?>
                <div class="card-category">
                <span>
                <?php echo esc_html( $category->name ); ?>
                </span>
                </div>
			<?php endif; ?>
            <div class="card-comments">
				<?php soyes_the_comment_count( false ); ?>
            </div>
        </div>
        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="card-excerpt"><?php the_excerpt(); ?></p>

        <div class="card-date">
            <small>
				<?php printf( __( 'Last publication on: <strong>%s</strong>', 'soyes' ), get_the_modified_date() ); ?>
            </small>
        </div>
    </div>
</div>
