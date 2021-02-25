<?php get_header(); ?>

<div class="row">

    <div class="col-3 border-2 border border-primary">
        <?php get_sidebar(); ?>
    </div>

    <div class="col-7">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post() ?>

                <h1>
                    hello from front page
                </h1>

                <h1><?php the_title(); ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>