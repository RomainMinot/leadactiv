<?php
    get_header();
    $displayMore = false;
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
</main>

<?php
    get_footer();
?>