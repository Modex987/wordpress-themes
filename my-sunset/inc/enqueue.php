<?php

/*
@package My-Sunset

    ===========================
      ADMIN enqueue functions
    ===========================
*/

$ver = wp_get_theme()->get('Version');

add_action('admin_enqueue_scripts', function ($hook) use ($ver) {

    wp_register_style('sunset-admin-style', get_template_directory_uri() . '/asset/css/sunset-admin.css', array(), $ver, 'all');
    wp_register_style('ace', get_template_directory_uri() . '/asset/css/sunset-ace.css', array(), '1.4.12', 'all');
    
    wp_register_script('sunset-admin-script', get_template_directory_uri() . '/asset/js/sunset.admin.js', array('jquery'), $ver, true);
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



/*
@package My-Sunset

    ================================
      FRONT-END enqueue functions
    ================================
*/

add_action('wp_enqueue_scripts', function() use ($ver) {
    
    wp_enqueue_style('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css", array(), '4.6.0', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/asset/css/sunset.css', array(), $ver, 'all');
    
    wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
    wp_deregister_style('wp-block-library');
    
    wp_enqueue_script('jQuery', "https://code.jquery.com/jquery-3.5.1.slim.min.js", array(), '3.5.1', true);
    wp_enqueue_script('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js", array('jQuery'), '4.6.0', true);
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/asset/js/sunset.js', array(), $ver, true);

    wp_localize_script(
        'theme-script',
        'loader',
        array(
            // 'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_url' => "/wp-admin/admin-ajax.php",
            'action' => "load_more_action",
            'nonce' => wp_create_nonce('_loader_nonce')
        )
    );
});