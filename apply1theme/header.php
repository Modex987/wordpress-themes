<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="<?php bloginfo('description') ?>">
    <title>S<?php bloginfo('title') . wp_title('|'); ?></title>
    
    <?php wp_head(); ?>
</head>



<body> 
    <div class="container">

        <!-- Logo & Site Name -->
		<div class="placeholder">

			<div class="parallax-window" data-parallax="scroll" data-image-src="<?php bloginfo('template_url'); ?>/assets/img/simple-house-01.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
                            <?php
                                the_custom_logo();
                            ?>
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">
                                    <?php bloginfo('title'); ?>
                                </h1>
								<h6 class="tm-site-description"><?php bloginfo('description'); ?></h6>	
							</div>
						</div>

                        <!-- nav -->
						<nav class="col-md-6 col-12 tm-nav">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'     => 'primary',
                                    'depth'              => 5,
                                    'container'          => false,
                                    'menu_class'         => 'tm-nav-ul',
                                    'item_spacing'       => 'discard',
                                    'walker'             => new Primary_Nav_Walker()
                                ));
                            ?>
						</nav>

					</div>
				</div>
			</div>
        </div>
        

        <div class="tm-gallery-page">
            <?php get_sidebar(); ?>
            
            <div class="">

