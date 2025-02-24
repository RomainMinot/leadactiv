<?php
$option_fields = get_fields('option');
$page_id = get_queried_object_id();
wp_footer();
?>
    <footer class="footer bg-darck-green">
        <div class="container__lg">
            <section class="footer-main">
                <div class="text-white">
                    <div class="row">
                        <div class="col-12 col-lg-2 pt-4 ">
                            <?php if($option_fields["logo_clair"]): ?>
                                <a href="<?php echo home_url('/') ?>" class="footer__logo">
                                    <img class="w-100" src="<?php echo $option_fields["logo_clair"]['url'] ?>" alt="LeadActiv Logo">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-lg-2 pt-4">
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'footer-gauche',
                                'menu_class' => 'footer-menu',
                            ));
                            ?>
                        </div>
                        <div class="col-12 col-lg-2 pt-4">
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'footer-droite',
                            'menu_class' => 'footer-menu',
                            ));
                            ?>
                        </div>
                        <div class="col-12 col-lg-2 pt-4">
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'footer',
                            'menu_class' => 'footer-menu',
                            ));
                            ?>
                        </div>
                        <hr class="footer-divider">
                    <!-- Newsletter Signup Section -->
                    <div class="d-flex align-items-center justify-content-left">
                        <div class="footer_newsletter-wrapper">
                                <div class="max-width-small mb-5">
                                    <div class="margin-bottom margin-xsmall">
                                        <div class="f-24 mb-1 mb-md-2 mt-0">
                                            <?php echo esc_html($option_fields['newsletter_title']); ?>
                                        </div>
                                    </div>
                                    <p class="f-16 mb-4 fw-normal lh-base text-white">
                                        <?php echo esc_html($option_fields['newsletter_text']); ?>
                                    </p>
                                </div>
                                <div class="max-width-medium w-form">
                                    <form action="<?php echo esc_url($option_fields['newsletter_subscription_url']); ?>" method="get" target="_blank" class="email_form">
                                        <div class="email-form_wrapper">
                                            <input class="email-form_input w-input email-input" maxlength="256" name="email" placeholder="Entrez votre email" type="email" required>
                                            <input type="submit" class="btn btn-purple-black w-button" value="S'inscrire">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-end d-flex align-items-end justify-content-end position-relative">
                            <div class="footer-graphic">
                                <?php if($option_fields["logo_violet"]): ?>
                                    <img src="<?php echo $option_fields["logo_violet"]['url'] ?>" alt="Graphic" class="logo-violet">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer-bottom-wrapper">
                <div class="text-center">
                    <hr class="footer-divider">
                    <div class="footer-links">
                        <div class="links col-12 d-flex justify-content-between align-items-center">
                            <a href="<?php echo home_url('/mentions-legales/'); ?>">Mentions légales</a>
                            <a href="<?php echo home_url('/politique-de-confidentialite/'); ?>">Politique de confidentialité</a>
                            <a href="<?php echo home_url('/politique-cookies/'); ?>">Politique relative aux cookies</a>
                            <a href="javascript:openAxeptioCookies()">Gérez vos cookies</a>
                            <span>&copy; Copyright LeadActiv 2025, tous droits réservés</span>
                            <div class="social-media">
                                <a href="https://www.linkedin.com/company/leadactiv" target="_blank" class="social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="#ffffff"><!-- Adjust size and color as needed -->
                                        <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </footer>
</body>
</html>