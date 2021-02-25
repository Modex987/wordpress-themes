<?php /* Template Name: No Title Page */ ?>

<?php get_header(); ?>

<h1>Page without title</h1>
<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post() ?>

        <p><?php the_content(); ?></p>

    <?php endwhile; ?>
<?php endif; ?>

<hr>

<h1>Hello from About Me</h1>

<?php get_footer(); ?>