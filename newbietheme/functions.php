<?php

/*
    =============================
        Include site assets
    =============================
*/

$ver = wp_get_theme()->get('Version');

add_action('wp_enqueue_scripts', function () use ($ver) {
    // style
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', array(), '4.6.0', 'all');
    wp_enqueue_style('theme-style', get_theme_file_uri('/asset/css/main.css'), array(), $ver, 'all');

    // javascript
    wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1', true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array('jQuery'), '4.6.0', true);
    wp_enqueue_script('theme-script', get_theme_file_uri('/asset/js/main.js'), array(), $ver, true);
});



// 'after_setup_theme' is better than 'init' (might be late)
add_action('after_setup_theme', function() {
    // add_theme_support('menus');
    add_theme_support('html5', array('search-form'));
    // add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('post-formats', array( 'aside', 'gallery', 'link ', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

    register_nav_menus(array(
        'primary' => 'Desctop primary left sidebar',
        'footer' => 'Footer menu items'
    ));
});


/*
    ========================
        generate Sidebar
    ========================
*/

add_action('widgets_init', function() {

    register_sidebar(array(
        'name' => 'main sidebar',
        'id' => 'sidebar-1',
        'class' => 'custom',
        'description' => 'the main sidebar where you can place widgets',
        'before_widget' => '<small id="%1$s" class="widget %2$s">',
        'after_widget' => '</small>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => 'footer sidebar',
        'id' => 'sidebar-2',
        'class' => 'custom',
        'description' => 'the footer sidebar where you can place footer widgets',
        'before_widget' => '<small id="%1$s" class="widget %2$s">',
        'after_widget' => '</small>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

});


/*
    =============================
        Include Walker file
    =============================
*/

add_action( 'after_setup_theme', function () {
    require_once(get_theme_file_path('inc/walker.php'));
	// require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
} );


/*
    =========================================
       remove meta generator tag that shows
       wordpress version because of hackers
    =========================================
*/

add_filter('the_generator', function(){
    return '';
});



/*
    ==============================
        register new post type
    ==============================
*/

add_action('init', function () {

    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add Items',
            'all_items' => 'All Items',
            'add_new_item' => 'Add Item',
            'edit_item' => 'Edit Item',
            'new_item' => 'New Item',
            'view_item' => 'View Item',
            'search_item' => 'Search Portfolio',
            'not_found' => 'No items found',
            'not_found_in_trash' => 'No items found in trash',
            'parent_item_colon' => 'Parent Item',
        ),
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'taxonomies' => array('category', 'post_tag', 'menu_postion'),
        'menu_position' => 5,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-admin-page'
    ));

    register_taxonomy('gener', array('portfolio'), array(
        'labels' => array(
            'name' => 'Geners',
            'singular_name' => 'Gener',
            'search_items' => 'Search Geners',
            'all_items' => 'All Geners',
            'parent_item' => 'Parent Gener',
            'parent_item_colon' => 'Parent Gener:',
            'edit_item' => 'Edit Gener',
            'update_item' => 'Update Gener',
            'add_new_item' => 'Add New Gener',
            'new_item_name' => 'New Gener Name',
            'menu_name' => 'Geners',
            'not_found' => 'No Geners Found',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gener'),
    ));

    register_taxonomy('softweare', 'portfolio', array(
        'label' => 'Software',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'software'),
    ));
});

