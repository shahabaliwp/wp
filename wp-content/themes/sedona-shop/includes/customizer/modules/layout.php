<?php
/**
 * Customizer Layout
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Content layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'number',
	'settings'    => 'sedona_shop_settings_content_layout_container_width',
	'label'       => esc_html__( 'Container Width (px)', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_content_layout',
	'default'     => $container_width,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.container:not(.container-wide)',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'transport' => 'auto',
) );

// Blog layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_blog_layout_type',
	'label'       => esc_html__( 'Layout type', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_blog_layout',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'select',
	'settings'    => 'sedona_shop_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'sedona-shop' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_blog_layout',
	'default'     => 'col-lg-12',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'sedona-shop' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'sedona-shop' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'sedona-shop' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'sedona-shop' ),
	),
) );

// Single post layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_single_post_layout_type',
	'label'       => esc_html__( 'Layout type', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_single_post_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );


// Page Layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'sedona-shop' ),
	'description' => esc_html__( 'Use this option for regular pages', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_archives_layout_type',
	'label'       => esc_html__( 'Layout type', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_archives_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'select',
	'settings'    => 'sedona_shop_settings_archives_columns',
	'label'       => esc_html__( 'Columns', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_archives_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'sedona-shop' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'sedona-shop' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'sedona-shop' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'sedona-shop' ),
	),
) );

// Search Layout
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'sedona_shop_settings_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'select',
	'settings'    => 'sedona_shop_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'sedona-shop' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'sedona-shop' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'sedona-shop' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'sedona-shop' ),
	),
) );


if ( sedona_shop_is_woocommerce_activated() ) {

	// Shop layout
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'sedona_shop_settings_shop_layout_type',
		'label'       => esc_html__( 'Shop layout type', 'sedona-shop' ),
		'description'	=> esc_html__( 'Make sure that your Shop sidebar has widgets.', 'sedona-shop' ),
		'section'     => 'sedona_shop_settings_shop_layout',
		'default'     => 'left-sidebar',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

	// Shop pages layout
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'sedona_shop_settings_shop_pages_layout_type',
		'label'       => esc_html__( 'Shop pages layout type', 'sedona-shop' ),
		'description'	=> esc_html__( 'Applies on Cart, Checkout and My Account pages. This setting will not have any effect if you are using custom metaboxes in Pro version.', 'sedona-shop' ),
		'section'     => 'sedona_shop_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

}