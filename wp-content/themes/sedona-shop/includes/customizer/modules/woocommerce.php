<?php
/**
 * WooCommerce
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* WooCommerce
/*-------------------------------------------------------*/

/*-------------------------------------------------------*/
/* Product Social Share Buttons
/*-------------------------------------------------------*/

Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_product_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Facebook Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_facebook',
	'label'       => esc_html__( 'Facebook', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Twitter Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_twitter',
	'label'       => esc_html__( 'Twitter', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Linkedin Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_pocket',
	'label'       => esc_html__( 'Pocket', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Facebook Messenger Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_viber',
	'label'       => esc_html__( 'Viber', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_telegram',
	'label'       => esc_html__( 'Telegram', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_reddit',
	'label'       => esc_html__( 'Reddit', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'sedona_shop_settings_product_share_email',
	'label'       => esc_html__( 'Email', 'sedona-shop' ),
	'section'     => 'sedona_shop_settings_product_social_share',
	'default'     => false,
) );


/*-------------------------------------------------------*/
/* Catalog
/*-------------------------------------------------------*/

/*-------------------------------------------------------*/
/* Page Title
/*-------------------------------------------------------*/
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Page Title', 'sedona-shop' ) . '</h3>',
) );

// Show catalog page title
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_catalog_page_title_show',
	'label'       => esc_html__( 'Show page title', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Page description
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'text',
	'settings'    => 'sedona_shop_settings_woocommerce_page_title_description',
	'label'       => esc_html__( 'Page title description', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => '',
) );


/*-------------------------------------------------------*/
/* Product Elements
/*-------------------------------------------------------*/
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Product Elements', 'sedona-shop' ) . '</h3>',
) );

// Show product Sale badge
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'sedona_shop_settings_woocommerce_product_sale_badge',
	'label'       => esc_html__( 'Sale badge', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => 'percent',
	'choices'     => array(
		'disabled'  => esc_html__( 'Disabled', 'sedona-shop' ),
		'text'      => esc_html__( 'Text', 'sedona-shop' ),
		'percent'   => esc_html__( 'Percentage', 'sedona-shop' ),
	),
));

// New badge
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_new_badge',
	'label'       => esc_html__( '"New" badge', 'sedona-shop' ),
	'description' => esc_html__( 'Show "New" badge on recently added products', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
));

Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'sedona_shop_settings_woocommerce_new_badge_duration',
	'label'       => esc_html__( 'Days to show "New" badge', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => 5,
	'choices'	  => array(
		'min'	=> 1,
		'max'	=> 15,
		'step'	=> 1
	),
	'required'    => array(
		array(
			'setting'  => 'sedona_shop_settings_woocommerce_product_new_badge',
			'operator' => '==',
			'value'    => true,
		),
	),
));

// Show product title
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_title_show',
	'label'       => esc_html__( 'Show title', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product rating
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_rating_show',
	'label'       => esc_html__( 'Show rating', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product price
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_price_show',
	'label'       => esc_html__( 'Show price', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Wishlist button
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_catalog_wishlist_show',
	'label'       => esc_html__( 'Show add to wishlist button', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Cart button
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_product_catalog_button_show',
	'label'       => esc_html__( 'Show add to cart button', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Auto open mini-cart
Kirki::add_field( 'sedona_shop_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'sedona_shop_settings_woocommerce_auto_open_mini_cart',
	'label'       => esc_html__( 'Auto open mini-cart', 'sedona-shop' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );