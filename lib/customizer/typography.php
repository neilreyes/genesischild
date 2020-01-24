<?php function ray_customize_register($wp_customize)
{

	$font_choices = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	// Font Selector
	$wp_customize->add_section('ray_typography', array(
		'title'      => __('Typography', 'edugap'),
		'priority'   => 24,
	));

	$wp_customize->add_setting('ray_typography_heading_setting', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'ray_sanitize_fonts',
		'default' => 'Open Sans:400italic,700italic,400,700'
	));

	$wp_customize->add_control('ray_heading_font_family', array(
		'label'     => __('Heading Font Family', 'edugap'),
		'description' => __('Select font family for heading text'),
		'type'      => 'select',
		'section'   => 'ray_typography',
		'settings'  => 'ray_typography_heading_setting',
		'choices'   => $font_choices
	));

	$wp_customize->add_setting('ray_typography_body_setting', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'ray_sanitize_fonts',
		'default' => 'Open Sans:400italic,700italic,400,700'
	));

	$wp_customize->add_control('ray_body_font_family', array(
		'label'     => __('Body Font Family', 'edugap'),
		'description' => __('Select font family for body text'),
		'type'      => 'select',
		'section'   => 'ray_typography',
		'settings'  => 'ray_typography_body_setting',
		'choices'   => $font_choices
	));
};

add_action('customize_register', 'ray_customize_register');

//Sanitizes Fonts
function ray_sanitize_fonts($input)
{
	$valid = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	if (array_key_exists($input, $valid)) {
		return $input;
	} else {
		return '';
	}
};

function ray_typography_enqueue_font_script()
{
	$heading_font = esc_html(get_theme_mod('ray_typography_heading_setting','Open Sans:400italic,700italic,400,700'));
	$body_font = esc_html(get_theme_mod('ray_typography_body_setting','Open Sans:400italic,700italic,400,700'));

	if( $heading_font == $body_font  ){
		$fonts = $heading_font;
	} else{
		$fonts = $heading_font . '|' . $body_font;
	}

	wp_enqueue_style('ray-fonts', 'https://fonts.googleapis.com/css?family=' . $fonts );
};

add_action('wp_enqueue_scripts', 'ray_typography_enqueue_font_script');

function ray_typography_generate_live_css()
{

	$heading_font = esc_html(get_theme_mod('ray_typography_heading_setting'));
	$body_font = esc_html(get_theme_mod('ray_typography_body_setting'));

	if ($heading_font) {
		$font_pieces = explode(":", $heading_font);
		$heading_font_style = "h1, h2, h3, h4, h5, h6 { font-family: '" . $font_pieces[0] . "'; }" . "\n";
	}

	if ($body_font) {
		$font_pieces = explode(":", $body_font);
		$body_font_style = "p, a, li, span, label { font-family: '" . $font_pieces[0] . "'; }" . "\n";
	}
	
	if( $heading_font || $body_font ):
		echo '<style type="text/css">';
		if( $heading_font ){ echo $body_font_style; }
		if( $body_font ){ echo $heading_font_style; }
		echo '</style><!-- /Customizer font -->';
	endif;
}

add_action('wp_head', 'ray_typography_generate_live_css');
