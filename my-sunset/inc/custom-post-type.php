<?php

/*
@package Sunset

    ===========================
       THEME CUSTOM POSTS
    ===========================
*/

add_action('init', function(){

    // CONTACT CPT
    $activate_form = get_option('activate_form');

    if (!empty($activate_form)) {

        register_post_type('message', array(
            'labels'                => array(
                'name'              => 'Messages',
                'singular_name'     => 'Message',
                'menu_name'         => 'Messages',
                'name_admin_bar'    => 'Messages',
            ),
            'show_ui'           => true,
            'show_in_menu'      => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'menu_position'     => 26,
            'menu_icon'         => 'dashicons-buddicons-pm',
            'supports'          => array('title', 'editor',),
        ));

        // Create Custom Columns form message(post)
        add_filter('manage_message_posts_columns', function($columns){ # manage_{yourcustomposttype}_posts_columns
            $new_columns = array();

            $new_columns['title'] = 'Full Name';
            $new_columns['message'] = 'Message';
            $new_columns['email'] = 'E-mail';
            $new_columns['date'] = 'Sent at';
            
            return $new_columns;
        });

        // edit message(post) columns
        add_action('manage_message_posts_custom_column', function($column, $post_id){ # manage_{yourcustomposttype}_posts_custom_column
            switch ($column) {
                case 'message':
                    echo get_the_excerpt();
                    break;

                case 'email':
                    $email = get_post_meta($post_id, '_contact_email_meta_key', true);
                    echo '<a href="mailto:' . $email . '" >' . $email . '</a>';
                    break;

                case 'date':
                    // echo 'sent at: ' . the_date();
                    echo 'eeeeeee';
                    break;
            }
        }, 10, 2);

        
        /**
         * 
         * Contact meta box
         */
        add_action('add_meta_boxes', function () {

            add_meta_box(
                'contact-email',
                'User E-mail',
                function ($post) {
                    wp_nonce_field('contact_email_nonce_action', '_contact_email_metabox_nonce'); # CSRF

                    $value = get_post_meta($post->ID, '_contact_email_meta_key', true);
                    echo '<label for="contact_email" ><b>User E-mail Adress </b></label>';
                    echo '<input type="email" id="contact_email" name="contact_email_field" value="' . esc_attr($value) . '" >';
                },
                'message',
                'side',
                'core'
            );

        });

        add_action('save_post', function ($post_id) {
            if(!isset($_POST['_contact_email_metabox_nonce'])){
                return;
            }

            if(!wp_verify_nonce( $_POST['_contact_email_metabox_nonce'], 'contact_email_nonce_action')){
                return;
            }

            if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
                return;
            }

            if(!current_user_can('edit_post', $post_id)) {
                return;
            }

            if(!isset($_POST['contact_email_field'])) {
                return;
            }
            
            $email = sanitize_text_field($_POST['contact_email_field']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return;
            }

            update_post_meta($post_id, '_contact_email_meta_key', $email);
        });
    }
});