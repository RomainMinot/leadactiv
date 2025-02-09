<?php

if (isset($args) && array_key_exists('bloc', $args)) {
    $lame_etude_cas = $args['bloc'];
}

$all_etudes = array();

if (array_key_exists("selectionner_toutes_etudes", $lame_etude_cas)) {

    if ($lame_etude_cas["selectionner_toutes_etudes"]) {

        $loop = \Genesii\PostType\EtudeDeCas::findAll();
        if ($lame_etude_cas["selectionner_toutes_etudes"][0] == 'true') {
            if ($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();
                    $all_etudes[] = get_post();

                }
                wp_reset_postdata();

            }
        }
    }
}

?>


    <div class=" lame--etude-cas container__lg">
        <div class="py-3 py-md-8">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-12">
                    <?php if ($lame_etude_cas["etiquette"]): ?>
                        <h3 class="sub-head mt-4 mb-3 px-2 justify-content-center text-center">
                            <?php echo $lame_etude_cas["etiquette"] ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($lame_etude_cas["titre"]): ?>
                       <div class="container__sm"> <h2 class="small-title f-36 mb-4 mb-md-6 mt-0">
                            <?php echo $lame_etude_cas["titre"] ?>
                        </h2></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row g-4">
                <?php
                if (count($all_etudes) > 0)
                    $etudes = $all_etudes;
                else
                    $etudes = $lame_etude_cas["etudes_cas"];

                $count = 0;
                ?>

                <?php foreach (is_array($etudes) ? $etudes : [] as $etude): ?>
                    <?php if ($count >= 4) break; ?>
                    <?php $etude_fields = get_fields($etude->ID); ?>
                        <?php include(get_template_directory() . '/template-parts/card-etude-cas-component.php'); ?>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>

            <div class="row justify-content-center mt-5 mb-4">
                <div class="col-auto text-center">
                    <?php if ($lame_etude_cas["lien_etudes_cas"]): ?>
                        <a class="btn color-btn-dark"
                        target="<?php echo $lame_etude_cas["lien_etudes_cas"]["target"] ?>"
                        href="<?php echo home_url('/etudes-de-cas/'); ?>">
                            <?php echo $lame_etude_cas["lien_etudes_cas"]["title"] ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>