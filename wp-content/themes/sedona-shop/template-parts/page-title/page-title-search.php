<?php
/**
 * Search results page title.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$bg_image = get_theme_mod( 'sedona_shop_settings_page_title_search_image_upload', '' );
$classes = '';
if ( get_theme_mod( 'sedona_shop_settings_page_title_colors_overlay_show', true ) ) {
	$classes .= 'bg-overlay';
}
?>

<!-- Page Title -->
<section class="page-title <?php echo esc_attr( $classes ) ?> text-center" <?php if ( $bg_image ) : ?> style="background-image: url(<?php echo esc_url( $bg_image ); ?>);" <?php endif; ?>>
	<div class="container">
		<div class="page-title__holder">
			<h1 class="page-title__title">
				<?php printf( esc_html__( 'Search Results for: %s', 'sedona-shop' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</div>
	</div>
</section> <!-- end page title -->