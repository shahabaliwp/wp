<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sedona Shop
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/page-title/page-title', 'single-post' ); ?>

	<section class="section-wrap box-offset-container pb-0">
		<div class="container">
			<div class="row">

				<!-- blog content -->
				<div class="content blog__content mb-32 col-lg">
					<main class="site-main">
						<?php
							if ( function_exists( 'sedona_shop_save_post_views' ) ) {
								sedona_shop_save_post_views( get_the_ID() );
							}

							get_template_part( 'template-parts/content-single', get_post_format() );
						?>
					</main>
				</div> <!-- end blog content -->

				<?php
					if ( sedona_shop_is_active_sidebar( 'blog', 'single_post', 'fullwidth' ) ) {
						sedona_shop_sidebar( 'sedona-shop-blog-sidebar' );
					}
				?>

			</div>
		</div>
	</section> <!-- end single post -->

<?php endwhile; ?>

<?php get_footer(); ?>