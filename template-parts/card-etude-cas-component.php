<div class="case__study col-12 <?php if (isset($has_slider) && !$has_slider) echo 'col-md-6 col-lg-4 ' ?>d-flex">
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
                    <div class="f-22 card--title mt-4 sora mb-4">
                        <?php echo get_field('phrase_accroche', $case_study->ID); ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex flex-row align-items-start flex-wrap mb-4 gap-2">
                    <?php if (get_the_terms($case_study->ID, 'typeetudedecas')):
                        foreach (get_the_terms($case_study->ID, 'typeetudedecas') as $term): ?>
                            <span class="tag mb-1 tag-<?php echo $case_study_fields["couleur"] ?>">
                                <?php echo $term->name; ?>
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