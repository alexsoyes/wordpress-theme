<?php $link = "https://learn.alexsoyes.com/ressources-ia?utm_source=blog&utm_medium=cta-post&utm_campaign=5-ressources-ia"; ?>
<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2024/05/5-resources-ia.png"
                 width="450"
                 alt="Ressources IA gratuites pour les développeurs">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>📩 E-mail</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">5 ressources pour "Coder avec l'IA"</h2>
            <?php else: ?>
            <div class="card-title">5 ressources pour "Coder avec l'IA"</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Après 9 mois à utiliser l'IA tous les jours...<br>Voici mon guide pour utiliser au mieux l'IA et
                    coder
                    plus vite.</p>
                <strong>Contenu</strong>
                <ul class="simple">
                    <li>📄 + 30 prompts testés</li>
                    <li>🤖 2 GPTs personnalisés</li>
                    <li>👾 1 communauté Discord</li>
                    <li>🧑‍💻 + 50 outils d'IA pour devs</li>
                    <li>🚀 Avant-première formation</li>
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
