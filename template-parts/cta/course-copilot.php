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
            <h2 class="card-title">
                <a target="_blank" href="<?php echo $link; ?>" rel="noopener">Formation
                    GitHub Copilot</a>
            </h2><!-- .card-title -->
        <?php else: ?>
            <div class="entry-category"><span>Formation</span></div>
            <div class="card-title">Formation GitHub Copilot</div>
        <?php endif; ?>

        <div class="card-excerpt">
            <p>8 vidéos sur GitHub Copilot pour coder 30% + vite avec une IA et gagner 2h de ton temps par jour.</p>
        </div><!-- .card-excerpt -->

        <div class="wp-block-button__link">
            <span onclick="window.open(&quot;<?php echo $link; ?>&quot;)">Je veux coder plus rapidement ⚡️</span>
        </div><!-- .wp-block-button__link -->

    </div><!-- .card-content -->
</div>
