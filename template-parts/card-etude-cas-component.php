<div class="col-12 col-md-6 col-lg-6 d-flex">
    <a href="<?php echo get_permalink($etude->ID); ?>" class="card-link w-100">
        <div class="card h-100 w-100 bg-white">
            <div class="card-body d-flex flex-column">
                <!-- Card Header for Logo and Tag -->
                <div class="card-header-etude d-flex justify-content-between align-items-start m-0 p-0">
                    <div class="card-logo-container">
                        <?php if ($etude_fields["logo_client"]): ?>
                            <img class="card-logo" src="<?php echo $etude_fields["logo_client"]["url"] ?>"
                                alt="<?php echo $etude_fields["logo_client"]["alt"] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="tag-container m-0 p-0">
                        <?php if (get_the_terms($etude->ID, 'typeetudedecas')):
                            foreach (get_the_terms($etude->ID, 'typeetudedecas') as $term): ?>
                                <span class="tag mb-1 tag-<?php echo $etude_fields["couleur"] ?>">
                                    <?php echo $term->name; ?>
                                </span>
                            <?php endforeach; endif; ?>
                    </div>
                </div>
                <!-- Title and Description -->
                <?php if (get_field('phrase_accroche', $etude->ID)): ?>
                    <div class="f-22 card--title mt-4 sora mb-4">
                        <?php echo get_field('phrase_accroche', $etude->ID); ?>
                    </div>
                <?php endif; ?>
                <div class="f-16 card--description mb-3 col-12 col-md-9">
                    <?php
                    $text = strip_tags(get_field('accroche', $etude->ID));
                    $words = preg_split("/[\s,]+/", $text);
                    $word_limit = 15;
                    $excerpt = implode(' ', array_slice($words, 0, $word_limit));

                    if (count($words) > $word_limit) {
                        $excerpt .= '...';
                    }

                    echo esc_html($excerpt);
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>