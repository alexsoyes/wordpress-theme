<?php $link = "https://learn.alexsoyes.com/coaching-ia?utm_source=blog&utm_medium=cta-post&utm_campaign=coaching-ia"; ?>
<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2024/10/1.png"
                 alt="Coaching IA gratuit pour les développeurs"
                 width="460"
                 height="300">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>📹 Visio</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">Coaching IA pour développeurs</h2>
            <?php else: ?>
            <div class="card-title">Coaching IA pour développeurs</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Un plan d'action IA personnalisé pour les développeurs freelances.</p>
                <strong>Programme</strong>
                <ul class="simple">
                    <li>Gagne 1h à 2h par jour avec un workflow optimisé.</li>
                    <li>Boost ton efficacité pour être encore plus rentable.</li>
                    <li>Réduis ton stress et respecte facilement tes deadlines.</li>
                </ul>
            </div><!-- .card-excerpt -->
            <div class="soyes-newsletter-form has-text-align-center">
                <button class="wp-block-button__link actionable"
                        onclick="window.open(&quot;<?php echo $link; ?>&quot;)">
                    <span>Réserver gratuitement</span>
                </button><!-- .wp-block-button__link -->
            </div>
        </div>
    </div>
</div>
