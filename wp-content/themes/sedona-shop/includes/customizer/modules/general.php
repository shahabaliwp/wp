<?php
/**
 * Customizer General
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Preloader
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_preloader_show',
	'label'       => esc_html__( 'Theme Preloader', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_back_to_top_show',
	'label'       => esc_html__( 'Back to Top Arrow', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_back_to_top',
	'default'     => true,
) );