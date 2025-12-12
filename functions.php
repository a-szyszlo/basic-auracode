<?php

// Basic theme setup
function auracode_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'auracode_theme_setup');


// Enqueue styles and scripts
function auracode_enqueue()
{
    wp_enqueue_style('auracode-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('auracode-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('auracode-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array('jquery', 'customize-controls'), null, true);
}
add_action('wp_enqueue_scripts', 'auracode_enqueue');
add_action('customize_controls_enqueue_scripts', 'auracode_enqueue');

function hex2rgba($hex, $alpha = 0.8)
{
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) === 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    return "rgba($r, $g, $b, $alpha)";
}
// =========================
//  Customizer Text Editor Toolbar
// =========================
// loaded from inc/customizer/assets.php


// loaded from inc/customizer/assets.php

// Customizer fields
/* Customizer sections moved to inc/customizer/register.php */
// loaded from inc/customizer/sections/*.php and inc/customizer/partials.php

function auracode_enqueue_google_fonts()
{
    $font_heading = get_theme_mod('font_heading', 'Playfair Display');
    $font_body = get_theme_mod('font_body', 'Nunito');

    $fonts = array_unique([$font_heading, $font_body]);

    $fonts_query_parts = [];
    foreach ($fonts as $font) {
        $fonts_query_parts[] = 'family=' . str_replace(' ', '+', $font) . ':wght@300;400;600;700';
    }
    $fonts_query = implode('&', $fonts_query_parts);

    $fonts_url = "https://fonts.googleapis.com/css2?$fonts_query&display=swap";

    wp_enqueue_style(
        'auracode-google-fonts',
        esc_url($fonts_url),
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'auracode_enqueue_google_fonts');
// Output dynamic CSS for brand color
function auracode_customizer_css()
{ ?>
    <style>
        :root {
            --brand-color: <?php echo esc_html(get_theme_mod('brand_color', '#bc6d61')); ?>;
            --color-bg: <?php echo esc_html(get_theme_mod('color_bg', '#ffffff')); ?>;
            --color-text: <?php echo esc_html(get_theme_mod('color_text', '#3f3f3f')); ?>;
            --color-secondary: <?php echo esc_html(get_theme_mod('color_secondary', '#3c463d')); ?>;
            --color-bg-header: <?php echo hex2rgba(get_theme_mod('color_bg_header', '#f7f7f7'), 0.80); ?>;
            --color-bg-footer: <?php echo esc_html(get_theme_mod('color_bg_footer', '#f4f4f4ff')); ?>;
            --font-heading: '<?php echo esc_html(get_theme_mod('font_heading', 'Merriweather')); ?>', sans-serif;
            --font-body: '<?php echo esc_html(get_theme_mod('font_body', 'Lato')); ?>', sans-serif;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-body);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
        }

        h2 {
            font-size: 2.2rem;
        }

        .btn-primary {
            background: var(--color-primary);
            color: #fff;
        }

        .btn-secondary {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }
    </style>
<?php }
add_action('wp_head', 'auracode_customizer_css');

function auracode_output_seo_meta()
{
    $title = get_theme_mod('seo_title');
    $desc = get_theme_mod('seo_desc');
    $keywords = get_theme_mod('seo_keywords');
    $schema = get_theme_mod('seo_schema');

    if ($title) echo '<title>' . esc_html($title) . '</title>';
    if ($desc) echo '<meta name="description" content="' . esc_attr($desc) . '">';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">';
    if ($schema) echo '<script type="application/ld+json">' . wp_kses_post($schema) . '</script>';
}
add_action('wp_head', 'auracode_output_seo_meta');



// --- REJESTRACJA MENU (header + footer) ---
function simpletheme_register_menus()
{
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'simpletheme'),
        'footer_menu' => __('Footer Menu', 'simpletheme'),
    ));
}
add_action('after_setup_theme', 'simpletheme_register_menus');


// --- AUTOMATYCZNE TWORZENIE OBU MENU ---
function simpletheme_create_default_menus()
{

    /* ----------------------------------
       HEADER MENU 
    ----------------------------------- */
    $header_menu = 'Header Menu';
    if (!wp_get_nav_menu_object($header_menu)) {

        $menu_id = wp_create_nav_menu($header_menu);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'O mnie',
            'menu-item-url'   => home_url('/#about'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'Usługi',
            'menu-item-url'   => home_url('/#services'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => 'Kontakt',
            'menu-item-url'   => home_url('/#contact'),
            'menu-item-status' => 'publish',
        ]);

        // przypisanie lokalizacji
        $locations = get_theme_mod('nav_menu_locations');
        $locations['header_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }


    /* ----------------------------------
       FOOTER MENU 
    ----------------------------------- */
    $footer_menu = 'Footer Menu';
    if (!wp_get_nav_menu_object($footer_menu)) {

        $menu_id_footer = wp_create_nav_menu($footer_menu);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Polityka prywatności',
            'menu-item-url'   => home_url('/polityka-prywatnosci'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Regulamin',
            'menu-item-url'   => home_url('/regulamin'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id_footer, 0, [
            'menu-item-title' => 'Kontakt',
            'menu-item-url'   => home_url('/#contact'),
            'menu-item-status' => 'publish',
        ]);

        // przypisanie do lokalizacji
        $locations = get_theme_mod('nav_menu_locations');
        $locations['footer_menu'] = $menu_id_footer;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'simpletheme_create_default_menus');

// =========================
//  Customizer modular includes
// =========================
require_once get_template_directory() . '/inc/customizer/assets.php';
require_once get_template_directory() . '/inc/customizer/register.php';
require_once get_template_directory() . '/inc/customizer/defaults.php';
