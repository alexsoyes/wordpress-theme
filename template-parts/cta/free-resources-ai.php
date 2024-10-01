<?php $link = "https://learn.alexsoyes.com/guide-ia?utm_source=blog&utm_medium=cta-post&utm_campaign=guide-ia"; ?>
<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2024/10/2.png"
                 width="460"
                 alt="Guide IA gratuit pour les développeurs">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>📩 E-mail</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">Guide Gratuit : "Coder avec l'IA"</h2>
            <?php else: ?>
            <div class="card-title">Guide Gratuit : "Coder avec l'IA"</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Après 1 an à utilise l'IA tous les jours, voici mes secrets.</p>
                <strong>Contenu</strong>
                <ul class="simple">
                    <li>👾 Communauté IA privée pour les développeurs</li>
                    <li>📄 Bibliothèque + 50 prompts pour coder</li>
                    <li>🚀 La meilleure Stack IA de 2024</li>
                </ul>
            </div><!-- .card-excerpt -->
            <div class="soyes-newsletter-form has-text-align-center">
                <button class="wp-block-button__link actionable"
                        onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
                    <span>Récupérer gratuitement</span>
                </button><!-- .wp-block-button__link -->
            </div>
        </div>
    </div>
</div>
