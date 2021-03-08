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

                    <?php the_content(); ?>

                <?php endwhile; ?>
                
                <div class="prev-next-items">
                    <span><?= get_previous_post_link() ?></span>
                    <span><?= get_next_post_link() ?></span>
                </div>

            <?php endif; ?>
        </div>

    </main>
</div>


<?php get_footer(); ?>
