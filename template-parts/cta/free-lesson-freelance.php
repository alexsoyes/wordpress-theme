<div class="card">
    <div class="card-image">
        <img src="https://alexsoyes.com/wp-content/uploads/2020/09/devenir-developpeur-freelance.jpg"
             alt="Formation gratuite pour devenir développeur freelance" width="450" height="300">
    </div><!-- .card-image -->

    <div class="card-content">

        <div class="card-tag">
            <span>🎁 Formation gratuite</span>
        </div><!-- .card-tag -->

        <?php if (is_page_template('page-category.php')): ?>
            <h2 class="card-title">Devenir développeur freelance</h2>
        <?php else: ?>
        <div class="card-title">Devenir développeur freelance</div>
        <?php endif; ?><!-- .card-title -->

        <div class="card-excerpt">
            <p>5 jours pour se lancer sans prendre de risque, puis facture entre 400€ et 600€ la journée.</p>
            <strong>Programme</strong>
            <ul class="simple">
                <li>🏁 3 choses à faire avant de se lancer</li>
                <li>🎯 La seule compétence obligatoire pour réussir</li>
                <li>🧑‍💻 5 clefs pour inspirer confiance</li>
                <li>🚀 La stratégie pour avoir des clients avant de se lancer</li>
                <li>✋ Pourquoi la plupart des freelances échouent</li>
            </ul>
        </div><!-- .card-excerpt -->

        <div class="has-text-align-center">
            <form class="soyes-newsletter-form"
                  action="<?php echo soyes_form_action('free-lesson-freelance'); ?>"
                  method="post">
                <input type="hidden" name="type" value="free-lesson-freelance">
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