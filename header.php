<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container header-inner reveal-in-row">
            <div class="site-logo in-row">
                <?php if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else { ?><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><?php } ?>
            </div>
            <nav class="main-nav in-row">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => false, // wyłączamy WordPressowy fallback, wstawiamy swój
                ));
                ?>
            </nav>
            <div class="header-cta in-row">
                <a href="#contact" class="btn"><?php echo get_theme_mod('hero_btn1', 'Skontaktuj się'); ?></a>
            </div>
        </div>
    </header>