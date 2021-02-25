<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post() ?>

        <hr>

        <h3><?php the_title(); ?></h3>

        <p><?php the_content(); ?></p>

        <hr>

    <?php endwhile; ?>
<?php endif; ?>

<hr>

<h1>Hello from About Me</h1>

<?php get_footer(); ?>