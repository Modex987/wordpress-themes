<?php get_header(); ?>

<h1>Hello from single portfolio</h1>

<div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>

            <hr>

            <div>
                <?php the_post_thumbnail(array(150, 150)) ?>
            </div>
            <h2><?php the_time(); ?></h2>
            <!-- <span><?php // the_category(' '); ?></span><br> -->
            <?php 
                // $geners = wp_get_post_terms($post->ID, 'gener');

                // foreach($geners as $gener){
                //     echo '<small>' . $gener . '</small>';
                // }

                the_terms($post->ID, 'gener', '<small>', '</small>, <small>', '</small>');
            ?>
            
            <hr>
            <span><?php the_tags('<small> ', ' </small>, <small> ', ' <small>'); ?></span><br>
            <hr>
            <span><?php the_title(); ?></span><br>
            <hr>

            <?php if(current_user_can('edit_post', $post->ID)): ?>
                <small>
                    ## <?php edit_post_link('edit post!'); ?>
                </small>
            <?php endif; ?>

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

<?php get_footer(); ?>