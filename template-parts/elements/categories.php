<?php
/**
 * Display the categories.
 */

$categories = get_the_category();
$category_id = false;

if (! empty( $categories ) ) {
	$category_id = $categories[0]->cat_ID;
}
?>

<ul class="entry-categories">
	<?php wp_list_categories( array(
		'orderby'    => 'name',
		'show_count' => true,
		'title_li'   => false,
        'current_category' => $category_id,
	) ); ?>
</ul><!-- .entry-categories -->