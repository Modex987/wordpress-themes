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
    <main role="main">

        <div class="container" id="posts-container">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>

                    <?php
                        $class = 'reveal';
                        set_query_var('post-class', $class);
                    ?>

                    <?php get_template_part('template-parts/content', get_post_format()); ?>

                <?php endwhile; ?>

            <?php endif; ?>
        </div>

        <div class="container p-3 text-right">
            <button class="loader-btn" data-page="1">Load More</button>
        </div>

    </main>
</div>


<?php get_footer(); ?>
