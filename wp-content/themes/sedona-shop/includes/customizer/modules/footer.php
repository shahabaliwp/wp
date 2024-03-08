<?php
/**
 * Customizer Footer
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( defined( 'SEDONA_SHOP_CORE_VERSION' ) ) {

	// Footer template notice
	Kirki::add_field( 'sedona_shop_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'sedona_shop_settings_footer_template_notice',
		'section'     => 'sedona_shop_settings_footer',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor footer template navigate to %1$s', 'sedona-shop' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'sedona-shop' )
				)
			) .
			'</p></div>',
	) );
	
}

// Show footer
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_footer_show',
	'label'       => esc_attr__( 'Show footer', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_footer',
	'default'     => true,
) );

// Footer columns
new \Kirki\Field\Radio_Image( array(
	'settings'    => 'sedona_shop_settings_footer_columns',
	'label'       => esc_html__( 'Number of columns', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_footer',
	'default'     => 'footer-col-4',
	'choices'     => array(
		'footer-col-1' 				=> get_template_directory_uri() . '/assets/img/customizer/1-col.png',
		'footer-col-2' 				=> get_template_directory_uri() . '/assets/img/customizer/2-col.png',
		'footer-col-3' 				=> get_template_directory_uri() . '/assets/img/customizer/3-col.png',
		'footer-col-4' 				=> get_template_directory_uri() . '/assets/img/customizer/4-col.png',
		'footer-col-5' 				=> get_template_directory_uri() . '/assets/img/customizer/5-col.png',
		'footer-col-50-25-25' => get_template_directory_uri() . '/assets/img/customizer/50-25-25-col.png',
	),
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Show footer bottom menu
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_footer_bottom_menu_show',
	'label'       => esc_attr__( 'Show bottom footer menu', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'sedona_shop_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Bottom footer text
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        			=> 'text',
	'settings'    			=> 'sedona_shop_settings_footer_bottom_text',
	'section'     			=> 'sedona_shop_settings_footer',
	'label'       			=> esc_html__( 'Bottom footer text', 'sedona-shop' ),
	'description' 			=> esc_html__( 'Allowed HTML: a, span, i, em, strong', 'sedona-shop' ),
	'sanitize_callback' => 'wp_kses_post',
	'default'     			=> sprintf( esc_html__( '&copy; [current-year] %1$s. Made by %2$sDeoThemes%3$s' , 'sedona-shop' ), get_bloginfo( 'name' ), '<a href="https://deothemes.com">', '</a>' ),
	'active_callback' 	=> array(
		array(
			'setting'  => 'sedona_shop_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );