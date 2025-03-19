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
        <div class="card card-body">
            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
        </div>
    </div>
</div>

<?php
endif;
?>