<?php
$campaign = isset($args['campaign']) ? $args['campaign'] : null;
$index = isset($args['index']) ? $args['index'] : 0;
$computed_index = $index < 10 ? '0' . $index : $index;
if ($campaign):
?>

<div class="temoignage__campaign p-5 bg-light-gray">
    <div class="temoignage__campaign__header d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $computed_index ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $computed_index ?>">
        <div>
            <p class="f-16 mb-2">Campagne <?php echo $computed_index ?></p>
            <h3 class="m-0 f-24 lh-base"><?php echo $campaign["titre"] ?></h3>
        </div>
        <button class="btn btn-arrow collapsed" type="button">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow_down.svg" alt="Arrow down">
        </button>
    </div>
    <div class="collapse" id="collapseExample<?php echo $computed_index ?>">
        <div class="temoignage__campaign__cibler">
            <h4 class="f-20 m-0 dot__text dot__text--left">Cibler</h4>
            <!-- Secteur -->
            <div>
                <?php 
                    $secteur_ids = $campaign["cibler"]["secteur"];
                    $secteur_terms = get_terms([
                        'taxonomy' => 'typeetudedecas',
                        'include' => $secteur_ids,
                        'hide_empty' => true
                    ]);
                ?>
                <span class="label f-14 position-relative pb-1">Secteur</span>
                <div class="d-flex flex-wrap gap-1">
                    <?php 
                        foreach ($secteur_terms as $term) {
                            echo '<span class="tag tag-white">'.$term->name.'</span>';
                        }
                    ?>
                </div>
            </div>
            <!-- Entreprises -->
            <div>
                <?php 
                    $entreprise_ids = $campaign["cibler"]["entreprise"];
                    $entreprise_terms = get_terms([
                        'taxonomy' => 'entreprise',
                        'include' => $entreprise_ids,
                        'hide_empty' => false
                    ]);
                ?>
                <span class="label f-14 position-relative">Entreprises</span>
                <div class="d-flex flex-wrap gap-1 mt-2">
                    <?php 
                        foreach ($entreprise_terms as $term) {
                            echo '<span class="tag tag-white">'.$term->name.'</span>';
                        }
                    ?>
                </div>
            </div>
            <!-- Fonction cibles -->
            <div>
                <?php 
                    $fonction_ids = $campaign["cibler"]["fonction"];
                    $fonction_terms = get_terms([
                        'taxonomy' => 'fonction',
                        'include' => $fonction_ids,
                        'hide_empty' => true
                    ]);
                ?>
                <span class="label f-14 position-relative pb-1">Fonction cibles</span>
                <div class="d-flex flex-wrap gap-1 mt-2">
                    <?php 
                        foreach ($fonction_terms as $term) {
                            echo '<span class="tag tag-white">'.$term->name.'</span>';
                        }
                    ?>
                </div>
            </div>
            <!-- Zone géographique -->
            <div>   
                <?php 
                    $localisation_ids = $campaign["cibler"]["lieu"];
                    $localisation_terms = get_terms([
                        'taxonomy' => 'localisation',
                        'include' => $localisation_ids,
                        'hide_empty' => true
                    ]);
                ?>
                <span class="label f-14 position-relative">Zone géographique</span>
                <div class="d-flex flex-wrap gap-1 mt-2">
                    <?php 
                        foreach ($localisation_terms as $term) {
                            echo '<span class="tag tag-white">'.$term->name.'</span>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="temoignage__campaign__bottom w-100 d-flex align-items-start justify-content-between">
            <div class="temoignage__campaign__bottom__item">
                <?php 
                    $test_ids = $campaign["tester"];
                ?>
                <h4 class="f-20 m-0 dot__text dot__text--top">Tester</h4>
                <ul class="d-flex flex-column align-items-start pl-0 mt-2 mb-0">        
                    <?php 
                        if ($test_ids) {
                            foreach ($test_ids as $index => $test_id) {
                    ?>
                        <li class="temoignage__campaign__bottom__item__row">
                            <span class="f-14">
                                <strong>Test <?php echo $index + 1 ?> :</strong> <?php echo $test_id['detail'] ?>
                            </span>
                        </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="temoignage__campaign__bottom__item">
                <?php 
                    $analyse_ids = $campaign["analyser"];
                ?>
                <h4 class="f-20 m-0 dot__text dot__text--top">Analyser</h4>
                <ul class="d-flex flex-column align-items-start pl-0 mt-2 mb-0">
                    <?php 
                        if ($analyse_ids) {
                            foreach ($analyse_ids as $analyse_id) {
                    ?>
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            <?php echo $analyse_id['detail'] ?>
                        </span>
                    </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
endif;
?>