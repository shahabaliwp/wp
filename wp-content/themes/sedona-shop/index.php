<?php
/**
 * The main template file.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

if ( ! is_front_page() ) {
	get_template_part( 'template-parts/page-title/page-title' );
}
?>

<div class="blog-section">

	<?php sedona_shop_primary_content_markup_top(); ?>

		<?php sedona_shop_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-32">
			<main class="site-main">

				<?php sedona_shop_primary_content_before(); ?>

				<?php sedona_shop_primary_content_query(); ?>

				<?php sedona_shop_post_pagination(); ?>

				<?php sedona_shop_primary_content_after(); ?>

			</main>
		</div> <!-- .blog__content -->

		<?php
			if ( sedona_shop_is_active_sidebar( 'blog', 'blog', 'right-sidebar' ) ) {
				sedona_shop_sidebar( 'sedona-shop-blog-sidebar' );
			}
		?>

		<?php sedona_shop_primary_content_bottom(); ?>

	<?php sedona_shop_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>