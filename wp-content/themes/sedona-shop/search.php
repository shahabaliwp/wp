<?php
/**
 * The template for displaying search results pages.
 *
 * @package Sedona Shop
 */

get_header(); ?>

<?php
	// Page Title
	get_template_part( 'template-parts/page-title/page-title-search' );
?>

<div class="search-results-section">

	<?php sedona_shop_primary_content_markup_top(); ?>

		<?php sedona_shop_primary_content_top(); ?>

			<div id="primary" class="content blog__content mb-32 col-lg">
				<main class="site-main">

					<?php sedona_shop_primary_content_before(); ?>

					<?php sedona_shop_primary_content_query(); ?>

					<?php sedona_shop_post_pagination(); ?>

					<?php sedona_shop_primary_content_after(); ?>
					
				</main>
			</div> <!-- #primary -->

			<?php
				// Sidebar
				if ( 'fullwidth' !== sedona_shop_layout_type( 'search_results', 'fullwidth' ) && is_active_sidebar( 'sedona-shop-blog-sidebar' ) ) {
					sedona_shop_sidebar();
				}
			?>

		<?php sedona_shop_primary_content_bottom(); ?>

	<?php sedona_shop_primary_content_markup_bottom(); ?>

</div>
<?php get_footer(); ?>