<?php
$id = get_the_ID();

if (isset($args) && array_key_exists('id', $args)) {
    $id = $args['id'];
}
?>
<div class="card blog__content p-3 w-100 bg-light-gray ">
    <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none text-reset d-flex flex-column h-100">
        <div class="card-body d-flex flex-column position-relative h-100">
            <div class="tag-container position-absolute top-0 start-0 m-3">
                <?php if (get_the_category($id)) : ?>
                    <?php foreach (get_the_category($id) as $term) : 
                        $tag_class = '';
                        switch ($term->name) {
                            case 'Prospection digitale':
                                $tag_class = 'tag-purple';
                                break;
                            case 'Outils et modèles':
                                $tag_class = 'tag-orange';
                                break;
                            case 'Articles de fonds':
                                $tag_class = 'tag-green';
                                break;
                            default:
                                $tag_class = 'tag-gray';
                        }
                    ?>
                        <p class="tag <?php echo $tag_class; ?> f-14 mb-4"><?php echo $term->name; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <h3 class="card--title pt-3 mt-4"><?php echo get_the_title($id); ?>ss</h3>
            
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
    </a>
</div>