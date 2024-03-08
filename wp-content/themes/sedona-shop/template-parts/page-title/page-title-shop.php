<?php
/**
 * Page title.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$featured_image_url = sedona_shop_page_featured_image_url( get_the_ID() );
if ( is_home() ) {
	$page_subtitle_text = get_post_meta( get_option( 'page_for_posts' ), 'sedona_shop_page_subtitle_text', true );
} else {
	$page_subtitle_text = get_post_meta( get_the_ID(), 'sedona_shop_page_subtitle_text', true );
}

$classes = '';
if ( get_theme_mod( 'sedona_shop_settings_page_title_colors_overlay_show', true ) ) {
	$classes .= 'bg-overlay';
}


if ( ! function_exists( 'sedona_shop_taxonomy_description' ) ) {
	function sedona_shop_taxonomy_description() {
		if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
			$term = get_queried_object();

			if ( $term ) {
				/**
				* Filters the archive's raw description on taxonomy archives.
				*
				* @since 6.7.0
				*
				* @param string  $term_description Raw description text.
				* @param WP_Term $term             Term object for this taxonomy archive.
				*/
				$term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $term->description, $term );

				if ( ! empty( $term_description ) ) {
					echo '<div class="page-title__subtitle">' . wc_format_content( wp_kses_post( $term_description ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}
	}
}


?>

<!-- Page Title -->
<section class="page-title <?php echo esc_attr( $classes ) ?> text-center" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo esc_url( $featured_image_url ); ?>);" <?php endif; ?>>
	<div class="container">			
		<div class="page-title__holder">

			<?php sedona_shop_page_title_before(); ?>
				<h1 class="page-title__title"><?php woocommerce_page_title(); ?></h1>
			<?php sedona_shop_page_title_after(); ?>
			<?php sedona_shop_taxonomy_description(); ?>

		</div>
	</div>
</section> <!-- end page title -->