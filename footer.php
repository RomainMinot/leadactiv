<?php
$option_fields = get_fields('option');
$page_id = get_queried_object_id();
$attachment = get_page_by_title('arrow-white-background', OBJECT, 'attachment');
$logo_bg_url = $attachment ? wp_get_attachment_url($attachment->ID) : '';
wp_footer();
?>
    <footer class="footer bg-teal">
        <div class="container__lg">
            <section class="footer-main">
                <!-- Top -->
                <div class="footer-top-wrapper d-flex align-items-stretch justify-content-between">
                    <!-- Secteurs d’activités -->
                    <div class="footer__links footer__links--large pt-2">
                        <span class="f-14">Secteurs d’activités</span>
                        <hr class="footer-divider footer-divider--opacity footer-divider--smallgap">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'footer',
                            'menu_class' => 'footer-menu',
                        ));
                        ?>
                    </div>
                    <!-- Services complémentaires -->
                    <div class="footer__links pt-2">
                        <span class="f-14">Services complémentaires</span>
                        <hr class="footer-divider footer-divider--opacity footer-divider--smallgap">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'footer-droite',
                            'menu_class' => 'footer-menu',
                        ));
                        ?>
                    </div>
                    <!-- Newsletter Signup Section -->
                    <div class="footer_newsletter-wrapper">
                        <div class="footer_newsletter-line mb-5">
                            <div class="margin-bottom margin-xsmall">
                                <div class="f-24 mb-1 mb-md-2 mt-0">
                                    <?php echo esc_html($option_fields['newsletter_title']); ?>
                                </div>
                            </div>
                            <p class="f-16 mt-2 mb-0 fw-normal lh-base">
                                <?php echo esc_html($option_fields['newsletter_text']); ?>
                            </p>
                        </div>
                        <div class="footer_newsletter-line w-form">
                            <form action="<?php echo esc_url($option_fields['newsletter_subscription_url']); ?>" method="get" target="_blank" class="email_form">
                                <div class="email-form_wrapper">
                                    <input class="email-form_input w-input email-input" maxlength="256" name="email" placeholder="Entrez votre email" type="email" required>
                                    <input type="submit" class="btn color-btn-dark" value="M'inscrire">
                                </div>
                            </form>
                        </div>
                        <?php if ($logo_bg_url): ?>
                            <img src="<?php echo esc_url($logo_bg_url) ?>" alt="Graphic" class="footer-graphic logo-violet">
                        <?php endif; ?>
                    </div> 
                </div>
                <hr class="footer-divider">
                <!-- Bottom -->
                <section class="footer-bottom-wrapper text-center">
                    <div class="d-flex flex-row align-items-start justify-content-between">
                        <!-- Logo -->
                        <?php if($option_fields["logo_clair"]): ?>
                            <a href="<?php echo home_url('/') ?>" class="footer__logo">
                                <img class="w-100" src="<?php echo $option_fields["logo_clair"]['url'] ?>" alt="LeadActiv Logo">
                            </a>
                        <?php endif; ?>
                        <!-- Links -->
                        <?php
                            wp_nav_menu(array(
                                'menu' => 'footer-gauche',
                                'menu_class' => 'footer-menu',
                            ));
                        ?>
                        <!-- Socials -->
                        <div class="social-media">
                            <a href="https://www.linkedin.com/company/leadactiv" target="_blank" class="social-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="#ffffff">
                                    <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <hr class="footer-divider footer-divider--opacity">
                    <div class="footer-links">
                        <div class="links col-12 d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-4">
                                <a href="<?php echo home_url('/mentions-legales/'); ?>">Mentions légales</a>
                                <a href="<?php echo home_url('/politique-de-confidentialite/'); ?>">Politique de confidentialité</a>
                                <a href="<?php echo home_url('/politique-cookies/'); ?>">Politique relative aux cookies</a>
                                <a href="javascript:openAxeptioCookies()">Gérez vos cookies</a>
                            </div>
                            <span>&copy; Copyright LeadActiv 2025, tous droits réservés</span>
                        </div>
                    </div>
                </section> 
                <?php 
                    if ($logo_bg_url):
                        echo '<img src="' . esc_url($logo_bg_url) . '" alt="Background logo" class="footer__logo__bg"/>';
                    endif; 
                ?>
            </section>
           
        </div>
    </footer>
</body>
</html>