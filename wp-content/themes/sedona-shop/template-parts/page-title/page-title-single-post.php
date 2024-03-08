<?php
/**
 * Single post page title.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$featured_image_url = get_the_post_thumbnail_url( get_the_ID() ); ?>

<!-- Page Title -->
<section class="page-title page-title--tall blog-featured-img bg-overlay text-center" <?php if ( $featured_image_url ) : ?> style="background-image: url(<?php echo esc_url( $featured_image_url ); ?>);" <?php endif; ?>>
	<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'full', array( 'class' => 'd-none' ));
	} ?>
	<div class="container">
		<div class="page-title__holder">

			<?php if ( get_theme_mod( 'sedona_shop_settings_single_category_show', true ) ) : ?>
				<span class="entry__meta-category">
					<?php echo sedona_shop_meta_category(); ?>
				</span>
			<?php endif; ?>

			<h1 class="page-title__title"><?php the_title(); ?></h1>

			<?php if ( get_theme_mod( 'sedona_shop_settings_single_author_show', true ) || get_theme_mod( 'sedona_shop_settings_single_date_show', true ) ) : ?>

				<ul class="entry__meta">
					<?php if ( get_theme_mod( 'sedona_shop_settings_single_date_show', true ) ) : ?>
						<li class="entry__meta-date">
							<?php echo get_the_date(); ?>
						</li>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'sedona_shop_settings_single_author_show', true ) ) : ?>
						<?php $author_nicename = get_the_author_meta( 'user_nicename' ); ?>
						<?php if ( ! empty( $author_nicename ) ) : ?>							
							<li>
								<div class="entry__meta-author">
									<?php echo esc_html( 'by ', 'sedona-shop' ) . get_the_author_posts_link(); ?>
								</div>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section> <!-- end page title -->