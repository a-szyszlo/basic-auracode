<?php
// Customizer assets (toolbar, trumbowyg, styles)

if (!function_exists('auracode_customizer_toolbar_assets')) {
    function auracode_customizer_toolbar_assets()
    {
        wp_enqueue_script('customizer-toolbar', get_template_directory_uri() . '/assets/js/customizer-toolbar.js', array('jquery', 'customize-controls'), false, true);
        wp_enqueue_style('customizer-toolbar-style', get_template_directory_uri() . '/assets/css/customizer-toolbar.css');
    }
}
add_action('customize_controls_enqueue_scripts', 'auracode_customizer_toolbar_assets');

if (!function_exists('auracode_enqueue_trumbowyg')) {
    function auracode_enqueue_trumbowyg()
    {
        $path = get_template_directory_uri() . '/assets/trumbowyg/';

        wp_enqueue_style('trumbowyg', $path . 'trumbowyg.min.css');

        wp_enqueue_script('trumbowyg', $path . 'trumbowyg.min.js', array('jquery'), null, true);
        wp_enqueue_script('trumbowyg-plugin-link', $path . 'plugins/link/trumbowyg.link.min.js', array('trumbowyg'), null, true);
        wp_enqueue_script('trumbowyg-plugin-fontsize', $path . 'plugins/fontsize/trumbowyg.fontsize.min.js', array('trumbowyg'), null, true);
        wp_enqueue_script('trumbowyg-plugin-cleanpaste', $path . 'plugins/cleanpaste/trumbowyg.cleanpaste.min.js', array('trumbowyg'), null, true);

        $custom_trumbo = get_template_directory() . '/js/customizer-trumbowyg.js';
        if (file_exists($custom_trumbo)) {
            wp_enqueue_script('auracode-customizer-trumbowyg', get_template_directory_uri() . '/js/customizer-trumbowyg.js', array('jquery', 'customize-controls', 'trumbowyg'), null, true);
        }
    }
}
add_action('customize_controls_enqueue_scripts', 'auracode_enqueue_trumbowyg');

if (!function_exists('auracode_customizer_styles')) {
    function auracode_customizer_styles()
    {
        wp_enqueue_style(
            'auracode-customizer-style',
            get_template_directory_uri() . '/css/customizer.css',
            array(),
            filemtime(get_template_directory() . '/css/customizer.css')
        );
    }
}
add_action('customize_controls_enqueue_scripts', 'auracode_customizer_styles');
