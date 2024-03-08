<?php
/**
 * Customizer Typography
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Kirki add custom font choices
 */
if ( ! function_exists( 'sedona_shop_kirki_font_choices' ) ) {
	function sedona_shop_kirki_font_choices( $settings = [] ) {
		$fonts_list = apply_filters( 'sedona_shop_fonts_list', [] );

		if ( ! $fonts_list ) {
			return $settings;
		}

		$fonts_settings = [
			'fonts' => [
				'google' => [],
				'families' => isset( $fonts_list[ 'families' ] ) ? $fonts_list[ 'families' ] : null,
				'variants' => isset( $fonts_list[ 'variants' ] ) ? $fonts_list[ 'variants' ] : null
			]
		];

		$fonts_settings = array_merge( (array) $fonts_settings, (array) $settings );
		return $fonts_settings;
	}
}
add_filter( 'sedona_shop_fonts_choices', 'sedona_shop_kirki_font_choices' );


if ( ! function_exists( 'sedona_shop_add_custom_choice' ) ) {
	/**
	 * Add custom choice
	 */
	function sedona_shop_add_custom_choice( $variant = array( 'regular' ) ) {
		return apply_filters( 'sedona_shop_fonts_choices', [
				'variant' => $variant
			]
		);
	}
}


// Base font
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_base_font',
	'label'       => '<h2 class="customizer-control-title__heading">' . esc_html__( 'Base font', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $body_font,
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => 'normal',
		'text-transform' => 'none',
		'variant' 			 => 'regular',
	),
	'choices'  => sedona_shop_add_custom_choice( array( 'regular', '700', 'italic' ) ),
	'output' => array(
		array(
			'element' => $selectors['base_font'],
		)
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Headings font
/*-------------------------------------------------------*/

// Headings
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_font',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'Headings font', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'variant' 	 		 => '600',
		'line-height' 	 => '1.2',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['headings'],
		),
		array(
			'element' => isset( $selectors['shop_headings_font'] ) ? $selectors['shop_headings_font'] : null,
		),
	),
	'transport' => 'auto',
));


// H1
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h1',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H1 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '40px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['h1'],
			'media_query' => $bp_md_up,
		),
	),
	'transport' => 'auto',
));

// H2
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h2',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H2 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '32px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['h2'],
		),
	),
	'transport' => 'auto',
));

// H3
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h3',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H3 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '28px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['h3'],
		),
	),
	'transport' => 'auto',
));

// H4
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h4',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H4 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '24px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['h4'],
		),
	),
	'transport' => 'auto',
));

// H5
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h5',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H5 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '20px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['h5'],
		),
	),
	'transport' => 'auto',
));

// H6
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_headings_h6',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'H6 Headings', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-size'   	 => '16px',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => 'h6',
		),
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Forms
/*-------------------------------------------------------*/

// Buttons typography
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_buttons_typography',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'Buttons', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'variant'		 		 => '600',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice( array( '600' ) ),
	'output' => array(
		array(
			'element' => $selectors['buttons'],
		),
		array(
			'element' => '.wp-block-button .wp-block-button__link',
			'context' => array( 'editor' ),			
		)
	),
	'transport' => 'auto',
));

// Labels Typography
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_labels_typography',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'Form labels', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'variant' 	 		 => '600',
		'line-height' 	 => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice(),
	'output' => array(
		array(
			'element' => 'label',
		),
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Header
/*-------------------------------------------------------*/

// Menu Links typography
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_menu_links_typography',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'Menu links', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'variant' 	 		 => '500',
		'font-size'			 => '16px',
		'letter-spacing' => 'normal',
	),
	'choices'  => sedona_shop_add_custom_choice( array( '500' ) ),
	'output' => array(
		array(
			'element' => '.nav__menu > li > a',
		),
	),
	'transport' => 'auto',
));

// Dropdown menu Links typography
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'sedona_shop_settings_dropdown_menu_links_typography',
	'label'       => '<hr class="customizer-separator"><h2 class="customizer-control-title__heading">' . esc_html__( 'Dropdown menu links', 'sedona-shop' ) . '</h2>',
	'section'     => 'sedona_shop_settings_typography',
	'default'     => array(
		'font-family'    => $body_font,
		'variant' 			 => '400',
		'font-size'			 => '16px',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => sedona_shop_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.nav__dropdown-menu li a',
		),
	),
	'transport' => 'auto',
));