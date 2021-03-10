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

        <div class="container">
            <?php if(have_posts()): ?>

                <?php while(have_posts()): the_post(); ?>
                
                    <artical id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

                        <header class="entry-header text-center">

                            <?php the_title('<h1 class="entry-title" >', '</h1>'); ?>

                        </header>

                        <div>
                            <?php the_content(); ?>
                        </div>

                    </artical>

                <?php endwhile; ?>

            <?php endif; ?>
        </div>

    </main>
</div>


<?php get_footer(); ?>