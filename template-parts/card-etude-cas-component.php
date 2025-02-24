<?php 
$has_slider_check = isset($has_slider) && $has_slider;
$sectors = get_the_terms($case_study->ID, 'typeetudedecas');
$fonctions = get_the_terms($case_study->ID, 'fonction');
$localisations = get_the_terms($case_study->ID, 'localisation');

$classesForIsotope = '';
if (!$has_slider_check) {
    $classesForIsotope .= 'grid__studies--item ';
    $classesForIsotope .= getClassesForIsotope($sectors);
    $classesForIsotope .= getClassesForIsotope($fonctions);
    $classesForIsotope .= getClassesForIsotope($localisations);
}
?>

<div class="case__study col-12 <?php if (!$has_slider_check) echo 'col-md-6 col-lg-4 ' ?><?php if ($classesForIsotope != '') echo $classesForIsotope ?>">
    <a href="<?php echo get_permalink($case_study->ID); ?>" class="card-link w-100">
        <div class="card h-100 w-100 bg-light-gray">
            <div class="card-body d-flex flex-column">
                <!-- Card Header for Logo and Tag -->
                <div class="card-header-etude d-flex justify-content-between align-items-start m-0 p-0">
                    <div class="card-logo-container">
                        <?php if ($case_study_fields["logo_client"]): ?>
                            <img class="card-logo" src="<?php echo $case_study_fields["logo_client"]["url"] ?>"
                                alt="<?php echo $case_study_fields["logo_client"]["alt"] ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Title and Description -->
                <?php if (get_field('phrase_accroche', $case_study->ID)): ?>
                    <div class="f-22 card--title mt-4 sora mb-4 truncate-two-lines">
                        <?php echo get_field('phrase_accroche', $case_study->ID); ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex flex-row align-items-start flex-wrap mb-4 gap-2">
                    <!-- Secteur -->
                    <?php if ($sectors):
                        foreach ($sectors as $sector): ?>
                            <span class="tag mb-1 tag-<?php echo $case_study_fields["couleur"] ?>">
                                <?php echo $sector->name; ?>
                            </span>
                    <?php endforeach; endif; ?>
                    <!-- Fonction ciblée -->
                    <?php if ($fonctions):
                        foreach ($fonctions as $fonction): ?>
                            <span class="tag mb-1 tag-white">
                                <?php echo $fonction->name; ?>
                            </span>
                    <?php endforeach; endif; ?>
                    <!-- Localisation -->
                    <?php if ($localisations):
                        foreach ($localisations as $localisation): ?>
                            <span class="tag mb-1 tag-white">
                                <?php echo $localisation->name; ?>
                            </span>
                    <?php endforeach; endif; ?>
                </div>
                <button 
                    class="mw-max btn color-btn-dark"
                >
                    En savoir plus
                </button>
            </div>
        </div>
    </a>
</div>