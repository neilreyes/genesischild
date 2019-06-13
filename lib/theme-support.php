<?php // Add viewport meta tag for mobile browsers
add_theme_support('genesis-responsive-viewport');

// Add HTML5 markup structure
add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list', 
		'gallery',
		'caption'
	)
);

add_theme_support('align-wide');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support(
	'custom-logo',
	array(
		'height'      => 350,
		'width'       => 350,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

// Add custom editor font sizes.
add_theme_support(
	'editor-font-sizes',
	array(
		array(
			'name'      => __('Small', 'raytheme'),
			'shortName' => __('S', 'raytheme'),
			'size'      => 13,
			'slug'      => 'small',
		),
		array(
			'name'      => __('Normal', 'raytheme'),
			'shortName' => __('M', 'raytheme'),
			'size'      => 15,
			'slug'      => 'normal',
		),
		array(
			'name'      => __('Large', 'raytheme'),
			'shortName' => __('L', 'raytheme'),
			'size'      => 36,
			'slug'      => 'large',
		),
		array(
			'name'      => __('Huge', 'raytheme'),
			'shortName' => __('XL', 'raytheme'),
			'size'      => 48,
			'slug'      => 'huge',
		),
	)
);