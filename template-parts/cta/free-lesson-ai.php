<div class="card wp-block-columns">
    <div class="card-image wp-block-column">
        <div class="card-image">
            <img src="https://alexsoyes.com/wp-content/uploads/2023/05/chatgpt-openai-scaled.jpg"
                 alt="Formation gratuite pour maitriser l'intelligence artificielle en tant que developpeur" width="450"
                 height="300">
        </div><!-- .card-image -->

        <div class="card-content">

            <div class="card-tag">
                <span>🎁 Formation gratuite</span>
            </div><!-- .card-tag -->

            <?php if (is_page_template('page-category.php')): ?>
                <h2 class="card-title">Coder 2x plus rapidement</h2>
            <?php else: ?>
            <div class="card-title">Coder 2x plus rapidement</div>
            <?php endif; ?><!-- .card-title -->

            <div class="card-excerpt">
                <p>Comment coder avec l'IA au quotidien pour devenir plus productif.</p>
                <strong>Programme</strong>
                <ul class="simple">
                    <li>🔮 Pourquoi tout va changer d'ici 5 ans</li>
                    <li>⚙️ Optimiser VSCode : Extensions + config</li>
                    <li>🤖 GPT-4 - Les prompts qui fonctionnent</li>
                    <li>🔥️ La liste des outils pour rester compétitif</li>
                    <li>🧠 Où trouver les meilleures infos sur l'IA</li>
                </ul>
            </div><!-- .card-excerpt -->
            <div class="has-text-align-center">
                <form class="soyes-newsletter-form"
                      action="<?php echo soyes_form_action('free-lesson-ai'); ?>"
                      method="post">
                    <input type="hidden" name="type" value="free-lesson-ai">
                    <input type="hidden" name="remote_source" value="<?php soyes_the_current_uri(); ?>">
                    <input type="hidden" name="timezone">
                    <input type="hidden" name="is_desktop">
                    <input name="email" type="email" placeholder="<?php _e('Mon adresse e-mail', 'soyes'); ?>"
                           required
                           aria-label="Adresse e-mail" class="soyes-newsletter-email">
                    <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                           value="Recevoir">
                </form><!-- .soyes-newsletter-form -->

                <small>
                    <?php _e('RGPD friendly 🌱 - Désinscription à tout moment', 'soyes'); ?>
                </small>
            </div>

        </div>
    </div>
</div>
