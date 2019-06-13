<?php
// Add inner-page class to body if page is not front page
function edugap_body_classes($classes)
{
	if (!is_front_page()) {
		$classes[] = "inner-page";
	}
	return $classes;
}

add_filter('body_class', 'edugap_body_classes');

// Mobile Navigation
function ray_render_mobile_menu()
{
	echo '<button class="toggle-button">☰</button>';
	echo wp_sprintf('<nav id="%s">', 'menu');
	genesis_nav_menu(
		array(
			'theme_location' => 'secondary',
			'menu_class'     => 'menu',
		)
	);
	echo '</nav>';
}

// Site branding with image
function ray_site_branding()
{
	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

	genesis_markup(
		array(
			'open'    => '<div %s>',
			'context' => 'site-branding',
		)
	);

	echo wp_sprintf('<a href="%s" class="site-branding-link">', esc_url('/'));

	if( has_custom_logo() ){

		echo get_custom_logo();

	} else {
		echo wp_sprintf('<img src="%s" alt="%s" class="site-logo"/>', esc_url(get_stylesheet_directory_uri() . '/assets/dist/images/logo.svg'), esc_attr('site branding'));
	}

	echo '</a>';

	genesis_markup(
		array(
			'close'    => '</div>',
			'context' => 'site-branding',
		)
	);
}