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
            <div>
                <span class="label f-14 position-relative pb-1">Secteur</span>
                <div>
                    <span class="tag mb-1 tag-white">
                        Industrie
                    </span>
                </div>
            </div>
            <div>
                <span class="label f-14">Entreprises</span>
                <div class="mt-1">
                    <span class="tag mb-1 tag-white">
                        Grand compte
                    </span>
                </div>
            </div>
            <div>
                <span class="label f-14">Fonction cibles</span>
                <div class="mt-1">
                    <span class="tag mb-1 tag-white">
                        Directions générales et marketing
                    </span>
                </div>
            </div>
            <div>
                <span class="label f-14">Zone géographique</span>
                <div class="mt-1">
                    <span class="tag mb-1 tag-white">
                        France
                    </span>
                </div>
            </div>
        </div>
        <div class="temoignage__campaign__bottom w-100 d-flex align-items-start justify-content-between">
            <div class="temoignage__campaign__bottom__item">
                <h4 class="f-20 m-0 dot__text dot__text--top">Tester</h4>
                <ul class="d-flex flex-column align-items-start pl-0 mt-2 mb-0">
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            <strong>Test 1 :</strong> A/B test sur les messages et sur l’argumentaire commercial
                        </span>
                    </li>
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            <strong>Test 2 :</strong> Différents secteurs d’activités
                        </span>
                    </li>
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            <strong>Test 3 :</strong>  Temporalité et saisonnalité des besoins des prospects grâce à leurs retours
                        </span>
                    </li>
                </ul>
            </div>
            <div class="temoignage__campaign__bottom__item">
                <h4 class="f-20 m-0 dot__text dot__text--top">Analyser</h4>
                <ul class="d-flex flex-column align-items-start pl-0 mt-2 mb-0">
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                        Identification d’une séquence de messages plus performante que les autres
                        </span>
                    </li>
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            Identification des secteurs les plus porteurs
                        </span>
                    </li>
                    <li class="temoignage__campaign__bottom__item__row">
                        <span class="f-14">
                            Identification du bon timing pour relancer les prospects 
                        </span>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
endif;
?>