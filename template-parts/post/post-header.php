<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="post-header-overlay">
        <div class="entry-content">
		    <?php $category = soyes_get_the_main_category(); ?>
		    <?php if ( $category ): ?>
                <div class="entry-category">
                <span>
                <?php echo esc_html($category->name); ?>
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
                    0 commentaire
                </div>
            </div>
        </div>
    </div>
</div>
