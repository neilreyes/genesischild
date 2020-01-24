<?php function ray_custom_socialmedia_channels($wp_customize)
{
	$channels = array(
		'facebook' => 'Facebook',
		'twitter' => 'Twitter',
		'youtube' => 'Youtube',
		'instagram' => 'Instagram',
		'linkedin' => 'LinkedIn',
		'googleplus' => 'Google +'
	);

	// Font Selector
	$wp_customize->add_section('ray_custom_socialmedia_channels_section', array(
		'title'      => __('Social Media Channels', 'ray'),
		'priority'   => 26,
	));

	$wp_customize->add_setting('ray_custom_socialmedia_channels_setting', array(
        'transport' => 'refresh',
        /* 'sanitize_callback' => 'ray_sanitize_fonts', */
        'default' => 'facebook'
    ));

    $wp_customize->add_control('ray_heading_font_family', array(
        'label'     => __('Heading Font Family', 'edugap'),
        'description' => __('Select font family for heading text'),
        'type'      => 'select',
        'section'   => 'ray_custom_socialmedia_channels_section',
        'settings'  => 'ray_custom_socialmedia_channels_setting',
        'choices'   => $channels
    ));

}

add_action('customize_register', 'ray_custom_socialmedia_channels');
