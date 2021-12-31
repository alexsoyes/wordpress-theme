<div class="entry-header">
    <div class="entry-content">
        <div class="entry-meta">
            <?php $category = soyes_get_the_main_category(); ?>
            <?php if ($category) : ?>
                <div class="entry-category">
            <span>
            <?php echo esc_html($category->name); ?>
            </span>
                </div><!-- .entry-category -->
            <?php endif; ?>
            <div class="entry-date">
                <span>
                <?php soyes_the_post_modified_date(); ?>
                </span>
            </div><!-- .entry-date -->
        </div><!-- .entry-meta -->

        <?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div><!-- .entry-excerpt -->

        <?php get_template_part('template-parts/elements/author-box'); ?>
    </div><!-- .entry-content -->
</div><!-- .entry-header -->

<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="post-header-overlay"></div>
</div><!-- .post-header -->