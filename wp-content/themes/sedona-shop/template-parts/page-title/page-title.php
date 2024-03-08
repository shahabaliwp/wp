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
?>

<!-- Page Title -->
<section class="page-title <?php echo esc_attr( $classes ) ?> text-center" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo esc_url( $featured_image_url ); ?>);" <?php endif; ?>>
	<div class="container">			
		<div class="page-title__holder">
			<h1 class="page-title__title"><?php single_post_title(); ?></h1>
			<?php if ( $page_subtitle_text ): ?>
				<p class="page-title__subtitle"><?php echo esc_html( $page_subtitle_text ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section> <!-- end page title -->