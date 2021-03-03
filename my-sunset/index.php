<?php
/**
 * 
 * @package sunset_theme
 * ==================
 *    INDEX PAGE
 * ==================
 */

?>

<?php get_header(); ?>


<div id="primary" class="content-area">
    <main class="site-mail" role="main">

        <div class="container" id="posts-container">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>

                    <?php get_template_part('template-parts/content', get_post_format()); ?>

                <?php endwhile; ?>

                <div class="row text-right">
                    <button class="loader-btn" data-page="1">Load More</button>
                </div>
            <?php endif; ?>
        </div>

    </main>
</div>


<?php get_footer(); ?>
