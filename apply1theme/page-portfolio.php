<?php /* Template Name: Portfolio Page */ ?>

<?php get_header(); ?>

<?php
    $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'post_per_page' => 2,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    ));
?>

<?php if($query->have_posts()): ?>

    <div id="tm-gallery-page-pizza" class="tm-gallery-page">

        <?php while($query->have_posts()): $query->the_post(); ?>

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

                    <?php if(has_term('', 'gener')): ?>
                        <small>Geners: </small>
                        <?php the_terms($post->ID, 'gener', '<small>', '</small>, <small>', '</small>'); ?>
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
        <?php
            $total_pages = $query->max_num_pages;

            $current_page = max(1, get_query_var('paged'));

            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('« prev '),
                'next_text'    => __(' next »'),
            ));
        ?>
    </div>
<?php endif; ?>



<?php get_footer(); ?>