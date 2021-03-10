<?php

/**
 *  [tooltip placement="top" title="this is the title"]This is the content[/tooltip]
 */

add_shortcode('tooltip', function($atts, $content = null){

    // get the attributes.
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'title' => '',
        ),
        $atts,
        'tooltip'
    );

    $title = $atts['title'] == '' ? $content : $atts['title'];

    // return html
    return '<span class="sunset-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">
                ' . $content . '
            </span>';

});




/**
 *  [popover placement="top" title="this is the title" trigger="click"]This is the content[/popover]
 */
add_shortcode('popover', function($atts, $content = null){

    // get the attributes.
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'title' => '',
            'trigger' => 'click',
            'content' => 'Default Content',
        ),
        $atts,
        'popover'
    );

    $title = $atts['title'] == '' ? $content : $atts['title'];

    // return html
    return '<button class="btn primary-btn sunset-popover" data-content="' . $atts['content'] . '" data-trigger="' . $atts['trigger'] . '" data-toggle="popover"  data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '">
                ' . $content . '
            </button>';

});


/**
 *  [contact_form]
 */
add_shortcode('contact_form', function($atts, $content = null) {

    // get the attributes.
    $atts = shortcode_atts(
        array(),
        $atts,
        'contact_form'
    );

    // return Markup
    ob_start();
    include 'templates/contact_form.php';

    return ob_get_clean();
});