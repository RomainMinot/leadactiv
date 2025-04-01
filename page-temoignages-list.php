<?php
    get_header();
    $logo_bg_discover_id = 2839;
    $logo_bg_discover_url = wp_get_attachment_url($logo_bg_discover_id);
    $post_type = 'etudedecas';

    $case_studies = [];
    $loop = \Genesii\PostType\EtudeDeCas::findAll();
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            $case_studies[] = get_post();
        }
        wp_reset_postdata();
    }
    $has_slider = false;
?>

<main class="page__temoignages">
    <!-- Hero -->
    <section class="position-relative d-flex bg-deep-purple align-items-center">
        <div class="container__lg">
            <div class="py-6 pt-md-9 pb-md-9 mt-5">      
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
                <!-- Filter section -->
                <div class="pt-5 pb-2 py-md-4 mb-2">
                    <div class="row d-flex flex-column flex-md-row align-items-stretch justify-content-between">
                        <!-- Filters -->
                        <div class="col-12 col-md-8">
                            <p class="w-100 mb-3">Filtre</p>
                            <div class="w-100 d-flex mb-4 mb-md-0 flex-column flex-md-row align-items-center justify-content-center flex-nowrap gap-3 gap-md-2">
                                <div class="w-100 w-md-auto flex-1">
                                    <label for="selectSector" class="label">Secteur</label>
                                    <select id="selectSector" class="grid__studies--filter input" name="sector">
                                        <option value="*">-- Secteur d'activité</option>
                                        <?php
                                            $sectors = get_terms([
                                                'taxonomy' => 'typeetudedecas',
                                                'hide_empty' => true
                                            ]);
                                            if (count($sectors) > 0): 
                                                foreach ($sectors as $sector): 
                                        ?>
                                            <option value=".<?php echo $sector->slug ?>"><?php echo $sector->name; ?></option>
                                        <?php
                                                endforeach; 
                                            endif; 
                                        ?>
                                    </select>
                                </div>
                                <div class="w-100 w-md-auto flex-1">
                                    <label for="selectFonction" class="label">Fonction ciblée</label>
                                    <select id="selectFonction" class="grid__studies--filter input" name="fonction">
                                        <option value="*">-- Fonction ciblée</option>
                                        <?php
                                            $fonctions = get_terms([
                                                'taxonomy' => 'fonction',
                                                'hide_empty' => true
                                            ]);
                                            if (count($fonctions) > 0): 
                                                foreach ($fonctions as $fonction): 
                                        ?>
                                            <option value=".<?php echo $fonction->slug ?>"><?php echo $fonction->name; ?></option>
                                        <?php
                                                endforeach; 
                                            endif; 
                                        ?>
                                    </select>
                                </div>
                                <div class="w-100 w-md-auto flex-1">
                                    <label for="selectLocalisation" class="label">Localisation</label>
                                    <select id="selectLocalisation" class="grid__studies--filter input" name="localisation">
                                        <option value="*">-- Localisation</option>
                                        <?php
                                            $localisations = get_terms([
                                                'taxonomy' => 'localisation',
                                                'hide_empty' => true
                                            ]);
                                            if (count($localisations) > 0): 
                                                foreach ($localisations as $localisation): 
                                        ?>
                                            <option value=".<?php echo $localisation->slug ?>"><?php echo $localisation->name; ?></option>
                                        <?php
                                                endforeach; 
                                            endif; 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="col-12 col-md-3 d-flex flex-column align-items-start justify-content-between">
                            <p class="w-100 mb-3">Recherche</p>
                            <input type="search" class="input input--search grid__studies--search" placeholder="Search" name="search">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <div id="filterTagsContainer" class="d-flex flex-row align-items-center justify-content-start flex-wrapreverse flex-md-wrap gap-2">
                                <button class="page__temoignages__list__filters__clear d-none">
                                    Clear filters <i class="ml-1 fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List -->
                <div class="grid__studies row g-2 g-md-4 overflow-y-hidden">
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