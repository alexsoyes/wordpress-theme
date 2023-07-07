<?php
$link = "https://learn.alexsoyes.com/coder-avec-intelligence-artificielle";
?>

<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2023/05/chatgpt-openai-scaled.jpg"
                 alt="Formation gratuite pour maitriser l'intelligence artificielle en tant que developpeur" width="450"
                 height="300">
        </div><!-- .card-image -->

        <div class="card-content wp-block-column">

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">
                    <a target="_blank" href="<?php echo $link; ?>"
                       rel="noopener">Maitriser l'IA pour coder 2x plus rapidement</a>
                </h2><!-- .card-title -->
            <?php else: ?>
                <div class="entry-category"><span>Cours gratuit</span></div>
                <div class="card-title">Maitriser l'IA pour coder 2x plus rapidement</div>
            <?php endif; ?>

            <div class="card-excerpt">
                <p>Comment coder avec l'IA au quotidien pour devenir un développeur plus productif.</p>
            </div><!-- .card-excerpt -->

            <button class="wp-block-button__link" onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
                <span>Je veux coder avec l'IA 🤖</span>
            </button><!-- .wp-block-button__link -->

        </div>
    </div>
