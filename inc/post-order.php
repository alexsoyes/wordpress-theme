<?php

/**
 * @param WP_Query $query
 */
function soyes_posts_ordering(WP_Query $query): void
{
    if (is_post_type_archive('conseil')) {
        $query->set('orderby', 'post_title');
        $query->set('order', 'DESC');
    } elseif (is_archive() || is_home()) {
        $query->set('orderby', 'post_title');
        $query->set('order', 'ASC');
    }
}

add_filter('pre_get_posts', 'soyes_posts_ordering');
