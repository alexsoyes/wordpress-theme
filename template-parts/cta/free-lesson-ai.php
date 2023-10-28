<?php $link = "https://learn.alexsoyes.com/conference-coder-avec-ia?utm_source=blog&utm_campaign=free-lesson-ai"; ?>
<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2023/10/conference-coder-ia.jpg"
                 alt="Conférence en ligne 100% gratuite - Coder avec l'IA en 2023" width="450"
                 height="300">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>🎁 Conférence en ligne 1h</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">Conférence exclusive "Coder avec l'IA"</h2>
            <?php else: ?>
            <div class="card-title">Conférence exclusive "Coder avec l'IA"</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Comment gagner 4h par jour avec L’IA en tant que développeur.</p>
                <strong>Mercredi 08 novembre à 20h30</strong>
                <p>
                    <em>La 1ʳᵉ conférence de France pour les devs sur l'IA.</em>
                </p>
                <ul class="simple">
                    <li>🔮 Pourquoi les devs doivent miser sur l'IA dès 2024</li>
                    <li>🤖 La méthode pour coder plus vite avec l'IA</li>
                    <li>🔥️ Les 2 outils à impérativement utiliser au quotidien</li>
                    <li>🧠 Comment l'IA va diviser ton temps de dev par 2</li>
                </ul>
            </div><!-- .card-excerpt -->
            <div class="soyes-newsletter-form has-text-align-center">
                <button class="wp-block-button__link actionable"
                        onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
                    <span>Inscription gratuite</span>
                </button><!-- .wp-block-button__link -->
            </div>
            <div class="has-text-align-center">
                <small>
                    Aucun replay à prévoir.
                </small>
            </div>
        </div>
    </div>
</div>
