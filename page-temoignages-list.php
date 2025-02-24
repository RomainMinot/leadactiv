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
            <div class="py-3 pt-md-9 pb-md-9 mt-5">      
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
            <div class="py-5 pt-2 pb-md-8">
                <!-- Filter -->
                <div class="py-4 mb-2">
                    <div class="row d-flex align-items-stretch justify-content-between">
                        <div class="col-8">
                            <p class="w-100 mb-3">Filtre</p>
                            <div class="w-100 d-flex align-items-center justify-content-center flex-nowrap gap-2">
                                <div class="flex-1">
                                    <label for="selectSector" class="label">Secteur</label>
                                    <select id="selectSector" class="input" name="sector">
                                        <option value="direction_marketing">Direction marketing</option>
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <label for="selectFonction" class="label">Fonction ciblée</label>
                                    <select id="selectFonction" class="input" name="fonction">
                                        <option value="assistant_de_direction">Assistant(e) de direction</option>
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <label for="selectLocalisation" class="label">Localisation</label>
                                    <select id="selectLocalisation" class="input" name="localisation">
                                        <option value="france">France</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-flex flex-column align-items-start justify-content-between">
                            <p class="w-100 mb-3">Recherche</p>
                            <input type="text" class="input input--search" placeholder="Search" name="search">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <div class="d-flex flex-row align-items-center justify-content-start flex-wrap gap-2">
                                <div class="tag tag-light-purple">
                                    <span>Alimentation & Hôtellerie</span>
                                    <i class="ml-2 fas fa-times"></i>
                                </div>
                                <div class="tag tag-gray">
                                    <span>Direction marketing</span>
                                    <i class="ml-2 fas fa-times"></i>
                                </div>
                                <div class="tag tag-gray">
                                    <span>Assistant(e) de direction</span>
                                    <i class="ml-2 fas fa-times"></i>
                                </div>
                                <div class="tag tag-gray">
                                    <span>France</span>
                                    <i class="ml-2 fas fa-times"></i>
                                </div>
                                <button class="page__temoignages__list__filters__clear">Clear filters <i class="ml-1 fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List -->
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