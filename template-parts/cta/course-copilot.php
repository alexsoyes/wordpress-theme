<?php
$link = "https://learn.alexsoyes.com/formation-github-copilot";
?>

<div class="card">
    <div class="card-image">
        <img src="https://alexsoyes.com/wp-content/uploads/2023/04/formation_copilot.jpg"
             alt="Formation GitHub Copilot" width="450" height="300">
    </div><!-- .card-image -->

    <div class="card-content">

        <?php if (is_page_template('page-category.php')): ?>
            <h3 class="card-title">
                <a target="_blank" href="<?php echo $link; ?>" rel="noopener">Formation
                    GitHub Copilot</a>
            </h3><!-- .card-title -->
        <?php else: ?>
            <div class="entry-category"><span>Formation</span></div>
            <div class="card-title">Formation GitHub Copilot</div>
        <?php endif; ?>

        <div class="card-excerpt">
            <p>8 vidéos sur GitHub Copilot pour coder 30% + vite avec une IA et gagner 2h de ton temps par jour.</p>
        </div><!-- .card-excerpt -->

        <div class="new-cta">
            <span onclick="window.open(&quot;<?php echo $link; ?>&quot;)">J'ai envie d'en savoir plus 🚀</span>
        </div><!-- .new-cta -->

    </div><!-- .card-content -->
</div>
