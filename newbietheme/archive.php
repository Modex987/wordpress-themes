<?php get_header(); ?>

<div class="row">

    <div class="col-3">
        <?php get_sidebar(); ?>
    </div>

    <div class="col-8">

        <h1>Welcome to Archive page </h1>
        <h5>(<?php the_archive_title(); ?>)</h5>
        <p class="taxonomy-description"><?php the_archive_description(); ?></p>

        <div class="justify-content-center">

            <?php if(have_posts()): ?>

                <?php while(have_posts()): the_post() ?>

                    <?php get_template_part('template-parts/content', 'featured'); ?>

                    <hr>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
        
        <div>
            <?php the_posts_pagination(array(
                'mid_size'  => 1,
                'screen_reader_text' => '',
                'prev_text' => 'Back',
                'next_text' => 'Next',
            )); ?>
        </div>

    </div>

</div>

<?php get_footer(); ?>