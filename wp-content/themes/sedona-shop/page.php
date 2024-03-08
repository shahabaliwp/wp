<?php
/**
 * Default Page Template
 *
 * @package Sedona Shop
 * @since   Sedona Shop 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php
		// Check if the page built with Elementor		
		if ( sedona_shop_is_elementor_page() ) : ?>

			<?php sedona_shop_primary_content_top(); ?>			

			<main class="elementor-main-content site-main">

				<?php sedona_shop_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php sedona_shop_primary_content_after(); ?>

			</main>
			
			<?php sedona_shop_comments(); ?>

			<?php sedona_shop_primary_content_bottom(); ?>

		<?php else : ?>

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<div class="page-section">

				<?php sedona_shop_primary_content_markup_top(); ?>
					<?php sedona_shop_primary_content_top(); ?>

					
					<div id="primary" class="content page-content col-lg mb-32">
						<main class="site-main">

							<?php sedona_shop_primary_content_before(); ?>

							<div class="entry__article clearfix">
								<?php the_content(); ?>
							</div>

							<?php sedona_shop_multi_page_pagination(); ?>

							<?php sedona_shop_comments(); ?>

							<?php sedona_shop_primary_content_after(); ?>

						</main>
					</div> <!-- .page-content -->

					<?php sedona_shop_primary_content_bottom(); ?>

					<?php
						// Sidebar
						if ( 'fullwidth' !== sedona_shop_layout_type( 'page' ) && is_active_sidebar( 'sedona-shop-page-sidebar' ) ) {
							sedona_shop_sidebar( 'page' );
						}
					?>				

				<?php sedona_shop_primary_content_markup_bottom(); ?>

			</div> <!-- .page-section -->

		<?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>