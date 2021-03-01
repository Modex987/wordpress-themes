<?php

/*
@package My-Sunset

    ===========================
            Admin Page
    ===========================
*/



// pages markup
function sunset_page_markup() {
    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function theme_settings_markup() {
    require_once(get_template_directory() . '/inc/templates/sunset-theme-support.php');
}

function contact_options_markup() {
    require_once(get_template_directory() . '/inc/templates/sunset-contact-form.php');
}

function edit_css_markup() {
    require_once(get_template_directory() . '/inc/templates/sunset-custom-css.php');
}


// *********************************************************************************************************************************

// sections markup
function sidebar_section_markup() {
    echo '<p>Customize Sidebar Infos</p>';
}


// *********************************************************************************************************************************

// field markup
function profile_img_markup() {
    $profile_img = get_option('profile_img');

    if (empty($profile_img)) {
        echo '<input type="hidden" id="profile-img-url" name="profile_img" value="' . $profile_img . '" >';
        echo '<input type="button" id="upload-btn" value="Upload Picture" >';
        echo '<input type="button" id="del-profile-btn" value="Delete Profile" class="hidden">';
    } else {
        echo '<input type="hidden" id="profile-img-url" name="profile_img" value="' . $profile_img . '" >';
        echo '<input type="button" id="upload-btn" value="Change Picture" >';
        echo '<input type="button" id="del-profile-btn" value="Delete Profile" >';
    }

    echo '<p class="hidden" id="savechanges">please save changes</p>';

}

function first_name_markup() {
    $first_name = get_option('first_name');
    echo '<input class="regular-text" type="text" name="first_name" value="' . $first_name . '" placeholder="First Name">';
}

function last_name_markup() {
    $last_name = get_option('last_name');
    echo '<input class="regular-text" type="text" name="last_name" value="' . $last_name . '" placeholder="Last Name">';
}

function twitter_username_markup() {
    $twitter_username = get_option('twitter_username');
    echo '<input class="regular-text" type="text" name="twitter_username" value="' . $twitter_username . '" placeholder="Twitter Username">';
    echo '<p>enter your username without @ charachter';
}

function facebook_markup() {
    $facebook = get_option('facebook');
    echo '<input class="regular-text" type="text" name="facebook" value="' . $facebook . '" placeholder="Facebook">';
}

function user_description_markup() {
    $user_description = get_option('user_description');
    echo '<textarea class="regular-text" name="user_description" placeholder="User Description" rows="3">' . $user_description . '</textarea>';
}

function post_formats_markup() {
    $formats = array( 'aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio');

    foreach($formats as $format) {
        $post_formats = get_option('post_formats');

        $checked = is_array($post_formats) && array_key_exists($format, $post_formats) ? 'checked' : '';
        // $checked = (@$post_formats[$format] == 1) ? 'checked' : '';
        // $checked = (isset($post_formats[$format]) && $post_formats[$format] == 1) ? 'checked' : '';

        echo '<label class="post-format" for="' . $format . '">';
        echo '<input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . '>';
        echo  $format . '</label>';
    }
}

function custom_header_markup(){
    $custom_header = get_option('custom_header');
    echo '<label for="custom_header" >';
    $checked = $custom_header == 1 ? 'checked' : '';
    echo '<input ' . $checked . ' type="checkbox" id="custom_header" name="custom_header" value="1" >Activate the custom header</label>';
}


function custom_background_markup(){
    $custom_background = get_option('custom_background');
    echo '<label for="custom_background" >';
    $checked = $custom_background == 1 ? 'checked' : '';
    echo '<input ' . $checked . ' type="checkbox" id="custom_background" name="custom_background" value="1" >Activate the custom Background</label>';
}


function activate_form_markup(){
    $activate_form = get_option('activate_form');

    $checked = $activate_form ? 'checked' : '';

    echo '<label for="activate_form" >';
    echo '<input type="checkbox" ' . $checked . ' name="activate_form" id="activate_form" value="1" >Activate Contact Form</label>';
}


function custom_css_markup(){
    $custom_css = empty(get_option('custom_css')) ? '/* Sunset THEME Custom Css */' : get_option('custom_css');

    echo '<div id="customCss" >' . $custom_css . '</div>';

    echo '<textarea id="custom_css" name="custom_css" style="display:none; visibility: hidden;">' . $custom_css . '</textarea>';
}




// *********************************************************************************************************************************

// sanitize
function sanitize_twitter_username($twitter_username) {
    return str_replace('@', '', sanitize_text_field($twitter_username));
}

function sanitize_custom_css($css) {
    return esc_textarea($css);
}

// *********************************************************************************************************************************



add_action('admin_menu', function(){

    add_menu_page(
        'Sunset Options',
        'Sunset',
        'manage_options',
        'sunset_options',
        'sunset_page_markup',
        'dashicons-shield-alt',
        110
    );

    add_submenu_page(
        'sunset_options',
        'Sunset Sidebar Options',
        'General',
        'manage_options',
        'sunset_options',
        'sunset_page_markup'
    );

    add_submenu_page(
        'sunset_options',
        'Sunset Theme Settings',
        'Settings',
        'manage_options',
        'sunset-theme-settings',
        'theme_settings_markup'
    );

    add_submenu_page(
        'sunset_options',
        'Contact Options',
        'Contact Options',
        'manage_options',
        'contact_options_page',
        'contact_options_markup'
    );

    add_submenu_page(
        'sunset_options',
        'Edit Css',
        'Edit CSS',
        'manage_options',
        'edit_css',
        'edit_css_markup'
    );

    // Custom Settings
    add_action('admin_init', function() {

        //group 1
        register_setting('sunset-settings-group', 'profile_img');
        register_setting('sunset-settings-group', 'first_name');
        register_setting('sunset-settings-group', 'last_name');
        register_setting('sunset-settings-group', 'twitter_username', 'sanitize_twitter_username');
        register_setting('sunset-settings-group', 'facebook');
        register_setting('sunset-settings-group', 'user_description');

        add_settings_section('sidebar-section', 'Sidebar Options', 'sidebar_section_markup', 'sunset_options');

        add_settings_field('profile-img', 'Profile Image', 'profile_img_markup', 'sunset_options', 'sidebar-section');
        add_settings_field('first-name', 'First Name', 'first_name_markup', 'sunset_options', 'sidebar-section');
        add_settings_field('last-name', 'Last Name', 'last_name_markup', 'sunset_options', 'sidebar-section');
        add_settings_field('twitter-username', 'Twitter Username', 'twitter_username_markup', 'sunset_options', 'sidebar-section');
        add_settings_field('facebook', 'Facebook Link', 'facebook_markup', 'sunset_options', 'sidebar-section');
        add_settings_field('user-description', 'User Description', 'user_description_markup', 'sunset_options', 'sidebar-section');


        //group 2
        register_setting('susnet-theme-support', 'post_formats');
        register_setting('susnet-theme-support', 'custom_header');
        register_setting('susnet-theme-support', 'custom_background');

        add_settings_section('theme-options', 'Theme Options', function(){}, 'sunset-theme-settings');

        add_settings_field('post-formats', 'Post Formats', 'post_formats_markup', 'sunset-theme-settings', 'theme-options');
        add_settings_field('custom-header', 'Custom Header', 'custom_header_markup', 'sunset-theme-settings', 'theme-options');
        add_settings_field('custom-background', 'Custom Background', 'custom_background_markup', 'sunset-theme-settings', 'theme-options');


        // Contact Form
        register_setting('contact-options', 'activate_form');

        add_settings_section('contact-section', 'Contact Form', function(){}, 'contact_options_page');
        
        add_settings_field('activate-form', 'Activate Form', 'activate_form_markup', 'contact_options_page', 'contact-section');

        // Custom CSS OPTIONS
        register_setting('custom-css-options', 'custom_css', 'sanitize_custom_css');

        add_settings_section('custom-css-section', 'Edit Theme CSS here', function(){}, 'edit_css');

        add_settings_field('custom-css', 'Customize css', 'custom_css_markup', 'edit_css', 'custom-css-section');
    });

});