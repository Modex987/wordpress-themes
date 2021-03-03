<?php



add_action('wp_ajax_load_more_action', 'sunset_load_more');
add_action('wp_ajax_nopriv_load_more_action', 'sunset_load_more');


function sunset_load_more() {
    check_ajax_referer('_loader_nonce', '_loader_nonce');
    
    echo 'hhhhhhhhhhhhhhhhh';

    die();
}