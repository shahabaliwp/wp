<?php
/**
 * WooCommerce Compatibility File.
 *
 * @package Sedona Shop
 */


if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Sedona Shop WooCommerce Compatibility
 */
if ( ! class_exists( 'Sedona_Shop_WooCommerce' ) ) {

	/**
	 * Sedona Shop WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Sedona_Shop_WooCommerce {

		/**
		* Instance
		*
		* @var object instance
		*/
		private static $instance;

		/**
		* Get instance
		*
		* Ensures only one instance of the class is loaded or can be loaded.
		*/
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		* Constructor
		*/
		public function __construct() {
			add_action( 'wp', [ $this, 'product_catalog_customization' ], 5 );
		}


		/**
		* Product catalog customization.
		*
		* @return void
		*/
		public function product_catalog_customization() {

			// Hide Sale badge
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

			// Add badge to Shop loop
			if ( get_theme_mod( 'sedona_shop_settings_woocommerce_product_sale_badge', 'percent' ) !== 'disabled' || get_theme_mod ( 'sedona_shop_settings_woocommerce_product_new_badge', true ) ) {
				add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_badge', 9 );
			}

			// Title
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_title_show', true ) ) {
				remove_action( 'woocommerce_shop_loop_item_title', 'sedona_shop_product_title', 10 );
			}
			
			// Rating
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_rating_show', true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			}

			// Price
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_price_show', true ) ) {
				remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			}

			// Add to Cart button
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_catalog_button_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
			}

			// Add to Wishlist button
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_catalog_wishlist_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_add_to_wishlist', 10 );
			}

			// Action Icons
			if ( ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_catalog_wishlist_show', true ) && ! get_theme_mod( 'sedona_shop_settings_woocommerce_product_catalog_button_show', true ) ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_action_icons_open' );
				remove_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_action_icons_close' );
			}

		}	

	}

}

Sedona_Shop_WooCommerce::get_instance();