<?php
/**
 * The template used for 404 pages.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

$bg_image = get_theme_mod( 'sedona_shop_settings_page_404_background', SEDONA_SHOP_URI . '/assets/img/404/sedona_shop_404_bg-min.jpg' );

?>

<!-- 404 -->
<section class="section-wrap page-404 text-center" <?php if ( $bg_image ) : ?> style="background-image: url(<?php echo esc_url( $bg_image ); ?>);" <?php endif; ?>>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-8">
				<span class="page-404__number"><?php echo esc_html__( '404', 'sedona-shop' ); ?></span>
				<h1 class="page-404__title"><?php echo esc_html__( 'Page not found', 'sedona-shop' ); ?></h1>
				<p class="page-404__text mb-56"><?php printf( esc_html__( 'We\'re sorry, the page you have looked for does not exist in our database! Maybe go to our %1$shome page%2$s or try to use a search?', 'sedona-shop' ),
				'<a href="'. esc_url( home_url( '/' ) ) . '">',
				'</a>' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</section> <!-- end 404 -->

<?php get_footer();