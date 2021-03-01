<?php

/**
 * 
 * @package sunset_theme
 * =====================
 *   IMAGE POST FORMAT
 * =====================
 */

?>

<artical id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-image'); ?> >

    <a class="standard-featured-link" href="<?php the_permalink(); ?>">
        <header class="entry-header text-center bg-img" style="background-image: url(<?= sunset_get_attachment() ?>);">
    
            <?php the_title('<h1 class="entry-title" ><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>

            <div class="entry-meta">
                <?php echo sunset_post_meta(); ?>
            </div>

            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div>
    
        </header>
    </a>

    <footer class="entry-footer">

        <?php require(get_template_directory() . '/template-parts/posts/post-footer.php'); ?>

    </footer>

</artical>