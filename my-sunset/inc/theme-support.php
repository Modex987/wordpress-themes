<?php

/*
    @package Sunset

    ===========================
        THEME SUPPORT OPTIONS
    ===========================
*/

add_action('after_setup_theme', function() {

    if(is_array(get_option('post_formats'))) {

        $options = array_keys(get_option('post_formats'));
        if (!empty($options)) {
            add_theme_support('post-formats', $options);
        }
    }

    $custom_header = get_option('custom_header');
    if(!empty($custom_header)){
        add_theme_support('custom-header');
    }

    $custom_background = get_option('custom_background');
    if(!empty($custom_background)){
        add_theme_support('custom-background');
    }

    add_theme_support('custom-logo', array(
        'height'                => 100,
        'width'                 => 100,
        'flex-height'           => true,
        'flex-width'            => true,
        'header-text'           => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo'  => true, 
    ));

    add_theme_support('post-thumbnails');

    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));

    // register_nav_menu();
    register_nav_menus(array(
        'primary' => 'Theme header Primary Menu',
    ));
});



/*
    ==================================
        BLOG LOOP CUSTOM FUNCTIONS
    ==================================
*/

function sunset_post_meta() {
    $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));

    $categories = get_the_category();

    $outputCategories = '';
    $i = 1;

    if(!empty($categories)){            
        foreach($categories as $category){
            if($i > 1) $outputCategories .= ', '; 

            $outputCategories .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr('View all posts in %s', $category->name) . '" >' . esc_html($category->name) . '</a>';

            $i++;
        }
    }

    return '<span class="posted-on">posted <a href="' . esc_url(get_the_permalink()) . '">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $outputCategories . '</span>';
}


function sunset_get_attachment($n = 1){

    $output = null;

    if(has_post_thumbnail() && $n == 1){
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    }else {
        $attachments = get_posts(array(
            'post_type'         => 'attachment',
            'posts_per_page'    => $n,
            'post_parent'       => get_the_ID()
        ));

        if($attachments){
            $output = $n == 1 ? wp_get_attachment_url($attachments[0]->ID) : $attachments ;
        }
    }

    wp_reset_postdata();
    
    return $output;
}

function sunset_get_embeded_mdeia($arr = array()){
    // $content = do_shortcode(apply_filters('the_content', $post->post_content));
    $content = do_shortcode(apply_filters('the_content', get_the_content()));

    $embed = get_media_embedded_in_content($content, $arr);

    if(array_key_exists(0, $embed)){
        return $embed[0];
    }

    return null;
}


add_filter('the_content', function($content){

    // add share buttons

    if(!is_single()){
        return $content;
    }

    $message = 'Hey Read This: ' . get_the_title();
    $permal_link = get_the_permalink();
    $twitter_handler = get_option('twitter_username') ? esc_attr(get_option('twitter_username')) : '';
    
    $twitter = 'https://twitter.com/intent/tweet?text=' . $message . '&amp;url=' . $permal_link . '&amp;via=' . $twitter_handler;
    $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permal_link;
    $google = 'https://plus.google.com/share?u=' . $permal_link;
    
    $content .= '
        <div class="sunset-share">
            <h4>share</h4>
            <ul>
                <li><a href="<?= ' . $twitter . '; ?>" target="_blank" rel="nofollow">twitter</a></li>
                <li><a href="<?= ' . $facebook . '; ?>" target="_blank" rel="nofollow">facebook</a></li>
                <li><a href="<?= ' . $google . '; ?>" target="_blank" rel="nofollow">google +</a></li>
            </ul>
        </div>
    ';

    return $content;
});