<?php

add_shortcode(
    'soyes_testimonials',
    function ($atts = array()) {
        ob_start();
        ?>

        <div class="wp-block-columns">

            <div class="wp-block-column testimonial">
                <div class="wp-block-columns">
                    <div class="wp-block-column testimonial-container-picture">
                        <img src="/wp-content/themes/soyes/assets/images/testimonials/melvyn.jpeg"
                             width="48" height="48"
                             alt="Melvyn MALHERBE" class="testimonial-img">
                        <span class="testimonial-tag">
                            Newsletter
                        </span>
                    </div><!-- .wp-block-column -->
                    <div class="wp-block-column testimonial-container-content">
                        <p class="testimonial-title">Melvyn MALHERBE</p>
                        <small class="testimonial-subtitle">Développeur web, fondateur de Codeline</small>
                        <p class="testimonial-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nibh ac massa aliquet.
                        </p>
                        <span class="testimonial-link" onclick=""></span>
                    </div><!-- .wp-block-column -->
                </div><!-- .wp-block-columns -->

            </div><!-- .wp-block-column -->

            <div class="wp-block-column testimonial">
                <div class="wp-block-columns">
                    <div class="wp-block-column testimonial-container-picture">
                        <img src="/wp-content/themes/soyes/assets/images/testimonials/nathan.jpeg"
                             width="48" height="48"
                             alt="Nathan LEMOINE" class="testimonial-img">
                        <span class="testimonial-tag">
                            Formation
                        </span>
                    </div><!-- .wp-block-column -->
                    <div class="wp-block-column testimonial-container-content">
                        <p class="testimonial-title">Nathan LEMOINE</p>
                        <small class="testimonial-subtitle">Développeur web fullstack React / Node</small>
                        <p class="testimonial-content">
                            Chaque échange vocal avec toi est une énorme source d'inspiration et un gros apport de
                            connaissance.<br>Merci beaucoup.
                        </p>
                        <span class="testimonial-link" onclick=""></span>
                    </div><!-- .wp-block-column -->
                </div><!-- .wp-block-columns -->
            </div><!-- .wp-block-column -->


            <div class="wp-block-column testimonial">
                <div class="wp-block-columns">
                    <div class="wp-block-column testimonial-container-picture">
                        <img src="/wp-content/themes/soyes/assets/images/testimonials/loriane.jpeg"
                             width="48" height="48"
                             alt="Loriane L'HOSTIS" class="testimonial-img">
                        <span class="testimonial-tag">
                            Blog
                        </span>
                    </div><!-- .wp-block-column -->
                    <div class="wp-block-column testimonial-container-content">
                        <p class="testimonial-title">Loriane L'HOSTIS</p>
                        <small class="testimonial-subtitle">Développeuse informatique industrielle .NET</small>
                        <p class="testimonial-content">
                            Je suis impressionnée par toute l'énergie que tu dégages à travers ce blog, par le
                            contenu qui est super interessant et bien présenté.
                        </p>
                        <span class="testimonial-link" onclick=""></span>
                    </div><!-- .wp-block-column -->
                </div><!-- .wp-block-columns -->
            </div><!-- .wp-block-column -->
        </div><!-- .wp-block-columns -->
        <?php
        return ob_get_clean();
    }
);
