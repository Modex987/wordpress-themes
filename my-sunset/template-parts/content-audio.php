<?php

/**
 * 
 * @package sunset_theme
 * =================
 *   CONTENT PART
 * =================
 */

?>

<artical id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-audio'); ?> >

    <header class="entry-header text-center">

        <?php the_title('<h1 class="entry-title" ><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_post_meta(); ?>
        </div>

    </header>

    <div class="entry-content">
        <?= sunset_get_embeded_mdeia(array('audio', 'iframe')); ?>
    </div>

    <footer class="entry-footer">

        <?php require(get_template_directory() . '/template-parts/posts/post-footer.php'); ?>

    </footer>

</artical>