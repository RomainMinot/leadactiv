<?php
/**
 * @author Aicha Hawa War
 * @version 1.0
 */

 get_header();
?>

    <main class="page__home">
        <section class="page__home--header  bg-white position-relative overflow-hidden py-2 py-md-3 d-flex align-items-center">
         <div class="container__lg h-100 py-2 py-md-3">
                <div class="row h-100 align-items-center py-2 py-md-4">
                    <div class="col-md-9 col-lg-9">

                        <h2 class="sub-head"><?php _e('Erreur 404') ?></h2>

                        <h1 class="mt-0 mb-4 content-mb-0 position-relative ">
                            <?php _e('La page que vous cherchez semble') ?> <?php _e('introuvable') ?>
                        </h1>

                        <a class="btn btn btn-purple-black " href="<?php echo home_url('/') ?>"><?php _e('Retourner sur l\'accueil') ?></a>

                    </div>
                </div>
            </div>

        </section>


    </main>

<?php
 get_footer();
