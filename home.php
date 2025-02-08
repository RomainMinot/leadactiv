<?php

get_header();

$page_id = get_queried_object_id();

?>
<main class="page__blog">
    <section class="page__blog--header position-relative py-3 py-md-8 bg-light-gray">
        <div class="container__lg">
            <div class="col-12 text-center">
                <h1 class="sub-head f-14">ACTUALITÉS DE LA PROSPECTION DIGITALE</h1>
                <h2 class="big-title mb-5 f-48 mt-0 text-darck-green"><?php _e('Le blog LeadActiv') ?></h2>
            </div>
            <div class="col-12">
                <div id="carouselBlog" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5));
                        $cptloop = 0;
                        if ($loop->have_posts()):
                            while ($loop->have_posts()):
                                $loop->the_post(); ?>
                                <div class="carousel-item <?php echo ($cptloop == 0) ? 'active' : ''; ?>">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <a href="<?php the_permalink(); ?>" class="card-link w-100 text-decoration-none">
                                                <div class="card h-100 p-4 w-100 d-flex flex-row position-relative">
                                                    <div class="card-body d-flex flex-column position-relative">
                                                        
                                                        <h3 class="f-48 card--title mt-0 mt-md-4 mt-lg-4"><?php the_title(); ?></h3>
                                                        
                                                        <div class="d-flex align-items-center mt-auto">
                                                            <div class="author-avatar me-2">
                                                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                                            </div>
                                                            <div class="author-details">
                                                                <div class="author-name f-16 me-5"><?php echo get_the_author(); ?></div>
                                                                <div class="post-date f-16"><?php echo get_the_date('d F Y'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="background-overlay"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php $cptloop++;
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                    <ul class="carousel-indicators">
                        <?php for ($i = 0; $i < $cptloop; $i++): ?>
                            <li data-bs-target="#carouselBlog" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''; ?>"></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="page__etude--content position-relative" id="decouvrir">
        <div class="container__lg">
            <div class="py-3 py-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $filtres = get_terms(array('taxonomy' => 'category'));
                        if (count($filtres) > 0): ?>
                            <div class="page__etude--content--top">
                                <div class="page__etude--content--top--filtres-container">
                                    <div class="page__etude--content--top--filtres d-md-flex align-items-center justify-content-start grid--actus--filters flex-wrap">
                                        <a class="filter-link f-14 grid--actus--filter all active" data-filter="*"><?php _e('Tous') ?></a>
                                        <?php foreach ($filtres as $filtre): ?>
                                            <div class="page__etude--content--top--filtres--item">
                                                <a class="filter-link f-13 d-block grid--actus--filter" data-filter=".<?php echo $filtre->slug; ?>"><?php echo $filtre->name; ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="page__blog--content position-relative">
        <div class="position-relative">
            <div class="row page__blog--content--grid grid--actus">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-6 mt-4 page__blog--content--grid--item grid--actus--items <?php if(get_the_category(get_the_ID())) { foreach (get_the_category(get_the_ID()) as $term): echo $term->slug.' '; endforeach; } ?>">
                        <?php echo get_template_part('template-parts/content', 'post'); ?>
                    </div>
                <?php endwhile; else : ?>
                    <div class="col-12"><?php esc_html_e('Désolé, aucun article ne correspond à vos critères.'); ?></div>
                <?php endif; ?>
            </div>
        </div>
                </div>

            </div>    
        </div>
    </section>

    <section class="cta-section">
        <div class="container__lg">
            <div class="py-3 py-md-8">
                <h2 class="cta-title">
                    <span class="light-text">Nous prospectons,</span>
                    <br>
                    <strong>vous vendez eheheh</strong>
                </h2>
                <div class="cta-buttons">
                    <a href="<?php echo home_url('/prendre-rendez-vous/'); ?>" class="btn color-btn-dark">Prendre
                        rendez-vous</a>
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-purple-black">Nous contacter</a>
                </div>
            </div>    
        </div>
    </section>
</main>

<?php
get_footer();