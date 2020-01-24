<?php function ray_customize_color($wp_customize){
    // Color Section
    $wp_customize->add_section('ray_theme_color_section', array(
        'title'     => __('Site Color', 'ray'),
        'priority'  => 25,
    ));

    // Color Settings for h1, h2, h3, h4, h5 ,h6
    $wp_customize->add_setting('ray_h1_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('ray_h2_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('ray_h3_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting('ray_h4_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('ray_h5_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('ray_h6_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_setting('ray_paragraph_color', array(
        'transport' => 'refresh',
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_setting('ray_anchorlink_color', array(
        'transport' => 'refresh',
        'default' => '#D8262B',
        'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_setting('ray_anchorlinkhover_color', array(
        'transport' => 'refresh',
        'default' => '#D8262B',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    // Color Controls for h1, h2, h3, h4, h5 ,h6
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_h1_color_control',
        array(
            'label' => 'H1 Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_h1_color',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_h2_color_control',
        array(
            'label' => 'H2 Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_h2_color',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_h3_color_control',
        array(
            'label' => 'h3 Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_h3_color',
        )
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'ray_theme_h4_color_control',
		array(
				'label' => 'H4 Color',
				'section' => 'ray_theme_color_section',
				'settings' => 'ray_h4_color',
			)
	));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_h5_color_control',
        array(
            'label' => 'H5 Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_h5_color',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_h6_color_control',
        array(
            'label' => 'h6 Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_h6_color',
        )
    ));
	
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_paragraph_color_control',
        array(
            'label' => 'Paragraph Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_paragraph_color',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_anchorlink_color_control',
        array(
            'label' => 'Anchor Link Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_anchorlink_color',
        )
	));
	
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'ray_theme_anchorlinkhover_color_control',
        array(
            'label' => 'Anchor Link Hover Color',
            'section' => 'ray_theme_color_section',
            'settings' => 'ray_anchorlinkhover_color',
        )
    ));

}

add_action('customize_register', 'ray_customize_color');

function mytheme_customize_css(){ ?>
	<style type="text/css">
		h1 { color: <?php echo get_theme_mod('ray_h1_color', '#000000'); ?>; }
		h2 { color: <?php echo get_theme_mod('ray_h2_color', '#000000'); ?>; }
		h3 { color: <?php echo get_theme_mod('ray_h3_color', '#000000'); ?>; }
		h4 { color: <?php echo get_theme_mod('ray_h4_color', '#000000'); ?>; }
		h5 { color: <?php echo get_theme_mod('ray_h5_color', '#000000'); ?>; }
		h6 { color: <?php echo get_theme_mod('ray_h6_color', '#000000'); ?>; }
		p, li, label, figcaption, span, input { color: <?php echo get_theme_mod('ray_paragraph_color', '#000000'); ?>; }
		a { color: <?php echo get_theme_mod('ray_anchorlink_color', '#D8262B'); ?>; }
		a:hover, a:focus, a:active { color: <?php echo get_theme_mod('ray_anchorlinkhover_color', '#D8262B
'); ?>; }
	</style>
<?php }
add_action('wp_head', 'mytheme_customize_css');
