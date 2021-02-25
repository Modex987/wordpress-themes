<?php

function load_resources(){
    wp_enqueue_style("fonts", "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style('font awsome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style('site styles', get_stylesheet_uri(  ));

    wp_enqueue_script('main javascript', get_theme_file_uri('/js/scripts-bundled.js'), null, '0.1', true);
}

function site_features(){
    add_theme_support('title-tag');
}



add_action('wp_enqueue_scripts', 'load_resources');
add_action('after_setup_theme', 'site_features');