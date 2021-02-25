<?php get_header() ?>

<?php 
    while(have_posts()){
        the_post();
?>

<?php
$parentId = wp_get_post_parent_id(get_the_ID());

$test = get_pages(array(
    'child_of' => get_the_ID()
));

?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>replace me ok ?</p>
        </div>
        </div>  
    </div>

    <div class="container container--narrow page-section">

        <?php if($parentId){ ?>

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?= get_permalink($parentId) ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to <?= get_the_title($parentId) ?>
                    </a>
                    <span class="metabox__main"><?php the_title(); ?>
                    </span>
                </p>
            </div>

        <?php }; ?>

        <?php if($parentId or $test): ?>

            <div class="page-links">
                <h2 class="page-links__title">
                    <a href="<?= the_permalink($parentId) ?>">
                        <?= get_the_title($parentId); ?>
                    </a>
                </h2>
                <ul class="min-list">
                    <?php
                        wp_list_pages(array(
                            'title_li' => null,
                            'child_of' => $parentId ? $parentId : get_the_ID(),
                            'sort_column' => 'menue_order'
                        ));
                    ?>
                </ul>
            </div>

        <?php endif; ?>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>

<?php }; ?>

<?php  get_footer() ?>