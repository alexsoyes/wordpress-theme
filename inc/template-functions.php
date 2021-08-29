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

	$svgTwitter  = '<svg role="img" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>' . __( 'Share on Twitter', 'soyes' ) . '</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>';
	$svgLinkedIn = '<svg role="img" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>' . __( 'Share on LinkedIn', 'soyes' ) . '</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>';
	$svgFacebook = '<svg role="img" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>' . __( 'Share on Facebook', 'soyes' ) . '</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';

	$shareTwitter  = sprintf( "https://twitter.com/intent/tweet?url=$post_link&text=%s", get_the_title() . ' par @alexsoyes' );
	$shareLinkedIn = "https://www.linkedin.com/sharing/share-offsite/?url=$post_link";
	$shareFacebook = "https://www.facebook.com/v3.3/dialog/share?app_id=993736991064466&href=$post_link&display=page&redirect_uri=https://facebook.com";

	return [
		'twitter'  => [
			'name' => 'Twitter',
			'attr' => "data-window=\"$shareTwitter\"",
			'svg'  => $svgTwitter
		],
		'linkedin' => [
			'name' => 'LinkedIn',
			'attr' => "data-window=\"$shareLinkedIn\"",
			'svg'  => $svgLinkedIn
		],
		'facebook' => [
			'name' => 'Facebook',
			'attr' => "data-window=\"$shareFacebook\"",
			'svg'  => $svgFacebook
		],
	];
}

function soyes_get_the_image( string $imageName, string $imageExtension = "svg", bool $isIcon = true, bool $isSocialIcon = false ): string {

	$filepath = get_stylesheet_directory_uri() . "/assets/images";

	if ( $isIcon ) {
		$filepath .= "/icons";
	}

	if ( $isSocialIcon ) {
		$filepath .= "/social";
	}

	return "$filepath/$imageName.$imageExtension";
}

function soyes_get_the_social_icon( string $socialName ): string {
	return soyes_get_the_image( $socialName, 'svg', true, true );
}

function soyes_the_comment_count( bool $shouldDisplayText = true ): void {
	$soyes_comment_count = get_comments_number();

	if ( $shouldDisplayText ) {
		if ( '1' === $soyes_comment_count ) {
			esc_html_e( '1 comment', 'soyes' );
		} else {
			printf(
			/* translators: %s: Comment count number. */
				esc_html( _nx( '%s comment', '%s comments', $soyes_comment_count, 'Comments title', 'soyes' ) ),
				esc_html( number_format_i18n( $soyes_comment_count ) )
			);
		}
	} else {
		echo esc_html( number_format_i18n( $soyes_comment_count ) );
	}

	printf(
		'<img src="%s" alt="%s" width="15" height="15" %s />',
		soyes_get_the_image( 'chatbox-outline', 'svg', true, false ),
		__( 'Comments' ),
		$shouldDisplayText ? 'aria-hidden="true"' : ""
	);
}
