<?php
/**
 * Customizer Header
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( defined( 'SEDONA_SHOP_CORE_VERSION' ) ) {

	// Header template notice
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'sedona_shop_settings_header_template_notice',
		'section'     => 'sedona_shop_settings_header',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor header template navigate to %1$s', 'sedona-shop' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'sedona-shop' )
				)
			) .
			'</p></div>',
	) );
	
}

// Show header
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_header_show',
	'label'       => esc_html__( 'Show header', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => true,
) );

// Sticky header
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_sticky_header',
	'label'       => esc_html__( 'Sticky header', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Header container width
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_container_width',
	'label'       => esc_attr__( 'Header container width', 'sedona-shop' ),
	'description' => esc_html__( "Example: 1200px or 80%", 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => '100%',
	'choices'     => array(
		'min'  => '0',
		'max'  => '2000',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__container.container',
			'property'    => 'max-width',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );


// Header height
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_height',
	'label'       => esc_html__( 'Header height', 'sedona-shop' ),
	'description' => esc_html__( 'Will apply only on big screens', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => 90,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),	
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header sticky height
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_sticky_height',
	'label'       => esc_attr__( 'Header sticky height', 'sedona-shop' ),
	'description' => esc_html__( 'Will apply only on big screens', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => 80,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header mobile height
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_mobile_height',
	'label'       => esc_attr__( 'Header mobile height', 'sedona-shop' ),
	'description' => esc_html__( 'Will apply only on mobile screens', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Logo
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'image',
	'settings'    => 'sedona_shop_settings_logo',
	'label'       => esc_html__( 'Upload Logo', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_logo',
	'choices'     => [
		'save_as' => 'array',
	],
) );

// Logo width
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_logo_width',
	'label'       => esc_attr__( 'Header logo width', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_logo',
	'default'     => 110,
	'choices'     => array(
		'min'  => '10',
		'max'  => '300',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'transport' => 'auto',
) );

// Logo mobile width
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_logo_mobile_width',
	'label'       => esc_attr__( 'Header logo mobile width', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_logo',
	'default'     => 110,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'transport' => 'auto',
) );

// Menu items horizontal spacing
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_header_text_links_horizontal_spacing',
	'label'       => esc_attr__( 'Menu text links horizontal spacing', 'sedona-shop' ),
	'description' => esc_html__( 'Applies only on big screens', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_primary_menu',
	'default'     => 16,
	'choices'     => array(
		'min'  => '0',
		'max'  => '60',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-left',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-right',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Last Menu Item Title
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'sedona_shop_settings_primary_menu',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Last menu item', 'sedona-shop' ) . '</h3>',
) );

// Show nav search
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_header_search_show',
	'label'       => esc_html__( 'Show navbar search', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_header',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

if ( sedona_shop_is_woocommerce_activated() ) {
	// Show nav account
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'toggle',
		'settings'    => 'sedona_shop_settings_header_account_show',
		'label'       => esc_html__( 'Show navbar account', 'sedona-shop' ),
		'section'     => 'sedona_shop_settings_header',
		'default'     => true,
		'active_callback' => array(
			array(
				'setting'  => 'sedona_shop_settings_header_show',
				'operator' => '==',
				'value'    => true,
			)
		),
	) );
}

// Show nav top bar
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_top_bar_show',
	'label'       => esc_html__( 'Show top bar', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => true,
) );

// Top bar message
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_top_bar_message',
	'label'       => esc_html__( 'Message text', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => esc_html__( 'Discover best selling sofas, Lounge chairs and get an extra 10% off using the code SEDONA10', 'sedona-shop' ),
) );

// Top bar support label
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_top_bar_support_label',
	'label'       => esc_html__( 'Support label', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => esc_html__( 'Support', 'sedona-shop' ),
) );

// Top bar support URL
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'url',
	'settings'    => 'sedona_shop_settings_top_bar_support_url',
	'label'       => esc_html__( 'Support URL', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => '#',
) );

// Top bar store location label
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_top_bar_store_location_label',
	'label'       => esc_html__( 'Store location label', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => esc_html__( 'Store location', 'sedona-shop' ),
) );

// Top bar store location URL
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'url',
	'settings'    => 'sedona_shop_settings_top_bar_store_location_url',
	'label'       => esc_html__( 'Store location URL', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => '#',
) );

// Top bar phone label
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_top_bar_phone_label',
	'label'       => esc_html__( 'Phone label', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => esc_html__( '1-800-995-3959', 'sedona-shop' ),
) );

// Top bar phone URL
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'url',
	'settings'    => 'sedona_shop_settings_top_bar_phone_url',
	'label'       => esc_html__( 'Phone number', 'sedona-shop' ),
	'description' => esc_html__( 'Ex.: tel:1-800-995-3959', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_top_bar',
	'default'     => '#',
) );