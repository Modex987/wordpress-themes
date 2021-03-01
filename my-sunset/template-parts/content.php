<?php

/**
 * 
 * @package sunset_theme
 * =================
 *   CONTENT PART
 * =================
 */

?>

<artical id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

    <header class="entry-header text-center">

        <?php the_title('<h1 class="entry-title" ><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_post_meta(); ?>
        </div>

    </header>

    <div class="entry-content">
        <?php if(sunset_get_attachment()): ?>

            <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                <div class="standard-featured bg-img" style="background-image: url(<?php echo sunset_get_attachment(); ?>);"></div>
            </a>

        <?php endif; ?>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="btn-container text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e('Read More ..'); ?></a>
        </div>
    </div>

    <footer class="entry-footer">

        <?php require(get_template_directory() . '/template-parts/posts/post-footer.php'); ?>

    </footer>

</artical>