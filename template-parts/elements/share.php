<div class="default-max-width">
    <p class="social-title">
		<?php esc_html_e( 'Did you like this article?', 'soyes' ); ?>
    </p>
    <p class="social-description">
		<?php esc_html_e( 'I took a long time to make this article, if you want to share it, it will make my day! ❤️', 'soyes' ); ?>
    </p>
    <div class="social-buttons">
		<?php $socialButtons = soyes_get_social_share(); ?>
		<?php foreach ( $socialButtons as $button ) : ?>
            <button <?php echo $button['attr']; ?>><?php echo $button['svg']; ?><?php echo $button['name']; ?></button>
		<?php endforeach; ?>
    </div>
</div><!-- .default-max-width -->