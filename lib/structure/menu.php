<?php function ray_register_menus()
{
	register_nav_menus(
		array(
			'footer-menu' => __('Footer Menu'),
			'mobile-menu' => __('Mobile Menu'),
		)
	);
}

add_action('init', 'ray_register_menus');
