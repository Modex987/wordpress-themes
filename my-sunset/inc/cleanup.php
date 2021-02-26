<?php

/**
 * This template is for the footer
 * 
 * @package sunset_Theme
 */

function remove_wpver_from_src ($src){

    global $wp_version;

    parse_str(parse_url($src, PHP_URL_QUERY), $qeury);

    if(!empty($qeury['ver']) && $qeury['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }

    return $src;
}


add_filter('script_loader_src', 'remove_wpver_from_src');
add_filter('style_loader_src', 'remove_wpver_from_src');

// remove generator meta tag
add_filter('the_generator', function() {
    return '';
});