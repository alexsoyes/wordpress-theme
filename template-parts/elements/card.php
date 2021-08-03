<?php
/**
 * Linking to post.
 */
?>
<div class="card" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="card-content">
		<?php $category = soyes_get_the_main_category(); ?>
		<?php if ( $category ): ?>
            <div class="card-category">
                <span>
                <?php echo esc_html( $category->name ); ?>
                </span>
            </div>
		<?php endif; ?>
        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="card-excerpt"><?php the_excerpt(); ?></p>
    </div>
</div>
