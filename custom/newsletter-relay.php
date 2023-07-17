<?php
// Path: wordpress/wp-content/themes/soyes/custom/newsletter-relay.php

define('WP_USE_THEMES', false); // Don't load theme support functionality
require('../../../../wp-load.php');

function post_form(array $params_form): array|WP_Error
{
    $endpoint = sprintf(
        "https://learn.alexsoyes.com/public/%s/show?hostname=%s?source=%s",
        $params_form['remote_url_id'],
        'learn.alexsoyes.com',
        $params_form['remote_source']
    );

    $email = $_POST['email'];
    $is_desktop = $_POST['is_desktop'];
    $timezone = $_POST['timezone'];

    $data = [
        "optin" => [
            "fields" => ["email" => $email],
            "timeZone" => $timezone,
            "isDesktop" => $is_desktop,
            "popupId" => $params_form['popup_id'],
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

    return wp_remote_post($endpoint, $options);
}

function get_endpoint_params(
    string $form_type = 'newsletter-lead-magnet' | 'newsletter-lead-magnet',
): array|Error
{
    switch ($form_type) {
        case 'newsletter-homepage':
            $entity_id = '4354526b-8920-4f87-bcbe-bb5e459cc262';
            $remote_url_id = '75519704189a08e194836cbb389b0de6dc60bed';
            break;
        case 'newsletter-lead-magnet':
            $entity_id = 'a769bf99-cd52-48e6-8c7a-c91599dbe9d7';
            $remote_url_id = '7544150775c5a7686eb38d3b08f48e08e000ad4';
            break;
        default:
            throw new Error('Form name not found');
    }

    return [
        'remote_source' => esc_url($_SERVER['REQUEST_URI']),
        'entity_id' => $entity_id,
        'remote_url_id' => $remote_url_id,
    ];
}

try {
    $param_type = $_POST['type'];
    $params_form = get_endpoint_params($param_type);

    $response = post_form($params_form);

    if (is_wp_error($response)) {
        throw new Error('Error while posting form to System.io');
    }

    $redirect_url = 'https://alexsoyes.com/inscription-confirmee/';
    $params_analytics = soyes_get_analytics_params();

    if (!empty($params_analytics)) {
        $redirect_url = add_query_arg($params_analytics, 'https://alexsoyes.com/inscription-confirmee');
    }

    wp_redirect($redirect_url);

} catch (Exception $e) {
    wp_redirect(sprintf("https://learn.alexsoyes.com/newsletter-la-console?email=%s", $params_form['email']));
}

