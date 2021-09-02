<div class="social-icons">
	<?php $socialButtons = soyes_get_social_share(); ?>
	<?php foreach ( $socialButtons as $button ) : ?>
        <button <?php echo $button['attr']; ?>><?php echo $button['svg']; ?></button>
	<?php
	endforeach;
	?>
</div><!-- social-icons -->
