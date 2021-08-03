<?php
/**
 * Deal with pagination.
 */

function soyes_the_posts_navigation() {
	the_posts_pagination(
		array(
			'before_page_number' => esc_html__( 'Page', 'soyes' ) . ' ',
			'mid_size'           => 0,
			'prev_text'          => sprintf(
				'%s <span class="nav-prev-text">%s</span>',
				'<',
				wp_kses(
					__( 'Newer <span class="nav-short">posts</span>', 'soyes' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				)
			),
			'next_text'          => sprintf(
				'<span class="nav-next-text">%s</span> %s',
				wp_kses(
					__( 'Older <span class="nav-short">posts</span>', 'soyes' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				'>'
			),
		)
	);
}