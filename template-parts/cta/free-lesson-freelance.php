<?php
$link = "https://learn.alexsoyes.com/cours-devenir-freelance-6f2f4b3a";
?>

<div class="card">
    <div class="card-image">
        <img src="https://alexsoyes.com/wp-content/uploads/2020/09/devenir-developpeur-freelance.jpg"
             alt="Formation gratuite pour devenir développeur freelance" width="450" height="300">
    </div><!-- .card-image -->

    <div class="card-content">

        <?php if (is_page_template('page-category.php')): ?>
            <h2 class="card-title">
                <a target="_blank" href="<?php echo $link; ?>" rel="noopener">Devenir dev freelance en 2023 (en toute
                    sécurité)</a>
            </h2><!-- .card-title -->
        <?php else: ?>
            <div class="entry-category"><span>Cours gratuit</span></div>
            <div class="card-title">Devenir dev freelance en 2023 (en toute sécurité)</div>
        <?php endif; ?>

        <div class="card-excerpt">
            <p>Comment surmonter la peur de se lancer en tant que dev freelance et trouver des clients. (Sans prendre de
                risque)</p>
        </div><!-- .card-excerpt -->

        <button class="wp-block-button__link" onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
            <span>Je veux me lancer en freelance 🎉</span>
        </button><!-- .wp-block-button__link -->

    </div>
</div>