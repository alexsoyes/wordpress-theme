<?php
// Path: wordpress/wp-content/themes/soyes/custom/newsletter-relay.php

define('WP_USE_THEMES', false); // Don't load theme support functionality
require('../../../../wp-load.php');

function post_form(?string $popup_id, string $entity_id, string $endpoint): array
{
    $email = $_POST['email'];
    $is_desktop = $_POST['is_desktop'];
    $timezone = $_POST['timezone'];
    $fields = ["email" => $email];
    if (array_key_exists('first_name', $_POST)) {
        $fields['first_name'] = $_POST['first_name'];
    }

    $data = [
        "optin" => [
            "entityId" => $entity_id,
            "fields" => $fields,
            "isDesktop" => $is_desktop,
            "popupId" => $popup_id,
            "timeZone" => $timezone,
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

/**
 * @param string $form_type newsletter-homepage|newsletter-lead-magnet|free-lesson-freelance|free-lesson-ai
 * @return array
 */
function get_endpoint_params(
    string $form_type): array
{
    switch ($form_type) {
        case 'free-resources-ai':
            $entity_id = 'cc4e001a-bcbb-4b7e-beb7-f087f21e87fb';
            $popup_id = null; // '17281358a431d04543c7d19ea97be4004e6ac2bd';
            $endpoint = 'https://learn.alexsoyes.com/public/17281358a431d04543c7d19ea97be4004e6ac2bd/show';
            break;
        case 'free-lesson-freelance':
            $entity_id = 'f085b46a-726c-4016-9683-619c00a9f644';
            $popup_id = 'a90192fa-68c7-45b6-8cd3-70c3215251c7';
            $endpoint = 'https://learn.alexsoyes.com/cours-devenir-freelance-6f2f4b3a';
            break;
        case 'free-lesson-ai':
            $entity_id = 'cf2a3491-bdb5-4506-8e02-24828cfa6541';
            $popup_id = null;
            $endpoint = 'https://learn.alexsoyes.com/coder-avec-intelligence-artificielle';
            break;
        case 'newsletter_homepage':
        case 'newsletter_conseil':
        case 'newsletter_footer':
        case 'newsletter_in_content':
        case 'newsletter_page':
            $entity_id = '4354526b-8920-4f87-bcbe-bb5e459cc262';
            $popup_id = '75519704189a08e194836cbb389b0de6dc60bed';
            $endpoint = "https://learn.alexsoyes.com/public/$popup_id/show";
            break;
        case 'newsletter_lead_magnet':
            $entity_id = 'a769bf99-cd52-48e6-8c7a-c91599dbe9d7';
            $popup_id = '7544150775c5a7686eb38d3b08f48e08e000ad4';
            $endpoint = "https://learn.alexsoyes.com/public/$popup_id/show";
            break;
        default:
            throw new Error('Form name not found');
    }

    return [
        'entity_id' => $entity_id,
        'popup_id' => $popup_id,
        'endpoint' => $endpoint . "?hostname=alexsoyes.com&source=" . "https://alexsoyes.com" . $_POST['remote_source'],
    ];
}

function verify_captcha($token): string
{
    if (!defined('RECAPTCHA_SECRET')) {
        return 'no-secret';
    }

    $recaptchaSecret = RECAPTCHA_SECRET;

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$token");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        return $responseKeys["error-codes"][0];
    }

    return true;
}

$redirect_url = $_POST['remote_source'] . '?message=no-recaptcha';

try {
    $recaptcha_response =
        array_key_exists('g-recaptcha-response', $_POST) ?
            sanitize_text_field($_POST['g-recaptcha-response']) :
            false;

    if ($recaptcha_response) {
        $is_recaptcha_valid = verify_captcha($recaptcha_response);

        if ($is_recaptcha_valid != true) {
            $redirect_url = $_POST['remote_source'] . '?message=error-recaptcha-' . $is_recaptcha_valid;
        } else {
            $param_type = $_POST['type'];
            $params_form = get_endpoint_params($param_type);

            $response = post_form(
                $params_form['popup_id'],
                $params_form['entity_id'],
                $params_form['endpoint'],
            );

            if (is_wp_error($response)) {
                $redirect_url = $_POST['remote_source'] . '?message=error-sio';
            } else {
                $redirect_url = 'https://alexsoyes.com/inscription-confirmee/';
                $params_analytics = soyes_get_analytics_params();

                if (!empty($params_analytics)) {
                    $redirect_url = add_query_arg($params_analytics, 'https://alexsoyes.com/inscription-confirmee');
                }
            }
        }
    }

    wp_redirect($redirect_url, 301);

} catch (Exception $e) {
    wp_redirect(sprintf("https://learn.alexsoyes.com/newsletter-la-console?email=%s", $params_form['email']));
}

