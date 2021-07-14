<div class="post-header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="container">
		<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
        <div class="entry-excerpt">
			<?php the_excerpt(); ?>
        </div>
    </div>
</div>
