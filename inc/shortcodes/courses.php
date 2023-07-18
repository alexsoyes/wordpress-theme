<?php

add_shortcode(
    'soyes_course_freelance',
    function ($atts = array()) {
        return sprintf(
            '<aside class="call-to-action course-cta">%s</aside>',
            soyes_load_template_part('template-parts/cta/course-freelance')
        );
    }
);

add_shortcode(
    'soyes_course_copilot',
    function ($atts = array()) {
        return sprintf(
            '<aside class="call-to-action course-cta">%s</aside>',
            soyes_load_template_part('template-parts/cta/course-copilot')
        );
    }
);


add_shortcode(
    'soyes_free_lesson_freelance',
    function ($atts = array()) {
        return soyes_load_template_part('template-parts/cta/free-lesson-freelance');
    }
);

add_shortcode(
    'soyes_free_lesson_ai',
    function ($atts = array()) {
        return soyes_load_template_part('template-parts/cta/free-lesson-ai');
    }
);
