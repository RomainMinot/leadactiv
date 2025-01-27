    <div class="container__lg">
        <div class="py-3 py-md-8">
            <div class="text-center mt-4 mt-md-0">
                <?php if ($args["titre_part_1"] || $args["titre_part_2"] || $args["bouton_avec_pour"]) : ?>
                <div class="d-flex justify-content-center align-items-center mb-4 mb-md-6 position-relative z-10">
                    <p class="big-title f-36 fw-500 m-0"><?php echo $args["titre_part_1"]; ?></p>
                    <div class="toggle-button mx-3 f-18">
                        <input type="radio" id="avec" name="relation" value="avec" <?php echo ($args["bouton_avec_pour"] == 'avec') ? 'checked' : ''; ?>>
                        <label for="avec">avec</label>
                        <input type="radio" id="pour" name="relation" value="pour" <?php echo ($args["bouton_avec_pour"] == 'pour') ? 'checked' : ''; ?>>
                        <label for="pour">pour</label>
                    </div>
                    <p class="big-title f-36 fw-500 m-0"><?php echo $args["titre_part_2"]; ?></p>
                </div>
                <?php endif; ?>

                <?php if ($args["cartes_avec"] && $args["cartes_pour"]) : ?>
                        <div class="cartes-set cartes-set-avec row g-4">
                            <?php foreach ($args["cartes_avec"] as $carte) : ?>
                                <div class="col-12 col-md-6 col-lg-4 d-flex ">
                                    <div class="lame--agence--carte d-inline-block text-start background-<?php echo $carte["couleur_fond"]; ?>">
                                        <div class="lame--agence--cartes--carte--inner">   
                                            <p class="f-34 mt-0 p-0 mb-4"><?php echo $carte["titre_carte"]; ?></p>
                                             <div class="f-16 mb-4"><?php echo $carte["contenu_texte"]; ?></div>
                                            <div class="card-image-container">
                                                <img class="card-image" src="<?php echo $carte["image"]['url']; ?>" alt="Card Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="cartes-set cartes-set-pour row g-4" style="display: none;">
                            <?php foreach ($args["cartes_pour"] as $carte) : ?>
                                <div class="col-12 col-md-6 col-lg-4 d-flex ">
                                    <div class="lame--agence--carte d-inline-block text-start background-<?php echo $carte["couleur_fond"]; ?>">
                                        <div class="lame--agence--cartes--carte--inner">   
                                            <p class="f-34 mt-0 p-0 mb-4"><?php echo $carte["titre_carte"]; ?></p>
                                             <div class="f-16 mb-4"><?php echo $carte["contenu_texte"]; ?></div>
                                            <div class="card-image-container">
                                                <img class="card-image" src="<?php echo $carte["image"]['url']; ?>" alt="Card Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>