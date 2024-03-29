<?php

/**
 * Linking to post.
 */

list ($thumbnail_url) = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
?>

<div class="card wp-block-columns">
    <div class="card-image no-img wp-block-column" style="background-image: url('<?php echo $thumbnail_url; ?>')"></div>
    <!-- .card-image -->

    <div class="card-content wp-block-column">
        <h2 class="card-title" id="<?php echo urlencode(sanitize_title_with_dashes(remove_accents((the_title())))); ?>">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2><!-- .card-title -->

        <?php if (has_excerpt()): ?>
            <div class="card-excerpt">
                <?php the_excerpt(); ?>
            </div><!-- .card-excerpt -->
        <?php endif; ?>

        <div class="card-metadata">
            <div class="card-date">
                <?php soyes_the_post_modified_date(); ?>
            </div><!-- .card-date -->
        </div><!-- .card-metadata -->
    </div><!-- .card-content -->
</div><!-- .card -->
