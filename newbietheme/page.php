<?php get_header(); ?>

<div class="row">

    <div class="col-3 border-2 border border-primary">
        <?php get_sidebar(); ?>
    </div>

    <div class="col-7">
        <h1>Standard Page</h1>

        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post() ?>

                <small><?php the_title(); ?></small>
                <p>
                    <?php the_content(); ?>
                </p>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>