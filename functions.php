<?php

require_once( get_stylesheet_directory() . '/config/key.php' );
// Load theme functions
require_once(get_stylesheet_directory() . '/lib/functions/index.php');

// Register Custom Post Types
require_once(get_stylesheet_directory() . '/lib/cpts/index.php');

// Load theme supports
require_once(get_stylesheet_directory() . '/lib/theme-support.php');

// Adds image upload and color select to WordPress Theme Customizer.
require_once(get_stylesheet_directory() . '/lib/customizer/index.php');

// Load structural scripts
require get_stylesheet_directory() . '/lib/structure/footer.php';
require get_stylesheet_directory() . '/lib/structure/header.php';
require get_stylesheet_directory() . '/lib/structure/loop.php';
require get_stylesheet_directory() . '/lib/structure/menu.php';

// Load ACF functionality
include_once(get_stylesheet_directory() . '/lib/acf/blocks.php');

// Enqueue Scripts
function ray_load_scripts()
{
	wp_enqueue_style('ray-theme-style', get_stylesheet_directory_uri() . '/assets/dist/main.css', array(), null, null);

	wp_enqueue_script('ray-theme-script', get_stylesheet_directory_uri() . '/assets/dist/main.js', array('jquery'), null, true);

	wp_register_script('google-apis-map-script', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_API_KEY , array(), false, true);
}

add_action('wp_enqueue_scripts', 'ray_load_scripts');
