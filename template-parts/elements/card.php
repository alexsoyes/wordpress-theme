<?php

/**
 * Linking to post.
 */

?>
<div class="card" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="card-content">
		<?php $category = soyes_get_the_main_category(); ?>
        <div class="card-metadata">
	        <?php if ($category) : ?>
                <div class="card-category">
                <span>
                <?php echo esc_html($category->name); ?>
                </span>
                </div>
	        <?php endif; ?>
            <div class="card-comments">
                <?php soyes_the_comment_count(false); ?>
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
