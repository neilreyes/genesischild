<?php function ray_footer_custom_branding($wp_customize)
{
    $wp_customize->add_setting('footer_branding_logo', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'footer-logo',
        array(
            'label'      => __('Footer logo', 'ray'),
            'section'   => 'title_tagline',
            'settings'   => 'footer_branding_logo',
            'context'    => 'your_setting_context'
        )
    ));
}

add_action('customize_register', 'ray_footer_custom_branding');
