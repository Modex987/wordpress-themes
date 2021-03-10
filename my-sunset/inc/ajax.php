<?php

add_action('wp_ajax_load_more_action', 'sunset_load_more');  #  wp_ajax_load_{$action}
add_action('wp_ajax_nopriv_load_more_action', 'sunset_load_more');  #  wp_ajax_nopriv_load_{$action}


function sunset_load_more() {
    check_ajax_referer('_nonce', '_nonce');
    
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


add_action('wp_ajax_contact_us_action', 'contact_us_action');
add_action('wp_ajax_nopriv_contact_us_action', 'contact_us_action');

function contact_us_action() {
    check_ajax_referer('_nonce', '_nonce');

    $title = wp_strip_all_tags($_POST['name']);
    $email = wp_strip_all_tags($_POST['email']);
    $message = wp_strip_all_tags($_POST['message']);

    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_content' => $message,
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'message',
        'meta_input' => array('_contact_email_meta_key' => $email),
    ));

    if(is_numeric($post_id) && $post_id != 0) {
        $to = get_bloginfo('admin_email');
        $subject = 'Sunset Contact Form - ' . $title;

        $headers[] = 'From: ' . get_bloginfo('name') . '<' . $to . '>';
        $headers[] = 'Reply-To: ' . $title . '<' . $email . '>';
        $headers[] = 'Content-Type: text/html: charset=UTF-8';

        wp_mail($to, $subject, $message, $headers);

        echo 'yes';
    }else{
        echo 'no';
    }

    die();
}