<?php

class SoYes_Walker_Nav_Menu_JS_Links extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '
<li' . $id . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';

        $item_output = $args->before;

        // Check if we are on the homepage
        if (is_front_page()) {
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            $item_output .= '<a' . $attributes . '>';
        } else {
            $attributes .= !empty($item->url) ? ' data-qcd="' . base64_encode($item->url) . '"' : '';
            $item_output .= '<span class="qcd"' . $attributes . '>';
        }

        $item_output .= apply_filters('the_title', $item->title, $item->ID);

        // Close the tag accordingly
        if (is_front_page()) {
            $item_output .= '</a>';
        } else {
            $item_output .= '</span>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}