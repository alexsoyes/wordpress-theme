<?php
/**
 *
 */

function soyes_get_the_main_category(): ?WP_Term {
	$categories = get_the_category();

	if ( ! empty( $categories ) ) {
		return $categories[0];
	}

	return null;
}

function soyes_get_social_share(): array {

	$post_link = get_the_permalink();

	$svgTwitter  = '<svg fill="#000" width="29" height="29"><path d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z"></path></svg>';
	$svgLinkedIn = '<svg fill="#000" width="29" height="29" viewBox="0 0 34 34"><g><path d="M34,2.5v29A2.5,2.5,0,0,1,31.5,34H2.5A2.5,2.5,0,0,1,0,31.5V2.5A2.5,2.5,0,0,1,2.5,0h29A2.5,2.5,0,0,1,34,2.5ZM10,13H5V29h5Zm.45-5.5A2.88,2.88,0,0,0,7.59,4.6H7.5a2.9,2.9,0,0,0,0,5.8h0a2.88,2.88,0,0,0,2.95-2.81ZM29,19.28c0-4.81-3.06-6.68-6.1-6.68a5.7,5.7,0,0,0-5.06,2.58H17.7V13H13V29h5V20.49a3.32,3.32,0,0,1,3-3.58h.19c1.59,0,2.77,1,2.77,3.52V29h5Z"></path></g></svg>';
	$svgFacebook = '<svg fill="#000" width="29" height="29"><path d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79"></path></svg>';

	$shareTwitter  = sprintf( "https://twitter.com/intent/tweet?url=$post_link&text=%s", get_the_title() . ' par @alexsoyes' );
	$shareLinkedIn = "https://www.linkedin.com/sharing/share-offsite/?url=$post_link";
	$shareFacebook = "https://www.facebook.com/v3.3/dialog/share?app_id=993736991064466&href=$post_link&display=page&redirect_uri=https://facebook.com";

	return [
		'twitter' => [
			'name' => 'Twitter',
			'attr' => "data-tab=\"$shareTwitter\"",
			'svg' => $svgTwitter
		],
		'linkedin' => [
			'name' => 'LinkedIn',
			'attr' => "data-window=\"$shareLinkedIn\"",
			'svg' => $svgLinkedIn
		],
		'facebook' => [
			'name' => 'Facebook',
			'attr' => "data-tab=\"$shareFacebook\"",
			'svg' => $svgFacebook
		],
	];
}