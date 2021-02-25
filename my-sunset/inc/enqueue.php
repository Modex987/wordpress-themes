<?php

/*
@package My-Sunset

    ===========================
      Admin enqueue functions
    ===========================
*/

$ver = wp_get_theme()->get('Version');

add_action('admin_enqueue_scripts', function ($hook) use ($ver) {

    wp_register_style('sunset-admin-style', get_template_directory_uri() . '/asset/css/sunset.admin.css', array(), $ver, 'all');
    
    wp_register_script('sunset-admin-script', get_template_directory_uri() . '/asset/js/sunset.admin.js', array('jquery'), $ver, true);

    wp_register_style('ace', get_template_directory_uri() . '/asset/css/sunset.ace.css', array(), '1.4.12', 'all');
    wp_register_script('ace', get_template_directory_uri() . '/asset/js/ace/src-noconflict/ace.js', array('jquery'), '1.4.12', true);
    wp_register_script('custom-css-script_ace', get_template_directory_uri() . '/asset/js/custom-css.js', array('ace'), '1.4.12', true);

    if ($hook == 'toplevel_page_sunset_options' || $hook == 'sunset_page_sunset-theme-settings') {
    
        wp_enqueue_style('sunset-admin-style');
        wp_enqueue_media();
        wp_enqueue_script('sunset-admin-script');

    } elseif ($hook == 'sunset_page_edit_css'){
        wp_enqueue_style('ace');
        
        wp_enqueue_script('ace');
        wp_enqueue_script('custom-css-script_ace');
    }

});