<?php

add_shortcode(
    'soyes_free_resources_ai',
    function ($atts = array()) {
        return soyes_load_template_part('template-parts/cta/free-resources-ai');
    }
);
