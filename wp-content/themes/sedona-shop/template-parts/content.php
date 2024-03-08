<?php
/**
 * Template part for displaying post content
 *
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$post_classes = array( 'entry' );
?>

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Post thumb -->
		<div class="entry__img-holder hover-scale">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'sedona-shop-blog-post-thumb', array( 'class' => 'entry__img' ) ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="entry__body text-center">

		<?php if ( get_theme_mod( 'sedona_shop_settings_meta_category_show', true ) ) : ?>
			<span class="entry__meta-category">
				<?php echo sedona_shop_meta_category(); ?>
			</span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( get_theme_mod( 'sedona_shop_settings_meta_date_show', true ) || get_theme_mod( 'sedona_shop_settings_meta_author_show', true ) ) : ?>
			<ul class="entry__meta">

				<?php if ( get_theme_mod( 'sedona_shop_settings_meta_date_show', true ) ) : ?>
					<li class="entry__meta-date">
						<?php echo get_the_date(); ?>
					</li>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'sedona_shop_settings_meta_author_show', true ) ) : ?>
					<li class="entry__meta-author">
						<?php echo get_the_author_posts_link(); ?>
					</li>
				<?php endif; ?>

			</ul>
		<?php endif; ?>

		<!-- Excerpt -->
		<?php if ( get_theme_mod( 'sedona_shop_settings_post_excerpt_show', true ) ) : ?>
			<div class="entry__excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<!-- Read More -->
		<?php if ( get_theme_mod( 'sedona_shop_settings_post_read_more_show', true ) ) : ?>
			<a href="<?php the_permalink(); ?>" class="read-more">
				<span class="read-more__text"><?php esc_html_e( 'Read More', 'sedona-shop' ) ?></span>
			</a>
		<?php endif; ?>

	</div> <!-- .entry__body -->

</article><!-- #post-## -->