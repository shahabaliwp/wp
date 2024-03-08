<?php
/**
 * Customizer Page 404
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page 404 Background Image
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'image',
	'settings'    => 'sedona_shop_settings_page_404_background',
	'label'       => esc_html__( 'Page 404 Background Image', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_404',
	'default'     => get_template_directory_uri() . '/assets/img/404/sedona_shop_404_bg-min.jpg'
) );

// Title
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_page_404_title',
	'label'       => esc_html__( 'Page 404 title', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_404',
	'default'     => esc_html__( 'Whoops...page not found', 'sedona-shop' ),
) );

// Description text
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_page_404_description',
	'label'       => esc_html__( 'Page 404 description text', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_404',
	'default'     => esc_html__( 'Unfortunately, the page you are looking for does not exist.', 'sedona-shop' ),
) );

// Button text
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_page_404_button_text',
	'label'       => esc_html__( 'Page 404 button text', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_page_404',
	'default'     => esc_html__( 'Back to Home', 'sedona-shop' ),
) );