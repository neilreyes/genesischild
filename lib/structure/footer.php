<?php
// Remove parent footer theme stuff from site header
function ray_remove_parent_footer_theme_stuff()
{
	remove_action('genesis_footer', 'genesis_do_footer');
}

add_action('after_setup_theme', 'ray_remove_parent_footer_theme_stuff', 0);

function ray_add_child_footer_stuff()
{
	// Apply new edugap credit
	add_filter('genesis_footer_creds_text', 'ray_footer_credit_filter');

	add_action('genesis_after', 'ray_render_mobile_menu', 10, 5);

	add_action('genesis_footer', 'ray_do_footer', 10, 5);
}

add_action('after_setup_theme', 'ray_add_child_footer_stuff', 0);

// Change default credit text to ray credit
function ray_footer_credit_filter($credits)
{
	$year = date('Y');

	$credits = wp_kses_post(genesis_get_option('footer_text'));

	$output = '<p>' . genesis_strip_p_tags($credits) . '</p>';

	return $output;
}

function ray_do_footer()
{

	do_action('ray_before_footer_content');

	do_action('ray_footer_content');

	do_action('ray_after_footer_content');
}

// Create new footer_credit() out of Genesis footer_credit()
function ray_footer_credit()
{
	echo wp_sprintf('<div class="%s">', 'footer-credit');

	// Build the text strings. Includes shortcodes.
	$backtotop_text = '[footer_backtotop]';
	$creds_text     = sprintf('[footer_copyright before="%s "] &#x000B7; [footer_childtheme_link before="" after=" %s"] [footer_genesis_link url="https://www.studiopress.com/" before=""] &#x000B7; [footer_wordpress_link] &#x000B7; [footer_loginout]', __('Copyright', 'genesis'), __('on', 'genesis'));

	// Filter the text strings.
	$backtotop_text = apply_filters('genesis_footer_backtotop_text', $backtotop_text);
	$creds_text     = apply_filters('genesis_footer_creds_text', $creds_text);

	$backtotop = $backtotop_text ? sprintf('<div class="gototop"><p>%s</p></div>', $backtotop_text) : '';
	$creds     = $creds_text ? sprintf('<div class="creds"><p>%s</p></div>', $creds_text) : '';

	$output = $backtotop . $creds;

	// Only use credits if HTML5.
	if (genesis_html5()) {
		$output = '<p>' . genesis_strip_p_tags($creds_text) . '</p>';
	}

	echo apply_filters('genesis_footer_output', $output, $backtotop_text, $creds_text); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	ray_site_branding();

	echo '</div>';
}

add_action('ray_footer_content', 'ray_footer_credit');

// Add footer navigation menu
function ray_footer_nav_menu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'footer-menu',
			'container_class' => 'footer-nav-menu'
		)
	);
}

add_action('ray_before_footer_content', 'ray_footer_nav_menu');