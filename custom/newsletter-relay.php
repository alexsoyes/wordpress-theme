<?php
// Path: wordpress/wp-content/themes/soyes/custom/newsletter-relay.php

define('WP_USE_THEMES', false); // Don't load theme support functionality
require('../../../../wp-load.php');

try {
    // utm tracking
    $param_utm_source = array_key_exists('utm_source', $_POST) ? $_POST['utm_source'] : false;
    $param_utm_medium = array_key_exists('utm_medium', $_POST) ? $_POST['utm_medium'] : false;
    $param_utm_content = array_key_exists('utm_content', $_POST) ? $_POST['utm_content'] : false;
    $param_utm_campaign = array_key_exists('utm_campaign', $_POST) ? $_POST['utm_campaign'] : false;

    // form params
    $param_email = $_POST['email'];
    $param_is_desktop = $_POST['is_desktop'];
    $param_timezone = $_POST['timezone'];
    $param_entity_id = $_POST['entity_id'];
    $param_popup_id = null;

    // endpoint is given since this is a popup
    if (array_key_exists('remote_url', $_POST)) {
        $endpoint = $_POST['remote_url'];
        $param_popup_id = $_POST['popup_id'];
    } else {
        // build endpoint with url params (from basic forms)
        $param_remote_source = $_POST['remote_source'];
        $param_remote_url_id = $_POST['remote_url_id'];

        $endpoint = sprintf(
            "https://learn.alexsoyes.com/public/%s/show?hostname=%s?source=%s",
            $param_remote_url_id,
            'learn.alexsoyes.com',
            $param_remote_source,
        );
    }

    $data = [
        "optin" => [
            "fields" => ["email" => $param_email],
            "timeZone" => $param_timezone,
            "isDesktop" => $param_is_desktop,
            "popupId" => $param_popup_id,
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

        if (strlen("$param_utm_source$param_utm_medium$param_utm_content$param_utm_campaign") > 1) {

            $utm_params = [
                'utm_source' => $param_utm_source,
                'utm_medium' => $param_utm_medium,
                'utm_content' => $param_utm_content,
                'utm_campaign' => $param_utm_campaign,
            ];
            $redirect_url = add_query_arg($utm_params, 'https://alexsoyes.com/inscription-confirmee');

            wp_redirect($redirect_url);

        } else {
            wp_redirect('https://alexsoyes.com/inscription-confirmee/');
        }
    } else {
        wp_redirect("https://learn.alexsoyes.com/newsletter-la-console?email=$param_email");
    }
} catch (Exception $e) {
    wp_redirect("https://learn.alexsoyes.com/newsletter-la-console?email=$param_email");
}

