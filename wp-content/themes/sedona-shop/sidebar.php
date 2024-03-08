<?php
/**
 * The blog sidebar containing the main widget area.
 *
 * @package Sedona Shop
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'sedona-shop-blog-sidebar' ) ) {
	return;
}
?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">

	<?php sedona_shop_sidebar_before(); ?>

	<?php dynamic_sidebar( 'sedona-shop-blog-sidebar' ); ?>

	<?php sedona_shop_sidebar_after(); ?>

</div><!-- #secondary -->
