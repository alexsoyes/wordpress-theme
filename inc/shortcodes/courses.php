<?php

add_shortcode(
    'soyes_course_freelance',
    function ($atts = array()) {
        printf(
            '<aside class="call-to-action course-cta">%s</aside>',
            soyes_load_template_part('template-parts/cta/course-freelance')
        );
    }
);

add_shortcode(
    'soyes_course_copilot',
    function ($atts = array()) {
        printf(
            '<aside class="call-to-action course-cta">%s</aside>',
            soyes_load_template_part('template-parts/cta/course-copilot')
        );
    }
);
