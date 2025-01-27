<?php
/**
 * @author Aicha Hawa War
 * @version 1.0
 */

 get_header();
?>

    <main class="page__methode ">
        <div class="container__lg py-3 py-md-8">
            <section class="page__methode--header position-relative my-5">
                <div class="bg-light-gray overflow-hidden">
                    <div class="container__lg d-flex ">
                        <div class="row h-100 align-items-center w-100">
                            <div class="col-12 col-md-11 py-3 py-md-0">
                                <h1 class="mb-4 content-mb-0 position-relative "><?php echo get_the_title() ?></h1>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>

            <?php if(get_field('contenu', get_the_ID())): ?>
                <section>
                    <div class="h-100 d-flex py-3 py-md-8">
                        <div class="content-text">
                            <?php echo get_field('contenu', get_the_ID()) ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </main>

<?php
 get_footer();