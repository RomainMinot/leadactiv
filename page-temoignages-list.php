<?php
    get_header();
    $logo_bg_discover_id = 2839;
    $logo_bg_discover_url = wp_get_attachment_url($logo_bg_discover_id);
    $post_type = 'etudedecas';

    $case_studies = get_posts(array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));
    $has_slider = false;
?>

<main class="page__temoignages">
    <!-- Hero -->
    <section class="position-relative d-flex bg-deep-purple align-items-center">
        <div class="container__lg">
            <div class="py-3 pt-md-8 pb-md-9 mt-5">      
                <div class="relative row justify-content-center h-100">
                    <div class="col-md-8 col-10 col-lg-8">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                            <p class="sub-head text-darck-green mb-2 text-uppercase"><?php echo get_field('mention_titre'); ?></p>
                            <h1 class="big-title text-darck-green mt-0 f-56 mb-0">
                                <?php echo get_field('titre'); ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if ($logo_bg_discover_url):
            echo '<img src="' . esc_url($logo_bg_discover_url) . '" alt="Background logo" class="page__temoignages__list__header__logo"/>';
        endif; 
        ?>
    </section>
    <!-- Témoignages list -->
    <section class="page__temoignages__list bg-white position-relative">
        <div class="container__lg">
            <div class="py-5 py-md-8">
            <div class="row g-4">
                <?php
                if ($case_studies && !empty($case_studies)) {
                    foreach ($case_studies as $index => $case_study) {
                        $case_study_fields = get_fields($case_study->ID);
                        include(get_template_directory() . '/template-parts/card-etude-cas-component.php'); 
                    }
                } else {
                    echo '<p>Aucune etude de cas trouvée.</p>';
                }
                ?>
            </div>
            </div>
        </div>
    </section>
</main>

<?php
    get_footer();
?>