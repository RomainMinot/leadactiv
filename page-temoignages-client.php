<?php
    get_header(); 
    $temoignages_list_link = get_permalink(get_page_by_path('temoignages-list'));
    $logo_bg_discover_id = 2754;
    $logo_bg_discover_url = wp_get_attachment_url($logo_bg_discover_id);
?>

<main class="page__temoignages">
    <section class="page__temoignages__header position-relative d-flex bg-deep-purple align-items-center">
        <div class="container__lg">
            <div class="py-3 py-md-10 mt-5">      
                <div class="relative row justify-content-center h-100">
                    <div class="col-md-8 col-10 col-lg-8">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <h1 class="big-title text-darck-green mt-0 f-56 text-center mb-0">
                                <?php echo get_field('titre'); ?>
                            </h1>
                            <p class="py-4 text-center">
                                <?php echo get_field('sous_titre'); ?>
                            </p>
                            <a href="<?php echo $temoignages_list_link; ?>" class="btn color-btn-dark">
                                <?php echo get_field('texte_bouton'); ?>
                            </a>
                        </div>
                    </div>
                    <?php
                    $case_studies = get_field('etudes_cas');
                    if ($case_studies && !empty($case_studies)):
                        shuffle($case_studies);
                        $random_cases = array_slice($case_studies, 0, 4);

                        $classes = [
                            0 => '--lime',
                            1 => '--black',
                            2 => '--grey',
                            3 => '--peach'
                        ];

                        foreach ($random_cases as $index => $study):
                            $study_fields = get_fields($study->ID);
                            $current_class = isset($classes[$index]) ? $classes[$index] : '';
                            if ($study_fields["logo_client"]):
                    ?>
                        <div class="page__temoignages__header__logo page__temoignages__header__logo<?php echo esc_attr($current_class); ?>">
                            <img src="<?php echo $study_fields["logo_client"]["url"] ?>" alt="<?php echo $study_fields["logo_client"]["alt"] ?>">
                        </div>
                    <?php 
                            endif;
                        endforeach;
                    endif; 
                    ?>
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
                <div class="col-12 mt-6">
                    <div id="carouselTestimonials" class="owl-carousel" data-bs-ride="carousel">
                        <?php 
                        $case_studies = get_field('etudes_cas'); 
                        $has_slider = true;
                        if ($case_studies && !empty($case_studies)):
                            foreach ($case_studies as $index => $case_study):
                                $case_study_fields = get_fields($case_study->ID);
                        ?>
                            <div class="carousel-item-active">
                                <div class="row">
                                    <?php include(get_template_directory() . '/template-parts/card-etude-cas-component.php'); ?>
                                </div>
                            </div>
                        <?php
                            endforeach; 
                        endif;
                        ?>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-auto text-center">
                            <a href="<?php echo $temoignages_list_link; ?>" class="btn color-btn-dark">Découvrir tous les témoignages</a>
                        </div>
                    </div>
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
                        <?php echo get_field('titre_decouverte'); ?>
                    </h2>
                    <div class="page__temoignages__discover__card__links z-1 my-3 gap-2 d-flex flex-wrap justify-content-center">
                        <?php
                            $filters = get_terms([
                                'taxonomy' => 'typeetudedecas',
                                'hide_empty' => true
                            ]);
                            if (count($filters) > 0): 
                                foreach ($filters as $filter): 
                        ?>
                            <a href="<?php echo $temoignages_list_link.'#'.$filter->slug; ?>" class="btn color-btn-dark" alt="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a>
                        <?php
                                endforeach; 
                            endif; 
                        ?>
                    </div>
                    <p class="z-1 w-50 mt-3 text-center">+ 50 avis certifiés sur <a href="https://trustfolio.co/profil/leadactiv-ltMOZFoRLTk" target="_blank">Trustfolio</a></p>
                    <?php 
                    if ($logo_bg_discover_url):
                        echo '<img src="' . esc_url($logo_bg_discover_url) . '" alt="Background logo" class="page__temoignages__discover__card__logo"/>';
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