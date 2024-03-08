<?php
/**
 * Archives template.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<?php
	// Page Title
	get_template_part( 'template-parts/page-title/page-title', 'archive' );
?>

<div class="archive-section">
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
				// Sidebar
				if ( 'fullwidth' !== sedona_shop_layout_type( 'archives' ) ) {
					sedona_shop_sidebar();
				}
			?>

		<?php sedona_shop_primary_content_bottom(); ?>

	<?php sedona_shop_primary_content_markup_bottom(); ?>

</div>
<?php get_footer();