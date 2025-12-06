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
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($logo = get_theme_mod('footer_logo')): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="Logo" />
                    <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-logo.png" alt="Logo" />
                    <?php endif; ?>
                </a>
            </div>
            <nav class="main-nav in-row" id="primary-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => false, // wyłączamy WordPressowy fallback, wstawiamy swój
                ));
                ?>
            </nav>
            <button class="mobile-nav-toggle" aria-label="Otwórz menu">
                <svg class="icon" width="24" height="24" aria-hidden="true"><use href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite-icons.svg#bars-3"></use></svg>
            </button>
            <div class="header-cta in-row">
                <a href="#contact" class="btn"><?php echo get_theme_mod('hero_btn1', 'Skontaktuj się'); ?></a>
            </div>
        </div>

        <div class="mobile-drawer" aria-hidden="true">
            <div class="mobile-drawer-inner">
                <button class="mobile-nav-close" aria-label="Zamknij menu">
                    <svg class="icon" width="24" height="24" aria-hidden="true"><use href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite-icons.svg#x-mark"></use></svg>
                </button>
                <!-- Primary nav will be moved here on mobile -->
                <div id="mobile-nav-mount"></div>
            </div>
            <div class="mobile-drawer-backdrop"></div>
        </div>
    </header>