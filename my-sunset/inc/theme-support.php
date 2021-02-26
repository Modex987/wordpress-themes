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
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    ));

    add_theme_support('post-thumbnails');

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





