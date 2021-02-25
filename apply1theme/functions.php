<?php

add_action('wp_enqueue_scripts', function() {
    $ver = wp_get_theme()->get('Version');

    // style
    wp_enqueue_style('css-style', get_theme_file_uri('assets/css/templatemo-style.css'), array(), $ver, 'all');
    wp_enqueue_style('css-style', get_stylesheet_uri(), array(), $ver, 'all');
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Open+Sans:400', array(), false, 'all');

    //scripts
    wp_enqueue_script('jQuery', get_theme_file_uri('assets/js/jquery.min.js'), array(), false, true);
    wp_enqueue_script('parallax', get_theme_file_uri('assets/js/parallax.min.js'), array('jQuery'), false, true);

});


add_action('after_setup_theme', function() {
    // import the nav walker
    require_once(get_theme_file_path('inc/walker.php'));

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array( 'aside', 'gallery', 'link ', 'image', 'quote', 'status', 'video', 'audio', 'chat' ));

    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'secondary' => 'Secondary Menu'
    ));

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false, 
    ));
});



add_filter('the_generator', function(){
    return '';
});



add_action('widgets_init', function(){

    register_sidebar(array(
        'name' => 'main sidebar',
        'id' => 'sidebar-1',
        'class' => 'main-sidevar',
        'before_widget' => '<small>',
        'after_widget' => '</small>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

});



add_action('init', function(){

    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolios',
            'singular_name ' => 'portfolio',
            'add_new ' => 'Add Items',
            'all_items ' => 'All Items',
            'add_new_item' => 'Add Portfolio',
            'edit_item' => 'Edit Item',
            'new_item' => 'New Item',
            'view_item' => 'View Item',
            'search_items' => 'Search Items',
            'not_found' => 'No items found',
            'not_found_in_trash' => 'No items found in trash',
            'parent_item_colon' => 'Parent Item',
            'item_scheduled ' => 'Item Scheduled',
            'item_updated ' => 'Item Updated',
        ),
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'menu_position' => 5,
        'query_var' => true,
        'rewrite' => true,
        'taxonomies' => array('category', 'post_tag', 'menu_postion'),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
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
});


/**
 * Load Custom Comments Layout file.
 */
## require get_template_directory() . '/inc/comments-helper.php';


/*

function custom_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

*/