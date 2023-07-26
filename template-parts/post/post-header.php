<div class="entry-header">
    <div class="entry-content">
        <div class="entry-meta">
            <?php $category = soyes_get_the_main_category(); ?>
            <?php if ($category) : ?>
                <div class="entry-category">
                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>
                </div><!-- .entry-category -->
            <?php endif; ?>
            <div class="entry-date">
                <span>
                <?php soyes_the_post_modified_date(); ?>
                </span>
            </div><!-- .entry-date -->
        </div><!-- .entry-meta -->

        <div class="entry-reading-time">
            <?php if (!is_singular('conseil')) soyes_the_reading_time(); ?>
        </div><!-- .entry-reading-time -->

        <?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>

        <?php if (!is_singular('conseil')): ?>
            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div><!-- .entry-excerpt -->

            <?php get_template_part('template-parts/elements/author-box'); ?>

            <div>
                <a class="wp-block-button__link" href="#community">
                    <?php if (get_comments_number() > 0): ?>
                        <?php _e('Read the', 'soyes') ?>&nbsp;<?php soyes_the_comment_count(); ?>
                    <?php else: ?>
                        <?php _e('Leave a comment ?', 'soyes') ?>
                    <?php endif; ?>
                </a><!-- .wp-block-button__link-->
            </div>
        <?php endif; ?>
    </div><!-- .entry-content -->
</div><!-- .entry-header -->


<?php if (!is_singular('conseil')): ?>
    <div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
        <div class="post-header-overlay"></div>
    </div><!-- .post-header -->
<?php endif; ?>
