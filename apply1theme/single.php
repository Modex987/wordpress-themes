<?php get_header(); ?>

<?php if(have_posts()): ?>

    <div id="tm-gallery-page-pizza" class="tm-gallery-page">

        <?php while(have_posts()): the_post(); ?>

            <article class="col-12">
                <figure>
                    <h2 class="tm-gallery-title">
                        <?php the_title(); ?>
                    </h2>

                    <?php if(has_category()): ?>
                        <div>
                            <small>Categories: </small>
                            <small>
                                <?php the_category(', '); ?>
                            </small>
                        </div>
                    <?php endif; ?>

                    <?php if(has_tag()): ?>
                        <div>
                            <small>Tags: </small>   
                            <?php the_tags('<small>', '</small>, <small>',  '</small>'); ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <small>created at: <?php the_date(); ?></small>
                    </div>

                    <div>
                        <small>By: <?php the_author(); ?></small>
                    </div>

                    <hr>

                    <figcaption>
                        <p class="tm-gallery-description">
                            <?php the_excerpt(); ?>
                        </p>
                    </figcaption>

                    <?php the_post_thumbnail(array(600, 600)); ?>

                    <figcaption>
                        <p class="tm-gallery-description">
                            <?php the_content(); ?>
                        </p>
                    </figcaption>

                    <hr>

                </figure>
            </article>

        <?php endwhile; ?>
    </div>

    
    <div class="tm-gallery-page">
        <?php previous_post_link(); ?>
        <span>---------------------</span>
        <?php next_post_link(); ?>
    </div>


    <?php comments_template(); ?>

<?php endif; ?>



<?php get_footer(); ?>