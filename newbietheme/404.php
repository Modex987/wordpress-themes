<?php get_header(); ?>



<div id="primary">
    <main class="site-main" role="main">
        <section class="error-404 not-found">

            <header class="page-header">
                <h1 class="page-title">
                    Sorry, Page Not Found!
                </h1>
            </header>

            <div class="page-content p-4">
                <h3>looks like nothing found here!</h3>
                <h4>Try: </h4>

                <div>
                    <div class="mb-3"><?php get_search_form(); ?></div>

                    <?php the_widget('WP_Widget_Recent_Posts', array(), array(
                        'before_title' => '<h6>',
                        'after_title' => '</h6>',
                    )); ?>
                </div>

                <div>
                    <h6>Recent categories</h6>
                    <?php wp_list_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'show_count' => 1,
                        'title_li' => '',
                        'number' => 3
                    )); ?>
                </div>

            </div>
        </section>
    </main>
</div>



<?php get_footer(); ?>