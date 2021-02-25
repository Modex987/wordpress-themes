<?php get_header(); ?>


<!-- Top box -->

    <main>
        <header class="row tm-welcome-section">
            <h2 class="col-12 text-center tm-section-title"><?php the_archive_title(); ?></h2>

            <p><?php the_archive_description(); ?></p>

        </header>

        <?php if(have_posts()): ?>

            <div id="tm-gallery-page-pizza" class="tm-gallery-page">

                <?php while(have_posts()): the_post(); ?>

                    <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <figure>
                            <h4 class="tm-gallery-title">
                                <a href="<?php the_permalink(); ?>" >
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(array(150, 150)); ?>
                            </a>

                            <figcaption>
                                <p class="tm-gallery-description">
                                    <?php the_excerpt(); ?>
                                </p>
                            </figcaption>

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
                                <small><?php the_date(); ?></small>
                            </div>

                            <div>
                                <small><?php the_author(); ?></small>
                            </div>

                        </figure>
                    </article>

                <?php endwhile; ?>
            </div>


            <div class="tm-gallery-page">
                <?php the_posts_pagination(array(
                    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.218 19l-1.782-1.75 5.25-5.25-5.25-5.25 1.782-1.75 6.968 7-6.968 7z"/></svg>',
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>',
                    'screen_reader_text' => ' ',
                    'class' => 'blog_paginator',
                )); ?>
            </div>

        <?php endif; ?>

    </main>


<?php get_footer(); ?>