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

    // register_nav_menu();
    register_nav_menus(array(
        'primary' => 'Theme header Primary Menu',
    ));
});