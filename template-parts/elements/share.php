<div class="default-max-width">
	<p class="social-title">❤️ Tu as aimé cet article ?️</p>
	<p class="social-description">
		J'ai mis un moment à l'écrire... Ce serait top si tu pouvais le partager à la communauté !
	</p>
	<div class="social-buttons">
		<?php $socialButtons = soyes_get_social_share(); ?>
		<?php foreach ( $socialButtons as $button ): ?>
			<button <?php echo $button['attr']; ?>><?php echo $button['svg']; ?><?php echo $button['name']; ?></button>
		<?php endforeach; ?>
	</div>
</div><!-- .default-max-width -->