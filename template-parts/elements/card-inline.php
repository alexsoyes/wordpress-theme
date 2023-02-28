<?php

/**
 * Linking to cpt conseil.
 */

?>

<div class="card">
    <div class="card-content">
        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2><!-- .card-title -->
        <div class="card-date">
            <?php soyes_the_post_modified_date(); ?>
        </div><!-- .card-date -->
        <div class="card-excerpt">
            <?php the_excerpt(); ?>
        </div><!-- .card-excerpt -->
    </div><!-- .card-content -->
</div><!-- .card -->
