<div class="lame--3--cartes position-relative">
    <div class="container__lg">
        <div class="py-3 py-md-8">
            <div class="text-center">
                <?php if($args["etiquette"]) : ?>
                    <h3 class="sub-head text-white"><?php echo $args["etiquette"]; ?></h3>
                <?php endif; ?>

                <?php if($args["titre_3_cartes"]) :
                    $titre = $args["titre_3_cartes"];
                    $titre_parts = preg_split('/\s+/', $titre);
                    $part_count = count($titre_parts);
                ?>

                <h2 class="container__xsm big-title f-72 text-white d-flex justify-content-center mt-0" >
                    <?php for ($i = 0; $i < $part_count; $i++) : ?>
                        <span class="<?php echo $i > 0 ? 'ms-md-3 ms-2' : ''; ?>">
                            <p class="d-inline"><?php echo $titre_parts[$i]; ?></p>
                        </span>
                        <?php if ($i == 0 && !empty($args["title_images"])) : ?>
                            <div class="title-images d-flex ms-md-4 ms-3 me-2">
                                <?php foreach ($args["title_images"] as $image_circulaire) : ?>
                                    <?php if ($image_circulaire['image_circulaire']) : ?>
                                        <figure class="title-image-figure">
                                            <img src="<?php echo $image_circulaire['image_circulaire']['url']; ?>" alt="<?php echo $image_circulaire['image_circulaire']['alt']; ?>" class="mx-auto">
                                        </figure>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </h2>
                <?php endif; ?>

                <?php if ($args["bouton"]) : ?>
                    <a class="btn btn-purple-black mb-4 mb-md-5" target="<?php echo $args["bouton"]["target"]; ?>" href="<?php echo $args["bouton"]["url"]; ?>"><?php echo $args["bouton"]["title"]; ?></a>
                <?php endif; ?>

                <?php if ($args["cartes"]) : ?>                
                    <div class="row g-4 py-4">
                        <?php foreach ($args["cartes"] as $carte) : ?>
                            <div class="col-12 col-md-6 col-lg-4 md-flex">
                                <div class="lame--3--cartes--carte d-inline-block text-start background-<?php echo $carte["couleur_fond"]; ?>" >
                                    <div class="lame--3--cartes--carte--inner">
                                        <?php if ($carte["image"]) : ?>
                                            <figure class="mt-0 mb-4">
                                                <img src="<?php echo $carte["image"]["url"]; ?>" alt="<?php echo $carte["image"]["alt"]; ?>">
                                            </figure>
                                        <?php endif; ?>
                                        <?php if ($carte["titre_carte"]) : ?>
                                            <p class="f-34 mb-4 sora"><?php echo $carte["titre_carte"]; ?></p>
                                        <?php endif; ?>
                                        <?php if ($carte["contenu_texte"]) : ?>
                                            <p class='f-16'><?php echo $carte["contenu_texte"]; ?></p>
                                        <?php endif; ?>
                                        <?php if ($carte["last-sentence"]) : ?>
                                            <div class="last-sentence-container">
                                                <p class="last-sentence f-20"><?php echo $carte["last-sentence"]; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>                
                <?php endif; ?>
            </div>
        </div>
    </div>