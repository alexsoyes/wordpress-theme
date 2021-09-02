<?php

/**
 * Display the categories.
 */

$main_category = soyes_get_the_main_category();
?>

<nav role="navigation">
    <ul class="entry-categories">
		<?php
		wp_list_categories(
			array(
				'orderby'          => 'name',
				'show_count'       => true,
				'title_li'         => false,
				'current_category' => $main_category ? $main_category->cat_ID : false,
			)
		);
		?>
    </ul><!-- .entry-categories -->
</nav>
