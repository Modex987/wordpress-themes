<?php get_header(); ?>



<div class="row">
    <h1>Hello from search</h1>

    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>

            <hr>

            <div>
                <?php the_post_thumbnail(array(150, 150)) ?>
            </div>

            <h3><?php the_tags(); ?></h3>
            <h3><?php the_title(); ?></h3>

        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?> 