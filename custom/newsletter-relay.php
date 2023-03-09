<?php
// Path: wordpress/wp-content/themes/soyes/custom/newsletter-relay.php

define('WP_USE_THEMES', false); // Don't load theme support functionality
require('../../../../wp-load.php');

try {
    // form params
    $param_email = $_POST['email'];
    $param_is_desktop = $_POST['is_desktop'];
    $param_timezone = $_POST['timezone'];
    $param_entity_id = $_POST['entity_id'];

    // url params
    $param_remote_source = $_POST['remote_source'];
    $param_remote_url_id = $_POST['remote_url_id'];

    $endpoint = sprintf(
        "https://learn.alexsoyes.com/public/%s/show?hostname=%s?source=%s",
        $param_remote_url_id,
        'learn.alexsoyes.com',
        $param_remote_source,
    );
    $data = [
        "optin" => [
            "fields" => ["email" => $param_email],
            "timeZone" => $param_timezone,
            "isDesktop" => $param_is_desktop,
            "popupId" => null,
        ]
    ];

    $options = [
        'body' => wp_json_encode($data),
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'timeout' => 5,
        'redirection' => 5,
        'blocking' => true,
        'data_format' => 'body',
    ];
    $response = wp_remote_post($endpoint, $options);

    if (!is_wp_error($response)) {
        wp_redirect('https://alexsoyes.com/inscription-confirmee/');
    } else {
        wp_redirect("https://learn.alexsoyes.com/newsletter-la-console?email=$param_email");
    }
} catch (Exception $e) {
    wp_redirect("https://learn.alexsoyes.com/newsletter-la-console?email=$param_email");
}

