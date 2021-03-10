<?php

/**
 * 
 * @package sunset_theme
 * =======================
 *   GALEERY POST FORMAT
 * =======================
 */

global $detect;

if ( !$detect->isMobile() ):

?>

<artical id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-gallery'); ?> >

    <header class="entry-header text-center">

        <?php if(sunset_get_attachment()): ?>
            <?php
                $attachements = sunset_get_attachment(7);
                $i = 1;
            ?>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach($attachements as $attachement): ?>
                        <?php
                            $actif = ($i === 1) ? 'active' : '';
                            $i++;
                        ?>
                        <div class="carousel-item <?php echo $actif ?> standard-featured bg-img" style="background-image: url(<?php echo wp_get_attachment_url($attachement->ID); ?>);">
                            <p><?php echo wp_get_attachment_caption($attachement->ID); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        <?php endif; ?>

        <?php the_title('<h1 class="entry-title" ><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>

        <div class="entry-meta">
            <?php echo sunset_post_meta(); ?>
        </div>

    </header>

    <div class="entry-content">
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

<?php endif; ?>