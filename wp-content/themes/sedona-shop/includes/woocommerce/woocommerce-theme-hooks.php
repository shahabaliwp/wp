<?php
/**
 * WooCommerce theme hooks
 *
 * @package Sedona Shop
 */

/**
 * Layout
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
add_action( 'woocommerce_before_main_content', 'sedona_shop_store_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'sedona_shop_store_after_content', 9 );
add_action( 'sedona_shop_store_sidebar', 'sedona_shop_store_get_sidebar', 10 );

/**
 * Taxonomy Archive
 */
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

/**
 * Products
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'sedona_shop_product_markup_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_hover_shop_loop_image' ); 


add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_overlay_open' );

// Product link
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close' );


// Action icons / Wishlist / QuickView
if ( class_exists( 'YITH_WCWL' ) || class_exists( 'YITH_WCQV' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_action_icons_open' );
}

if ( class_exists( 'YITH_WCWL' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_add_to_wishlist' );
}

if ( class_exists( 'YITH_WCQV' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_quick_view' );
	add_action( 'init', 'sedona_shop_loop_remove_quickview' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_action_icons_close' );

// Add to cart
add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_after_action_icons_close' );

add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_overlay_close' );


// Image holder close
add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_image_holder_close' );

// Outer close
add_action( 'woocommerce_before_shop_loop_item_title', 'sedona_shop_product_outer_close' );

// Product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_shop_loop_item_title', 'sedona_shop_product_title' );
add_action( 'woocommerce_after_shop_loop_item_title', 'sedona_shop_after_product_title_and_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'sedona_shop_product_rating' );


/**
 * Single Product
 */
add_action( 'woocommerce_share', 'sedona_shop_product_share' );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );


/**
 * Single product wishlist
 */
add_action( 'woocommerce_single_product_summary', 'sedona_shop_single_product_remove_wishlist' );
add_action( 'woocommerce_after_add_to_cart_button', 'sedona_shop_single_product_add_wishlist' );


/**
 * Widgets
 */
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'sedona_shop_store_tag_cloud_widget' );


/**
 * Breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'sedona_shop_store_breadcrumbs', 'woocommerce_breadcrumb', 10 );
add_filter( 'woocommerce_breadcrumb_defaults', 'sedona_shop_store_breadcrumb_delimiter' );


/**
 * Page Title
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );


/**
 * AJAX Cart
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'sedona_shop_woo_cart_ajax_count' );


/**
 * My Account Page
 */
add_action( 'woocommerce_before_customer_login_form', 'sedona_shop_woocommerce_before_customer_login_form' );
add_action( 'woocommerce_after_customer_login_form', 'sedona_shop_woocommerce_after_customer_login_form' );


/**
 * Quantity buttons
 */
add_action( 'woocommerce_after_quantity_input_field', 'sedona_shop_quantity_plus_sign' ); 
add_action( 'woocommerce_before_quantity_input_field', 'sedona_shop_quantity_minus_sign' );