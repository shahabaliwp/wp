<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! $product_attributes ) {
	return;
}

?>

<table class="woocommerce-product-attributes shop_attributes">
	<?php if ( $display_dimensions && ! $product->is_type('variable') ) : ?>

		<?php if ( $product->get_length() ) : ?>
			<tr class="woocommerce-product-attributes-item">
				<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Length', 'sedona-shop' ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product->get_length() . ' ' . get_option( 'woocommerce_dimension_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->get_width() ) : ?>
			<tr class="woocommerce-product-attributes-item">
				<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Width', 'sedona-shop' ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product->get_width() . ' ' . get_option( 'woocommerce_dimension_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->get_height() ) : ?>
			<tr class="woocommerce-product-attributes-item">
				<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Height', 'sedona-shop' ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product->get_height() . ' ' . get_option( 'woocommerce_dimension_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->get_weight() && isset( $product_attributes['weight'] ) ) : ?>
			<tr class="woocommerce-product-attributes-item">
				<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Weight', 'sedona-shop' ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_attributes['weight']['value'] ); ?></td>
			</tr>
		<?php endif; ?>

	<?php elseif ( $product->is_type('variable') ) : ?>
		<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
			<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
				<th class="woocommerce-product-attributes-item__label"><?php echo wp_kses_post( $product_attribute['label'] ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_attribute['value'] ); ?></td>
			</tr>
		<?php endforeach; ?>

	<?php else : ?>
		<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
			<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
				<th class="woocommerce-product-attributes-item__label"><?php echo wp_kses_post( $product_attribute['label'] ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_attribute['value'] ); ?></td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>

</table>