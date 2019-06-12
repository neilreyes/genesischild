<?php

// Remove parent theme stuff from site header
function ray_remove_parent_header_theme_stuff()
{
	remove_action('genesis_after_header', 'genesis_do_nav', 10, 5);

	// Remove content-sidebar-wrap markup from body
	add_filter('genesis_markup_content-sidebar-wrap', '__return_null');
	//add_filter('genesis_markup_title-area','__return_null');

	// remove entry title this can be dynamic in per page/post basis
	remove_action('genesis_entry_header', 'genesis_do_post_title');

	remove_action('genesis_site_title', 'genesis_seo_site_title');

	remove_action('genesis_site_description', 'genesis_seo_site_description');

	remove_action('genesis_after_header', 'genesis_do_subnav');
}

add_action('after_setup_theme', 'ray_remove_parent_header_theme_stuff', 0);

function ray_add_child_header_stuff()
{
	// Apply new site branding with image
	add_action('genesis_site_title', 'ray_site_branding', 10, 5);
	
}

add_action('after_setup_theme', 'ray_add_child_header_stuff', 0);
