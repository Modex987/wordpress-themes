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
        echo '<div class="page-limit" data-page="/page/' . $paged . '">';

        while($query->have_posts()) {
            $query->the_post();

            get_template_part('template-parts/content', get_post_format());
        }

        echo '</div>';
    }

    die();
}


function sunset_check_paged($attr = false){
    $output = '';
    $paged = get_query_var('paged') ;

    if(is_paged()){
        $output = 'page/' . $paged;
    }

    if($attr){
        return $paged ? $paged : 1;
    }

    return $output;
}