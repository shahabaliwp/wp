<?php
/**
 * Add to wishlist button template - Browse list
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.12
 */

/**
 * Template variables:
 *
 * @var $wishlist_url              string Url to wishlist page
 * @var $exists                    bool Whether current product is already in wishlist
 * @var $show_exists               bool Whether to show already in wishlist link on multi wishlist
 * @var $product_id                int Current product id
 * @var $parent_product_id         int Parent for current product
 * @var $product_type              string Current product type
 * @var $label                     string Button label
 * @var $browse_wishlist_text      string Browse wishlist text
 * @var $already_in_wishslist_text string Already in wishlist text
 * @var $product_added_text        string Product added text
 * @var $icon                      string Icon for Add to Wishlist button
 * @var $link_classes              string Classed for Add to Wishlist button
 * @var $available_multi_wishlist  bool Whether add to wishlist is available or not
 * @var $disable_wishlist          bool Whether wishlist is disabled or not
 * @var $template_part             string Template part
 * @var $loop_position             string Loop position
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

global $product;
?>

<!-- BROWSE WISHLIST MESSAGE -->
<div class="yith-wcwl-wishlistexistsbrowse" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-original-product-id="<?php echo esc_attr( $parent_product_id ); ?>">
	<span class="feedback">
		<?php echo wp_kses_post( $already_in_wishslist_text ); ?>
	</span>
	
	<a href="<?php echo esc_url( $wishlist_url ); ?>" class="wishlist-url yith-wcwl-icon" rel="nofollow" data-title="<?php echo esc_attr( $browse_wishlist_text ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0H24V24H0z"/><path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z"/></svg>
		<?php echo ( ! $is_single && 'before_image' === $loop_position ) ? $icon : false; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php echo '<span class="wishlist-label">' . wp_kses_post( apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text, $product_id, $icon ) ) . '</span>'; ?>
	</a>
</div>
