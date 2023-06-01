<?php
$link = "https://learn.alexsoyes.com/formation-developpeur-freelance";
?>

<div class="card">
    <div class="card-image">
        <img src="https://alexsoyes.com/wp-content/uploads/2023/04/formation_freelance.jpg"
             alt="Formation développeur freelance" width="450" height="300">
    </div><!-- .card-image -->

    <div class="card-content">

        <?php if (is_page_template('page-category.php')): ?>
            <h2 class="card-title">
                <a target="_blank" href="<?php echo $link; ?>" rel="noopener">Formation
                    premium développeur freelance</a>
            </h2><!-- .card-title -->
        <?php else: ?>
            <div class="entry-category"><span>Formation</span></div>
            <div class="card-title">Formation développeur freelance</div>
        <?php endif; ?>

        <div class="card-excerpt">
            <p>Deviens développeur freelance sans prendre de risque, facture entre 400€ et 600€ la journée.</p>
        </div><!-- .card-excerpt -->

        <div class="new-cta">
            <span onclick="window.open(&quot;<?php echo $link; ?>&quot;)">Je veux devenir dev freelance 🚀</span>
        </div><!-- .new-cta -->

    </div>
</div>