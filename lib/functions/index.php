<?php
// Add inner-page class to body if page is not front page
function ray_body_classes($classes)
{
    if (!is_front_page()) {
        $classes[] = "inner-page";
    }
    return $classes;
}

add_filter('body_class', 'ray_body_classes');

// Mobile Navigation
function ray_render_mobile_menu()
{
    echo '<button class="toggle-button"><div class="tb-line tb-line-top"></div><div class="tb-line tb-line-mid"></div><div class="tb-line tb-line-bottom"></div></button>';
    echo wp_sprintf('<nav id="%s">', 'mobile-menu');
    genesis_nav_menu(
        array(
            'theme_location' => 'mobile-menu',
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

    if (has_custom_logo()) {
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

function ray_footer_branding(){ ?>
	<?php
	$footer_branding = get_theme_mod('footer_branding_logo', 'true');
	if ($footer_branding !== ''): ?>
		<a href="<?php echo esc_url(home_url('/')); ?>" class="footer-branding-permalink">
			<img src="<?php echo esc_url($footer_branding); ?>" class="footer-branding-image"/>
		</a>
	<?php endif; ?>
<?php }