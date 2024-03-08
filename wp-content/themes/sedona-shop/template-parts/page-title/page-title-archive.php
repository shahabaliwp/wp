<?php
/**
 * Archive page title.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$bg_image = ( get_theme_mod( 'sedona_shop_settings_page_title_archives_image_upload' ) ) ? get_theme_mod( 'sedona_shop_settings_page_title_archives_image_upload' ) : get_the_post_thumbnail_url();
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
				<?php
					if ( is_category() || is_tag() ) :
						single_cat_title();

					elseif ( is_author() ) :
						printf( esc_html__( 'All Posts by: %s', 'sedona-shop' ), '<span class="vcard">' . get_the_author() . '</span>' );

					elseif ( is_day() ) :
						printf( esc_html__( 'Day: %s', 'sedona-shop' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( esc_html__( 'Month: %s', 'sedona-shop' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sedona-shop' ) ) . '</span>' );

					elseif ( is_year() ) :
						printf( esc_html__( 'Year: %s', 'sedona-shop' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sedona-shop' ) ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						esc_html_e( 'Asides', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						esc_html_e( 'Galleries', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						esc_html_e( 'Images', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						esc_html_e( 'Videos', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						esc_html_e( 'Quotes', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						esc_html_e( 'Links', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						esc_html_e( 'Statuses', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						esc_html_e( 'Audios', 'sedona-shop' );

					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						esc_html_e( 'Chats', 'sedona-shop' );

					else :
						esc_html_e( 'Archives', 'sedona-shop' );
					endif;
				?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					sedona_shop_term_description( '<div class="page-title__subtitle">', '</div>' );
				endif;
			?>
		</div>
	</div>
</section> <!-- end page title -->