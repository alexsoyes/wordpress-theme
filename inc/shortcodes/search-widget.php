<?php

function soyes_search_form()
{
    ob_start();
    get_template_part('searchform');
    return ob_get_clean();
}

add_shortcode('soyes_search_form', 'soyes_search_form');
