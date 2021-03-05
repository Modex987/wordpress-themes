<?php

// var_dump(get_option('paged'));
// var_dump(get_option('posts_per_page'));
// var_dump(ceil(wp_count_posts('post')->publish / get_option('posts_per_page')));

// die();


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

                <div class="page-limit" data-page="/<?php sunset_check_paged(); ?>">

                    <?php while(have_posts()): the_post(); ?>

                        <?php
                            $class = 'reveal';
                            set_query_var('post-class', $class);
                        ?>

                        <?php get_template_part('template-parts/content', get_post_format()); ?>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
        </div>

        <div class="container p-3 text-right">
            <button class="loader-btn" data-page="<?php echo sunset_check_paged(true); ?>">Load More</button>
        </div>

    </main>
</div>


<?php get_footer(); ?>
