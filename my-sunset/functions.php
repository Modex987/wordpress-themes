<?php

// add_action('init', function(){
//     apply_filters('excerpt_length', function($length) {
//         return 4;
//     }, 999 );
// });

// add_filter( 'excerpt_length', function($length) {
//     return 5;
// } );

/**
 * Limit excerpt to a number of characters
 *
 * @param string $excerpt
 * @return string
 */
// add_filter('the_excerpt', function ($excerpt){
//     return substr($excerpt, 0, 100);
// });


define('DOMAIN', 'sunset_theme');


require_once(get_template_directory() . '/inc/cleanup.php');

require_once(get_template_directory() . '/inc/function-admin.php');

require_once(get_template_directory() . '/inc/enqueue.php');

require_once(get_template_directory() . '/inc/theme-support.php');

require_once(get_template_directory() . '/inc/custom-post-type.php');

require_once(get_template_directory() . '/inc/walker.php');

require_once(get_template_directory() . '/inc/ajax.php');

require_once(get_template_directory() . '/inc/shortcodes.php');

require_once(get_template_directory() . '/inc/widgets.php');
