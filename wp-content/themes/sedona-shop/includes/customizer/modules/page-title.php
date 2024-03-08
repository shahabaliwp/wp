<?php
/**
 * Customizer Page Title
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page title padding
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'sedona_shop_settings_page_title_padding',
	'label'       => esc_attr__( 'Page title top/bottom padding', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output'       => array(
		array(
			'element'  => '.page-title:not(.page-title--tall)',
			'media_query' => $bp_lg_up,
		),
	),
) );


// Breadcrumbs title
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'sedona_shop_settings_page_title',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Breadcrumbs', 'sedona-shop' ) . '</h3>',
) );

// Show page breadcrumbs
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_breadcrumbs_pages_show',
	'label'       => esc_attr__( 'Show on a regular pages', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_title',
	'default'     => false,
) );

// Show blog breadcrumbs
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_breadcrumbs_blog_show',
	'label'       => esc_attr__( 'Show on a blog listing page', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_title',
	'default'     => false,
) );

if ( sedona_shop_is_woocommerce_activated() ) {
	// Show shop pages breadcrumbs
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'toggle',
		'settings'    => 'sedona_shop_settings_shop_pages_breadcrumbs_show',
		'label'       => esc_attr__( 'Show on shop pages (Cart, Checkout)', 'sedona-shop' ),
		'section'     => 'sedona_shop_settings_page_title',
		'default'     => true,
	) );
}
