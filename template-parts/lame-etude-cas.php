<?php

if (isset($args) && array_key_exists('bloc', $args)) {
    $lame_etude_cas = $args['bloc'];
}

$all_etudes = array();
$has_slider = false;

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

<section class="lame--etude-cas bg-white container__lg">
    <div class="py-3 py-md-8">
        <div class="relative row justify-content-center">
            <div class="col-md-8 col-10 col-lg-8 text-center">
                <?php
                if ($lame_etude_cas["titre"]):
                    echo '<h2 class="f-48 mt-0 mb-4">' . $lame_etude_cas["titre"] . '</h2>';
                endif;

                if ($lame_etude_cas["etiquette"]):
                    echo '<p class="content-text f-18">' . $lame_etude_cas["etiquette"] . '</p>';
                endif;
                ?>
            </div>
        </div>
        <div class="row g-4 mt-5">
            <?php
            if (count($all_etudes) > 0)
                $case_studies = $all_etudes;
            else
                $case_studies = $lame_etude_cas["etudes_cas"];

            $count = 0;
            ?>

            <?php foreach (is_array($case_studies) ? $case_studies : [] as $case_study): ?>
                <?php if ($count >= 3) break; ?>
                <?php $case_study_fields = get_fields($case_study->ID); ?>
                    <?php include(get_template_directory() . '/template-parts/card-etude-cas-component.php'); ?>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>
        <div class="row justify-content-center mt-5 mb-4">
            <div class="col-auto text-center">
                <?php if ($lame_etude_cas["lien_etudes_cas"]): ?>
                    <a 
                        class="btn color-btn-dark"
                        target="<?php echo $lame_etude_cas["lien_etudes_cas"]["target"] ?>"
                        href="<?php echo home_url('/etudes-de-cas/'); ?>">
                        <?php echo $lame_etude_cas["lien_etudes_cas"]["title"] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>