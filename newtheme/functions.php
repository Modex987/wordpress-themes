<?php

$ver = wp_get_theme()->get('Version');

add_action('wp_enqueue_scripts', function() use ($ver) {

    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/style.css', array(), '1.0');
    wp_enqueue_style('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('theme-styles', get_stylesheet_uri(), array('bootstrap'), $ver);
    wp_enqueue_style('font-awsome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '/5.13.0', 'all');
});


add_action('wp_enqueue_scripts', function() use ($ver) {

    wp_enqueue_script("jQuery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', $ver, true);
    wp_enqueue_script("popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array('popper', 'jQuery'), '4.4.1', true);
    wp_enqueue_script("theme-scripts", get_theme_file_uri("/assets/js/main.js"), array('bootstrap', 'jQuery'), $ver, true);
});


add_action('after_setup_theme', function(){
    $location = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menue Items",
    );

    register_nav_menus($location);

    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
});

add_action('wp_head', function(){
    echo '<link rel="shortcut icon" type="image/x-icon" href=' . get_theme_file_uri('/assets/favicon.ico') . ' />' . "\n";
});


// add_action('init', function(){
//     $location = array(
//         'primary' => "Desktop Primary Left Sidebar",
//         'footer' => "Footer Menue Items",
//     );

//     register_nav_menus($location);
// });


add_action('widgets_init', function(){
    register_sidebar(
        array(
            'before_title' => '<small>',
            'after_title' => '</small>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<small>',
            'after_title' => '</small>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer area',
            'id' => 'sidebar-2',
            'description' => 'Sidebar Widget Area'
        )
    );
});