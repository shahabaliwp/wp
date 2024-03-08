<?php
/**
 * Theme functions.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! function_exists( 'sedona_shop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sedona_shop_setup() {

		load_theme_textdomain( 'sedona-shop', SEDONA_SHOP_DIR . '/languages' );
		// remove_theme_support( 'widgets-block-editor' );

		// Enable theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'sedona_shop_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// WooCommerce
		if ( sedona_shop_is_woocommerce_activated() ) {			
			add_theme_support( 'woocommerce', array(
				'thumbnail_image_width' => 320,
				'gallery_thumbnail_image_width' => 120,
				'single_image_width' => 730,
				'product_grid'      => array(
					'default_columns' => 3,
					'default_rows'    => 3,
				),
			) );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style();

		add_theme_support( 'custom-spacing' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary', 'sedona-shop' ),
				'slug' => 'primary',
				'color' => get_theme_mod( 'sedona_shop_settings_primary_color', '#ffb31a' ),
			),
			array(
				'name' => esc_html__( 'Primary Light', 'sedona-shop' ),
				'slug' => 'primary-light',
				'color' => get_theme_mod( 'sedona_shop_settings_primary_light_color', '#f5ebe1' ),
			),
			array(
				'name' => esc_html__( 'Headings', 'sedona-shop' ),
				'slug' => 'headings',
				'color' => get_theme_mod( 'sedona_shop_settings_headings_color', '#222222' ),
			),
			array(
				'name' => esc_html__( 'Text', 'sedona-shop' ),
				'slug' => 'text',
				'color' => get_theme_mod( 'sedona_shop_settings_text_color', '#868686' ),
			),
			array(
				'name' => esc_html__( 'Background Light', 'sedona-shop' ),
				'slug' => 'background-light',
				'color' => get_theme_mod( 'sedona_shop_settings_background_light_color', '#f9f9f9' ),
			),
			array(
				'name' => esc_html__( 'Borders', 'sedona-shop' ),
				'slug' => 'borders',
				'color' => get_theme_mod( 'sedona_shop_settings_borders_color', '#e5e5e5' ),
			),
		) );		

		// Thumbnails
		update_option( 'thumbnail_size_w', 80 );
		update_option( 'thumbnail_size_h', 80 );
		update_option( 'thumbnail_crop', 1 );

		add_image_size( 'sedona-shop-blog-post-thumb', 890, 501, false );

		// Nav Menus
		register_nav_menus(array(
			'primary-menu' 			 => esc_html__( 'Primary Menu', 'sedona-shop' ),
			'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'sedona-shop' ),
		));

		// Disable Elementor onboarding
		update_option( 'elementor_onboarded', 1 );

		// Disable WooCommerce wizard redirect
		add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
		add_filter( 'woocommerce_show_admin_notice', '__return_false' );
		add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_false' );

		// Disable Kirki telemetry
		add_filter( 'kirki_telemetry', '__return_false' );

		// Allow shorcodes in text widgets
		add_filter( 'widget_text', 'do_shortcode' );
	}

endif;
add_action( 'after_setup_theme', 'sedona_shop_setup' );

if ( class_exists( 'RevSliderFunctions' ) ) {
	if ( ! function_exists( 'sedona_shop_revslider_enable_icons' ) ) {
		/**
		 * Enable Material icons for Revolution Slider
		 */
		function sedona_shop_revslider_enable_icons() {
			if ( is_customize_preview() ) return;
			$rs	 = new RevSliderFunctions();
			$fonts = array( 'Material Icons' => 'Material+Icons' );
			if ( ! method_exists( $rs, 'preload_fonts' ) ) return;
			$html = $rs->preload_fonts( $fonts );

			if ( ! empty( $html ) ) echo html_entity_decode( esc_html( $html ) );
				echo "\n<style>@font-face {
					font-family: 'Material Icons';
					font-style: normal;
					font-weight: 400;
					src: local('Material Icons'),
					local('MaterialIcons-Regular'),
					url(" . RS_PLUGIN_URL . "public/assets/fonts/material/MaterialIcons-Regular.woff2) format('woff2'),
					url(" . RS_PLUGIN_URL . "public/assets/fonts/material/MaterialIcons-Regular.woff) format('woff'),  
					url(" . RS_PLUGIN_URL . "public/assets/fonts/material/MaterialIcons-Regular.ttf) format('truetype');
				}
				.material-icons {
					font-family: 'Material Icons';
					font-weight: normal;
					font-style: normal;
						font-size: inherit;
					display: inline-block;  
					text-transform: none;
					letter-spacing: normal;
					word-wrap: normal;
					white-space: nowrap;
					direction: ltr;
					vertical-align: top;
					line-height: inherit;
					/* Support for IE. */
					font-feature-settings: 'liga';
					-webkit-font-smoothing: antialiased;
					text-rendering: optimizeLegibility;
					-moz-osx-font-smoothing: grayscale;
				}
			</style>\n";
		}
		add_action( 'admin_enqueue_scripts', 'sedona_shop_revslider_enable_icons' );
	}
}

/*
 * Update Elementor Defaults
 */
if ( 1 != get_option( 'sedona_shop_elementor_defaults', 0 ) ) {
	add_option( 'sedona_shop_elementor_defaults', 0 );
}

/**
* Update Elementor defaults.
*/
function sedona_shop_update_elementor_defaults() {
	if ( 1 != get_option( 'sedona_shop_elementor_defaults' ) ) {
		update_option( 'elementor_cpt_support', array(
			'post',
			'page',
			'theme_template'
		) );
		
		update_option( '_elementor_editor_upgrade_notice_dismissed', time() + '9999999999' );
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );
		update_option( 'elementor_unfiltered_files_upload', 1 );
		update_option( 'sedona_shop_elementor_defaults', 1 );
	}
}
add_action( 'init', 'sedona_shop_update_elementor_defaults' );

// Disable Woo Variation Swatches activation redirect
if ( class_exists( 'Woo_Variation_Swatches' ) ) {
	remove_action( 'admin_init', array( Woo_Variation_Swatches(), 'after_plugin_active' ) );
}

/*
 * Register widget areas.
 */
function sedona_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'sedona-shop' ),
		'id'            => 'sedona-shop-blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'sedona-shop' ),
		'id'            => 'sedona-shop-page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( sedona_shop_is_woocommerce_activated() ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'sedona-shop' ),
			'id'            => 'sedona-shop-store-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'sedona-shop' ),
		'id'            => 'sedona-shop-footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'sedona-shop' ),
		'id'            => 'sedona-shop-footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'sedona-shop' ),
		'id'            => 'sedona-shop-footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'sedona-shop' ),
		'id'            => 'sedona-shop-footer-col-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 5', 'sedona-shop' ),
		'id'            => 'sedona-shop-footer-col-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sedona_shop_widgets_init' );