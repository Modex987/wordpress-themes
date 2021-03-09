<?php

class Sunset_Profile_Widget extends WP_Widget
{
    // setup widget name, description, etc...
    public function __construct()
    {
        parent::__construct('sunset_profile', 'Sunset Profile', array(
            'classname' => 'profile-widget',
            'description' => 'Custom Sunset Profile Widget'
        ));
    }

    // widget logic
    public function form($instance)
    {
        echo '<p><strong>No options for this Widget!</strong> you can control widget fields <a href="/wp-admin/admin.php?page=sunset_options">here</a></p>';
    }

    // widget markup
    public function widget($args, $instance)
    {
        $profile_url = get_option('profile_img') ? get_option('profile_img') : get_theme_file_uri('asset/img/profile.jpg') ;


        
        echo $args['before_widget'];

        // echo $args['before_title'];
        // echo 'Admin Profile';
        // echo $args['after_title'];
            ?>
                <div class="profile">
                    <div id="profile_img" style="background-image: url(<?= $profile_url ?>);"></div>
                    <h2 class="fullname"><?= get_option('first_name') . ' ' . get_option('last_name'); ?></h2>
                    <p class="description"><?= get_option('user_description'); ?></p>
                </div>
            <?php
        echo $args['after_widget'];
    }
}


// ***************************************** CUSTOM WIDGET ***************************************** \\

// register_post_meta('post', $post_view_meta_key, array(
//     'default' => 0,
//     'single' => true,
//     'type' => 'number',
// ));

function get_the_views(){
    return get_post_meta(get_the_ID(), 'sunset_post_views', true);
}

function increase_post_views_count ($post_id) {
    $key = 'sunset_post_views';

    $views = get_post_meta($post_id, $key, true);

    update_post_meta($post_id, $key, ++$views);
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



class Sunset_Popular_Posts_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('sunset_popular_posts', 'Susnet Popular Posts', array(
            'classname' => 'popular-post-widget',
            'description' => 'Popular Posts Widget'
        ));
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'Popular Posts';
        $total = !empty($instance['total']) ? $instance['total'] : 4 ;

        $output = '<p>';
        $output .= '<label for="' . esc_attr($this->get_field_id('title')) . '" >Title:</label>';
        $output .= '<input type="text" name="' . esc_attr($this->get_field_name('title')) . '" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" value="' . esc_attr($title) . '" >';
        $output .= '</p>';

        $output .= '<p>';
        $output .= '<label for="' . esc_attr($this->get_field_id('total')) . '" >Number Of Posts:</label>';
        $output .= '<input type="number" name="' . esc_attr($this->get_field_name('total')) . '" class="widefat" id="' . esc_attr($this->get_field_id('total')) . '" value="' . esc_attr($total) . '" >';
        $output .= '</p>';

        echo $output;
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['total'] = !empty($new_instance['total']) ? absint(strip_tags($new_instance['total'])) : 0;

        return $instance;
    }

    public function widget($args, $instance)
    {
        $total = absint($instance['total']);

        $posts_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $total,
            'meta_key' => 'sunset_post_views',
            'orderby' => 'meta_key_num',
            'order' => 'DESC',
        ));

        echo $args['before_widget'];
        if(!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        if($posts_query->have_posts()){
            echo '<ul>';

            while($posts_query->have_posts()){
                $posts_query->the_post();

                echo '<li>' . get_the_title() . ' (' . get_the_views() . ')</li>';
            }

            echo '</ul>';
        }
        echo $args['after_widget'];
    }
}

// ***************************************** CUSTOM WIDGET ***************************************** \\

add_action('widgets_init', function() {
    register_widget('Sunset_Profile_Widget');
    register_widget('Sunset_Popular_Posts_Widget');
});

add_filter('widget_tag_cloud_args', function($args) {
    $args['smallest'] = 8;
    $args['largest'] = 18;

    return $args;
});

add_filter('wp_list_categories', function($links){
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);

    return $links;
});