<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="entry-content">
		<?php $category = soyes_get_the_main_category(); ?>
		<?php if ( $category ): ?>
            <div class="entry-category">
                <span>
                <?php echo $category; ?>
                </span>
            </div>
		<?php endif; ?>
		<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
        <div class="entry-excerpt">
			<?php the_excerpt(); ?>
        </div>
    </div>
</div>
