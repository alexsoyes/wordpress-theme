<div>
    <p class="social-title">
		<?php esc_html_e( 'Did you like this article?', 'soyes' ); ?>
    </p>
    <p class="social-description">
		<?php _e( 'I took a long time to make this article,<br>if you want to share it, it will make my day! ❤️', 'soyes' ); ?>
    </p>
    <div class="social-buttons">
		<?php $socialButtons = soyes_get_social_share(); ?>
		<?php foreach ( $socialButtons as $button ) : ?>
            <button <?php echo $button['attr']; ?>><?php echo $button['svg']; ?><?php echo $button['name']; ?></button>
		<?php endforeach; ?>
    </div>
    <p class="social-more">
		<?php esc_html_e( 'I do reply to every comment on the blog 😊', 'soyes' ); ?>
    </p>
</div>
