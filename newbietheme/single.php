<?php get_header(); ?>

<h1>Hello from single</h1>

<div class="row">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>

            <hr>

            <div>
                <?php the_post_thumbnail(array(150, 150)) ?>
            </div>
            <h2><?php the_time(); ?></h2>
            <span><?php the_category(' '); ?></span>
            <span><?php the_tags('<small> ', ' </small>, <small> ', ' <small>'); ?></span>
            <span><?php the_title(); ?></span>

            <small>
                <?php edit_post_link('edit post!'); ?>
            </small>

            <p><?php the_content(); ?></p>

        <?php endwhile; ?>
    <?php endif; ?>
</div>


<div class="d-flex justify-content-between my-3">
    <small class="text-left">
        <?php next_post_link(); ?>
    </small>

    <small class="text-left">
        <?php previous_post_link(); ?>
    </small>
</div>

<div>
    <?php
        if(comments_open()) {
            comment_form();
        }
    ?>
</div>

<?php get_footer(); ?>