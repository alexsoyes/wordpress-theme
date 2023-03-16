<?php

function register_conseil_post_type()
{
    // set up labels
    $labels = array(
        'name' => 'Conseils',
        'description' => 'Alex',
        'singular_name' => 'Conseil',
        'add_new' => 'Ajouter un conseil',
        'add_new_item' => 'Ajouter un nouveau conseil',
        'edit_item' => "Modifier le conseil",
        'new_item' => 'Nouveau conseil',
        'all_items' => 'Tous les conseils',
        'view_item' => "Voir le conseil",
        'search_items' => 'Rechercher des conseils',
        'not_found' => 'Aucun conseil trouvé',
        'not_found_in_trash' => 'Aucun conseil trouvé dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Conseils'
    );
    // register post type
    register_post_type('conseil', array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'conseil'),
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes', 'comments'),
    ));
}


add_action('init', 'register_conseil_post_type', 0);

