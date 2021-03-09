
<?php
    /**
     * This template is for the header
     * 
     * @package sunset_Theme
     */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="description" content="<?php bloginfo('z'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php if(is_singular() && pings_open(get_queried_object())): ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>

        <title><?php bloginfo('title') . wp_title('||'); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> >

        <div class="sunset-sidebar hidden">
        <!-- <div class="sunset-sidebar hidden"> -->
            <a class="js-toggle-sidebar" href="javascript:void(0)">&times;</a>

            <div class="sidebar-scroll">
                <?php get_sidebar(); ?>
            </div>
        </div>

        <div class="sidebar-overlay hidden"></div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <header class="header-container text-center" style="background-image: url(<?php header_image(); ?>);">
                        <div class="header-content table">

                            <a class="js-toggle-sidebar" href="javascript:void(0)">&#9776;</a>

                            <div class="table-cell">
                                <?php if(has_custom_logo()): ?>
                                    <div>
                                        <?php
                                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                        ?>
                                        <img src="<?php echo $logo[0]; ?>" width="100" height="100">
                                    </div>
                                <?php endif; ?>
                                <h1 class="site-title"><span><?php bloginfo('name'); ?></span></h1>
                                <h4 class="site-description"><span><?php bloginfo('description'); ?></span></h4>
                            </div>
                        </div>

                        <nav>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav nav-bar',
                                    'menu_id' => 'header-nav',
                                    'walker' => new Walker_Nav_Primary(),
                                ));
                            ?>
                        </nav>
                    </header>
                </div>
            </div>