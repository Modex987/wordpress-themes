<?php /* Template Name: Portfolio Page */ ?>

<?php get_header(); ?>

<div class="row">

    <!-- <div class="col-3 border-2 border border-primary">
        <?php // get_sidebar(); ?>
    </div> -->

    <div class="col-7">
        <h1>Portfolio page</h1>

        <?php
            $args = array('post_type' => 'portfolio', 'post_per_page' => 3);
            $query = new WP_Query($args);
        ?>

        <?php if($query->have_posts()): ?>
            <?php while($query->have_posts()): $query->the_post() ?>

                <?php the_post_thumbnail(array(150, 150)); ?>
                <small><?php the_category(); ?></small>
                <small><?php the_tags(); ?></small>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a href="<?php the_permalink(); ?>">

            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>