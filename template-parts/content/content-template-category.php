<?php

/**
 * Display page content as category, used for "formation" page.
 */

?>

<article>
    <header class="entry-header">
        <div class="entry-content">
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p class="has-text-align-center">', '</p>');
            }
            ?>
            <h1><?php the_title(); ?></h1>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="cards">
            <?php the_content(); ?>

            <h2>Formations payantes pour les développeurs</h2>

            <p>
                Mes formations payantes (et très qualitatives) pour aller beaucoup plus loin avec des exemples de
                comment passer à l'action.
            </p>
            <p>
                ✅ Savoir quoi faire pour s'améliorer dans un domaine prend du temps.
            </p>
            <ul>
                <li>Soit tu passes des heures à lire du contenu gratuit</li>
                <li>Soit tu vas à l'essentiel en achetant un contenu payant</li>
            </ul>
            <p>Là où mon contenu payant fait la différence, c'est que je te dis exactement quoi faire (avec des actions
                concrètes) et que je te fais gagner un max de temps en te donnant un plan.</p>

            <div class="wp-block-columns">
                <div class="wp-block-column">
                    <?php get_template_part('template-parts/cta/course-freelance'); ?>
                </div><!-- .wp-block-column -->
                <div class="wp-block-column">
                    <?php get_template_part('template-parts/cta/course-copilot'); ?>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->

            <h2>Formations gratuites pour les développeurs</h2>

            <p>
                <strong>Une séquence 5 emails par jour pendant 1 semaine</strong> pour maîtriser un sujet (100%
                gratuit).
            </p>
            <p>✅ Je partage avec toi les techniques que j'apprends chaque semaine pour devenir meilleur dev.</p>
            <p><em>C'est totalement gratuit et tu peux te désinscrire quand tu veux (ton mail reste en France).</em></p>
            <p>Si jamais tu as des questions, je réponds à tout le monde par e-mail !</p>

            <div class="wp-block-columns">
                <div class="wp-block-column">
                    <?php get_template_part('template-parts/cta/free-lesson-ai'); ?>
                </div><!-- .wp-block-column -->
                <div class="wp-block-column">
                    <?php get_template_part('template-parts/cta/free-lesson-freelance'); ?>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->


            <h2>Pourquoi se former en dev ?</h2>

            <p>Le développement web est devenu super compétitif, de plus en plus de personnes se reconvertissent en tant
                que développeur.</p>
            <p>Le marché commence à saturer, les bons profils se font rares...</p>
            <p><strong>
                    Sans compter que l'IA arrive pour nous permettre de coder encore plus vite.
                </strong></p>
            <p>Se démarquer des autres développeurs est devenu plus que jamais nécessaire.</p>

            <p>Peu importe comment tu te formes, mais je suis d'avis qu'il faut continuer à progresser dans son métier
                de développeur le plus possible afin d'avoir une meilleure carrière, un meilleur salaire, une sécurité
                de l'emploi...</p>

            <p>
                <strong>Pour se former en tant que développeur :</strong>
            </p>

            <ul>
                <li><a href="https://alexsoyes.com">Lire tous les articles du blog</a> (Gratuit)</li>
                <li><a href="<?php $link = "https://learn.alexsoyes.com/cours-devenir-freelance-6f2f4b3a";
                    echo $link; ?>">Formation gratuite développeur freelance</a>
                </li>
                <li><a href="<?php $link = "https://learn.alexsoyes.com/coder-avec-intelligence-artificielle";
                    echo $link; ?>">Formation gratuite pour coder avec l'IA</a>
                </li>
                <li><a href="<?php $link = "https://learn.alexsoyes.com/formation-github-copilot";
                    echo $link; ?>">Formation GitHub Copilot</a> (Payant)
                </li>
                <li><a href="<?php $link = "https://learn.alexsoyes.com/formation-developpeur-freelance";
                    echo $link; ?>">Formation développeur freelance</a> (Payant)
                </li>
            </ul>
        </div><!-- .cards -->

        <!-- wp:heading -->
        <h2 class="wp-block-heading">Les guides gratuits pour devenir meilleur développeur</h2>
        <!-- /wp:heading -->

        <!-- wp:list -->
        <ul><!-- wp:list-item -->
            <li><a href="https://alexsoyes.com/commencer-programmation/">Développeur junior : Avoir des bases solides
                    pour coder</a></li>
            <!-- /wp:list-item -->

            <!-- wp:list-item -->
            <li><a href="https://alexsoyes.com/meilleur-developpeur/">Développeur intermédiaire : Progresser en code
                    avec des outils et des techniques simples</a></li>
            <!-- /wp:list-item -->

            <!-- wp:list-item -->
            <li><a href="https://alexsoyes.com/carriere/">Développeur senior : Rejoindre le top des meilleurs
                    développeurs</a></li>
            <!-- /wp:list-item --></ul>
        <!-- /wp:list -->
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        <?php
        wp_link_pages(
            array(
                'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'soyes') . '">',
                'after' => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__('Page %', 'soyes'),
            )
        );
        ?>
    </footer><!-- .entry-footer -->
</article>
