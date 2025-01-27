<?php
/**
 * Author: Aicha Hawa War
 * Version: 1.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://assets.calendly.com/assets/external/widget.js"></script>
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl; 
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N862X2J');
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N862X2J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php
    // Define reusable class variables for navbar background and button style
    $navbar_class = 'navbar-single';
    $button_class = 'color-btn-dark';
    $logo_class = 'logo-dark';

    // Define arrays for pages to check background and button styling
    $navbar_home_pages = ['agence-de-prospection-linkedin', 'agence-de-prospection-email', 'agence-prospection-externalisee', 'agence-generation-leads', 'prospection-generation-leads-editeur-logiciel', 'generation-leads-cabinet-agence-conseil', 'generation-leads-cabinets-recrutement', 'prospection-cabinet-comptable', 'prospection-agence-esn', 'prospection-commerciale-hotels', 'prospection-commerciale-industrie'];
    $navbar_special_pages = ['notre-methode', 'lagence', 'contact'];
    $navbar_blog_pages = ['etudes-de-cas', 'blog', 'page__blog'];

    // Set navbar and button classes based on page
    if (is_front_page() || is_page($navbar_home_pages)) {
        $navbar_class = 'navbar-home';
        $button_class = 'btn-purple-black';
        $logo_class = ''; // logo is not dark on home pages
    } elseif (is_page($navbar_special_pages)) {
        $navbar_class = 'navbar-method-agency-contact';
    } elseif (is_page($navbar_blog_pages) || is_home()) {
        $navbar_class = 'navbar-cas-blog';
    }
    ?>

    <header>
        <nav class="navbar navbar-expand-lg fixed-top py-2 py-lg-3 <?php echo $navbar_class; ?>">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo home_url('/') ?>">
                    <img class="w-100 logo <?php echo $logo_class; ?>" src="<?php echo get_field('logo_blanc', 'option')['url']; ?>" alt="Logo">
                </a>
                <button class="navbar-toggler collapsed burger border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="span-1"></span><span></span><span></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul id="header" class="navbar-nav me-auto align-items-sm-center pt-1">
                        <li class="btn-menu ms-lg-4 mt-3 mt-lg-0"><a href="<?php echo home_url('/notre-methode/'); ?>">Notre méthode</a></li>
                        <li class="btn-menu ms-lg-4 mt-3 mt-lg-0"><a href="<?php echo home_url('/lagence/'); ?>">L’agence</a></li>
                        <li class="btn-menu ms-lg-4 mt-3 mt-lg-0"><a href="<?php echo home_url('/etudes-de-cas/'); ?>">Études de cas</a></li>
                        <li class="btn-menu ms-lg-4 mt-3 mt-lg-0"><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
                        <li class="btn-menu ms-lg-4 mt-3 mt-lg-0"><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto align-items-sm-center">
                        <li class="btn <?php echo $button_class; ?> ms-lg-3 mt-3 mt-lg-0"><a href="<?php echo home_url('/prendre-rendez-vous/'); ?>">Prendre rendez-vous</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
