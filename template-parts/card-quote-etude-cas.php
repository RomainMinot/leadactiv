<?php 
$colorType = isset($args['colorType']) ? $args['colorType'] : 'default';
$auteur = isset($args['auteur']) ? $args['auteur'] : null;
$citation = isset($args['citation']) ? $args['citation'] : null;
$quote_icon_url = isset($args['quote_icon_url']) ? $args['quote_icon_url'] : '';
$has_bottom = isset($args['has_bottom']) ? $args['has_bottom'] : false;

$style = $colorType === 'peach' ? 'temoignage__quote--peach' : 'temoignage__quote--lavender';
?>

<article class="mt-md-6 temoignage__quote <?php echo $style; ?>">
    <div> 
        <img src="<?php echo esc_url($quote_icon_url); ?>" alt="Quote icon" class="temoignage__quote__icon mb-3">
        <div class="temoignage__quote__content">
            <?php echo $citation ?>
        </div>
    </div>
    <div class="temoignage__quote__author">
        <img src="<?php echo esc_url($auteur["photo"]["url"]); ?>" alt="<?php echo esc_attr($auteur["photo"]["alt"]); ?>" class="temoignage__quote__author__picture">
        <div>
            <span class="temoignage__quote__author__name"><?php echo $auteur["nom_prenom"] ?></span>
            <span class="temoignage__quote__author__position"><?php echo $auteur["fonction"] ?></span>
        </div>
    </div>
    <?php if ($has_bottom): ?>
        <div class="temoignage__quote__bottom">
            <div class="temoignage__quote__bottom__item temoignage__quote__bottom__item--down">
                <span class="temoignage__quote__bottom__item__label">Roi</span>
                <div class="temoignage__quote__bottom__item__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/money.svg" alt="Ecoute">
                </div>
            </div>
            <div class="temoignage__quote__bottom__item">
                <span class="temoignage__quote__bottom__item__label">Ecoute</span>
                <div class="temoignage__quote__bottom__item__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/relume.svg" alt="Ecoute">
                </div>
            </div>
            <div class="temoignage__quote__bottom__item temoignage__quote__bottom__item--down">
                <span class="temoignage__quote__bottom__item__label">Qualité</span>
                <div class="temoignage__quote__bottom__item__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg" alt="Ecoute">
                </div>
            </div>
        </div>
    <?php endif; ?>
</article>