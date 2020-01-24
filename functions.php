<?php
require_once(get_stylesheet_directory() . '/config/key.php');
// Load theme functions
require_once(get_stylesheet_directory() . '/lib/functions/index.php');
require_once(get_stylesheet_directory() . '/lib/functions/shortcodes.php');

// Register Custom Post Types
require_once(get_stylesheet_directory() . '/lib/cpts/index.php');

// Load theme supports
require_once(get_stylesheet_directory() . '/lib/theme-support.php');

// Adds image upload and color select to WordPress Theme Customizer.
require_once(get_stylesheet_directory() . '/lib/customizer/color.php');
require_once(get_stylesheet_directory() . '/lib/customizer/footer-branding.php');
require_once(get_stylesheet_directory() . '/lib/customizer/socialmedia-channels.php');
require_once(get_stylesheet_directory() . '/lib/customizer/typography.php');

// Load structural scripts
require get_stylesheet_directory() . '/lib/structure/footer.php';
require get_stylesheet_directory() . '/lib/structure/header.php';
require get_stylesheet_directory() . '/lib/structure/loop.php';
require get_stylesheet_directory() . '/lib/structure/menu.php';
require get_stylesheet_directory() . '/lib/structure/svgs.php';

// Load ACF functionality
include_once(get_stylesheet_directory() . '/lib/acf/blocks.php');

// Enqueue Scripts
function ray_load_scripts()
{
    wp_dequeue_script('rayneils-theme-css');

    wp_deregister_style('rayneils-theme-css');

    wp_enqueue_style('ray-theme-style', get_stylesheet_directory_uri() . '/assets/dist/main.css', array(), null, null);

    wp_enqueue_script('ray-theme-vendor-script', get_stylesheet_directory_uri() . '/assets/dist/vendors~main.js', array(), null, true);

    wp_enqueue_script('ray-theme-script', get_stylesheet_directory_uri() . '/assets/dist/main.js', array('jquery','ray-theme-vendor-script'), null, true);

    wp_register_script('google-apis-map-script', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_API_KEY, array(), false, true);

    wp_enqueue_script('google-apis-maps-script');
}

add_action('wp_enqueue_scripts', 'ray_load_scripts');
