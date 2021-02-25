<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('title') . wp_title('||'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>
    </head>

    <?php
        $classes = array('container');

        if(is_home()){
            $classes[] = 'homeclass';
        }else{
            $classes[] = 'otherclass';
        }
    ?>

    <body <?php body_class($classes) ?>>

        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="<?= get_site_url(); ?>">Navbar</a>

                    <?php
                        // wp_nav_menu( array(
                        //     'theme_location'    => 'primary',
                        //     'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        //     'container'         => 'div',
                        //     'container_class'   => 'collapse navbar-collapse',
                        //     'container_id'      => 'primary-nav',
                        //     'menu_class'        => 'nav navbar-nav',
                        //     'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        //     'walker'            => new WP_Bootstrap_Navwalker(),
                        // ) );

                        wp_nav_menu(array(
                            'theme_location'    => 'primary',
                            'depth'             => 5,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'primary-nav',
                            'menu_class'        => 'navbar-nav mr-auto',
                            'walker'         => new Walker_Nav_Primary(),
                        ));
                    ?>

                </div>
            </nav>
        </header>

        <div class="container">