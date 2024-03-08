<?php
/**
 * Single post
 *
 * @package Sedona Shop
 */
?>

<div class="single-post__content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?> itemscope itemtype="https://schema.org/Article">
		<div class="entry__article-wrap">

			<!-- Share -->
			<?php if ( function_exists( 'sedona_shop_social_sharing_buttons' ) && get_theme_mod( 'sedona_shop_settings_post_share_buttons_show', true ) ) : ?>
				<div class="entry__share">
					<?php echo sedona_shop_social_sharing_buttons(); ?>
				</div>
			<?php endif; ?>

			<div class="entry__article clearfix">
				<?php the_content(); ?>
			</div> <!-- .entry__article -->

			<?php sedona_shop_multi_page_pagination(); ?>
		</div>

		<!-- Tags -->
		<?php if ( get_theme_mod( 'sedona_shop_settings_post_tags_show', true ) ) : ?>
			<?php if ( has_tag( $tag ) ) : ?>
				<div class="entry__tags">
					<?php the_tags( '', '', '' ); ?>
				</div> <!-- end tags -->
			<?php endif; ?>
		<?php endif; ?>

		<!-- Share -->
		<?php if ( function_exists( 'sedona_shop_social_sharing_buttons' ) && get_theme_mod( 'sedona_shop_settings_post_share_buttons_show', true ) ) : ?>
			<div class="entry__share">
				<?php echo sedona_shop_social_sharing_buttons(); ?>
			</div>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'sedona_shop_settings_author_box_show', true ) ) {
			sedona_shop_author_box();
		} ?>
	</article>

	<!-- Related Posts -->
	<?php if ( get_theme_mod( 'sedona_shop_settings_related_posts_show', true ) && function_exists( 'sedona_shop_related_posts') ) {
		sedona_shop_related_posts();
	} ?>

	<?php
		// Comments
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

</div> <!-- .single-post__content -->