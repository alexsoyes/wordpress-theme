<?php $link = "https://learn.alexsoyes.com/conference-coder-avec-ia-replay?utm_source=blog&utm_campaign=card"; ?>
<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2023/10/conference-coder-ia.jpg"
                 alt="La 1ère conférence de France sur le Code et l'IA." width="450"
                 height="300">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>📹 Masterclass</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">La conférence "Coder avec l'IA"</h2>
            <?php else: ?>
            <div class="card-title">La conférence "Coder avec l'IA"</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Gagner 4h par jour avec L’IA en tant que développeur.</p>
                <p>
                    <em>Découvre la 1ʳᵉ communauté francophone de devs qui codent avec l'intelligence artificielle.</em>
                </p>
                <strong>Programme</strong>
                <ul class="simple">
                    <li>🔮 Pourquoi les devs doivent miser sur l'IA dès 2024</li>
                    <li>❌ Pour ça ne fonctionne pas avec toi</li>
                    <li>🤖 La méthode pour coder plus vite avec l'IA</li>
                    <li>🔥️ Les 2 outils à impérativement utiliser au quotidien</li>
                    <li>🧠 Comment l'IA va diviser ton temps de dev par 2</li>
                    <li>🚀 Le plan pour booster son code à l'IA</li>
                </ul>
            </div><!-- .card-excerpt -->
            <div class="soyes-newsletter-form has-text-align-center">
                <button class="wp-block-button__link actionable"
                        onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
                    <span>Accéder à la masterclass</span>
                </button><!-- .wp-block-button__link -->
            </div>
        </div>
    </div>
</div>
