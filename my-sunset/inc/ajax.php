<?php



add_action('wp_ajax_load_more_action', 'sunset_load_more');  #  wp_ajax_load_{$action}
add_action('wp_ajax_nopriv_load_more_action', 'sunset_load_more');  #  wp_ajax_nopriv_load_{$action}


function sunset_load_more() {
    check_ajax_referer('_loader_nonce', '_loader_nonce');
    
    $paged = $_POST['page'] + 1;
    
    $query = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged
    ));

    if($query->have_posts()){
        while($query->have_posts()) {
            $query->the_post();

            get_template_part('template-parts/content', get_post_format());
        }
    }

    die();
}