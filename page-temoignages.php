<?php
    get_header();
    $img_id = 2754;
    $logo_bg_url = wp_get_attachment_url($img_id);
?>

<main class="page__temoignages">
    <section class="page__temoignages__header position-relative d-flex bg-deep-purple align-items-center">
        <div class="container__lg">
            <div class="py-3 py-md-10">      
                <div class="relative row justify-content-center h-100">
                    <div class="col-md-8 col-10 col-lg-8">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <h1 class="big-title text-darck-green mt-0 f-56 text-center mb-0">Nos clients nous font confiance pour gérer leur prospection commerciale</h1>
                            <p class="py-4 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Découvrir les témoignages client</a>
                        </div>
                    </div>
                    <!-- Random Logos -->
                    <div class="page__temoignages__header__logo page__temoignages__header__logo--lime">
                        <img src="http://localhost:8888/leadactiv/wp-content/uploads/2024/08/LittleBIGconnection.svg" alt="Logo">
                    </div>
                    <div class="page__temoignages__header__logo page__temoignages__header__logo--black">
                        <img src="http://localhost:8888/leadactiv/wp-content/uploads/2024/08/LittleBIGconnection.svg" alt="Logo">
                    </div>
                    <div class="page__temoignages__header__logo page__temoignages__header__logo--grey">
                        <img src="http://localhost:8888/leadactiv/wp-content/uploads/2024/08/LittleBIGconnection.svg" alt="Logo">
                    </div>
                    <div class="page__temoignages__header__logo page__temoignages__header__logo--peach">
                        <img src="http://localhost:8888/leadactiv/wp-content/uploads/2024/08/LittleBIGconnection.svg" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Témoignages preview -->
    <section class="page__temoignages__slider bg-white position-relative">
        <div class="container__lg">
            <div class="py-5 py-md-8">
                <div class="relative row justify-content-center">
                    <div class="col-md-8 col-10 col-lg-8 text-center">
                        <h2 class="f-48 mt-0 mb-4">Nos témoignages client</h2>
                        <p class="content-text f-18">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="mt-6 d-flex flex-column align-items-center gap-5">
                    <div class="w-100 bg-light-gray p-5">
                        <?php include(get_template_directory() . '/template-parts/card-etude-cas-component.php'); ?>
                    </div>
                    <a href="<?php echo home_url('/blog/'); ?>" class="mx-auto btn color-btn-dark">Découvrir tous les témoignages</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Discover -->
    <section class="page__temoignages__discover bg-white position-relative overflow-hidden d-flex align-items-center">
        <div class="container__lg">
            <div class="pb-5 pb-md-8">
                <div class="page__temoignages__discover__card">
                    <h2 class="z-1 small-title f-36 mb-5 mt-0 text-center">
                        Découvrez les témoignages d’entreprises qui vous ressemblent
                    </h2>
                    <div class="page__temoignages__discover__card__links z-1 my-3 gap-2 d-flex flex-wrap justify-content-center">
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">B2B</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Conseil</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Alimentation & hôtellerie</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Éditeurs de logiciels</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Coaching & Formation</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Marketing & Communication</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Services financiers</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Services IT</a>
                        <a href="<?php echo home_url('/blog/'); ?>" class="btn color-btn-dark">Agences digitales</a>
                    </div>
                    <p class="z-1 w-50 mt-3 text-center">+ 50 avis certifiés sur <a href="https://trustfolio.co/profil/leadactiv-ltMOZFoRLTk" target="_blank">Trustfolio</a></p>
                    <?php 
                    if ($logo_bg_url):
                        echo '<img src="' . esc_url($logo_bg_url) . '" alt="Background logo" class="page__temoignages__discover__card__logo"/>';
                    endif; 
                    ?>
                </div>
            </div>   
        </div> 
    </section>
</main>

<?php
    get_footer();
?>