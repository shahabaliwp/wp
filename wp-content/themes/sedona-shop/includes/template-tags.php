<?php
/**
 * Custom template tags for this theme.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( ! function_exists( 'sedona_shop_meta_category' ) ) {
	/**
	* Post caetgory meta
	*
	* @since 1.0.0
	*/
	function sedona_shop_meta_category() {
		$categories = get_the_category();
		$separator = ', ';
		$categories_output = '';
		$output = '';

		if ( !empty($categories) ):
			foreach( $categories as $index => $category ):
				if ($index > 0) : $categories_output .= $separator; endif;
				$categories_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
			endforeach;
		endif;

		if ( 'post' == get_post_type() ) :
			$output .= $categories_output;
		endif;

		return $output;

	}
}

if ( ! function_exists( 'sedona_shop_meta_date' ) ) {
	/**
	* Post date meta
	*
	* @since 1.0.0
	*/
	function sedona_shop_meta_date() {
		$posted_on = get_the_date();
		$output = '';
		$output .= sprintf('<span>%s</span>', $posted_on);

		return $output;
	}
}

if ( ! function_exists( 'sedona_shop_meta_comments' ) ) {
	/**
	* Post comments meta
	*
	* @since 1.0.0
	*/
	function sedona_shop_meta_comments() {
		$comments_num = get_comments_number();
		$output = '';

		if ( comments_open() ) {
			if( $comments_num == 0 ) {
				$comments = esc_html__( '0 Comments', 'sedona-shop' );
			} elseif ( $comments_num > 1 ) {
				$comments = $comments_num . esc_html__(' Comments', 'sedona-shop');
			} else {
				$comments = esc_html__('1 Comment', 'sedona-shop');
			}
			$comments = sprintf('<a href="%1$s">%2$s</a>', get_comments_link(), $comments );
		} else {
			$comments = esc_html__('Comments are closed', 'sedona-shop');
		}

		$output .= $comments;
		return $output;
	}
}

if ( ! function_exists( 'sedona_shop_related_posts' ) ) {
	/**
	 * Related Posts
	 */
	function sedona_shop_related_posts() {

		global $post;
		$tags = wp_get_post_tags( $post->ID );
		$author_id = get_the_author_meta( 'ID' );
		$related_by = get_theme_mod( 'sedona_shop_settings_related_posts_relation', 'category' );

		$args = array(
			'post_type'=>'post',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'post__not_in' => array( get_the_ID() ),
			'ignore_sticky_posts' => true,
			'meta_query' => array(
				array(
					'key' => '_thumbnail_id'
				)
			),
		);

		if ( $tags && 'tag' === $related_by ) {
			$tag_ids = array();
			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}

			$args['tag__in'] = $tag_ids;

		} elseif ( 'category' === $related_by ) {
			$args['category__in'] = wp_get_post_categories( get_the_ID() );
		} elseif ( 'author' === $related_by ) {        
			$args['author'] = $author_id;
		}

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<section class="related-posts">
				<h2 class="h3 mb-24"><?php echo esc_html__( 'You might also like', 'sedona-shop'); ?></h2>
				<div class="row row-20">

					<?php while( $query->have_posts() ) : $query->the_post(); ?>

						<div class="col-md-4 col-sm-6">
							<article <?php post_class( 'entry related-posts__entry' ); ?>>

								<?php if ( has_post_thumbnail() ) : ?>
									<div class="entry__img-holder hover-scale">
										<!-- Post thumb -->
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail( 'sedona-blog-masonry-post-thumb', array( 'class' => 'entry__img' ) ); ?>
										</a>
									</div>
								<?php endif; ?>

								<div class="entry__body">

									<?php the_title( sprintf( '<h3 class="entry__title entry__title--extra-small"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

									<?php if ( get_theme_mod( 'sedona_shop_settings_meta_date_show', true ) ) : ?>
										<ul class="entry__meta">

											<?php if ( get_theme_mod( 'sedona_shop_settings_meta_date_show', true ) ) : ?>
												<li class="entry__meta-date">
													<?php echo get_the_date(); ?>
												</li>
											<?php endif; ?>

										</ul>
									<?php endif; ?>

								</div> <!-- .entry__body -->
							</article><!-- #post-## -->
						</div>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				</div> <!-- .row -->
			</section> <!-- .related-posts -->
		<?php endif;
	}
}

if ( ! function_exists( 'sedona_shop_multi_page_pagination' ) ) {
	/**
	* Multi-page pagination
	*
	* @since 1.0.0
	*/
	function sedona_shop_multi_page_pagination() {
		$defaults = array(
			'before'           => '<nav class="post-pagination">' . '<span>' . esc_html( 'Pages:', 'sedona-shop' ) . '</span>',
			'after'            => '</nav>',
			'link_before'      => '<span class="post-pagination__number">',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => esc_html( 'Next page', 'sedona-shop' ),
			'previouspagelink' => esc_html( 'Previous page', 'sedona-shop' ),
			'pagelink'         => '%',
			'echo'             => 1
		);

		wp_link_pages( $defaults );
	}
}


if ( ! function_exists( 'sedona_shop_post_pagination' ) ) {
	/**
	* Post pagination
	*
	* @since 1.0.0
	*/
	function sedona_shop_post_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		} ?>

		<!-- Pagination Numbers -->
		<nav class="pagination clearfix">
			<?php $args = array(
				'prev_next'          => true,
				'prev_text' => is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>',
				'next_text' => is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="fill-current group-hover:fill-accent"><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path></svg>',
			); ?>
			<?php echo paginate_links( $args ); ?>
		</nav>

		<?php
	}
}


if ( ! function_exists( 'sedona_shop_author_box' ) ) {
	/**
	* Author Box
	*
	* @since 1.0.0
	*/
	function sedona_shop_author_box() {

		$facebook = get_the_author_meta( 'facebook' );
		$twitter = get_the_author_meta( 'twitter' );
		$linkedin = get_the_author_meta( 'linkedin' );
		$github = get_the_author_meta( 'github' );
		$youtube = get_the_author_meta( 'youtube' );
		$vimeo = get_the_author_meta( 'vimeo' );

		if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="entry-author entry-author--box clearfix">
				<span itemscope itemprop="image">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, null, null, array( 'class' => array( 'entry-author__img' ) ) ); ?>
					</a>                
				</span>
				<div class="entry-author__info">
					<h6 class="entry-author__name" itemprop="url" rel="author">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" itemprop="name">
							<span itemprop="author" itemscope itemtype="http://schema.org/Person" class="entry-author__name">
								<?php the_author_meta( 'display_name' ); ?>
							</span>
						</a>
					</h6>
					<p class="mb-0"><?php the_author_meta( 'description' ); ?></p>

					<!-- Socials -->
					<?php if ( $facebook || $twitter || $linkedin || $youtube || $vimeo ) : ?>
						<div class="entry-author__socials socials socials--nobase">                    
							<?php if ( $facebook ) : ?>
								<a href="<?php echo esc_url( $facebook ); ?>" class="social social-facebook" title="<?php esc_attr_e('facebook', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="16" height="16"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
								</a>
							<?php endif; ?>
							<?php if ( $twitter ) : ?>
								<a href="<?php echo esc_url( $twitter ); ?>" class="social social-twitter" title="<?php esc_attr_e('twitter', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
								</a>
							<?php endif; ?>                
							<?php if ( $linkedin ) : ?>
								<a href="<?php echo esc_url( $linkedin ); ?>" class="social social-linkedin" title="<?php esc_attr_e('linkedin', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
								</a>
							<?php endif; ?>
							<?php if ( $github ) : ?>
								<a href="<?php echo esc_url( $github ); ?>" class="social social-github" title="<?php esc_attr_e('github', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="16" height="16"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
								</a>
							<?php endif; ?>
							<?php if ( $youtube ) : ?>
								<a href="<?php echo esc_url( $youtube ); ?>" class="social social-youtube" title="<?php esc_attr_e('youtube', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
								</a>
							<?php endif; ?>
							<?php if ( $vimeo ) : ?>
								<a href="<?php echo esc_url( $vimeo ); ?>" class="social social-vimeo" title="<?php esc_attr_e('vimeo', 'sedona-shop' ); ?>" rel="noopener nofollow" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16"><path d="M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z"/></svg>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		<?php endif;
	}
}


if ( ! function_exists( 'sedona_shop_term_description' ) ) {
	/**
	* Adds class to term description
	* @since 1.0.0
	*/
	function sedona_shop_term_description( $before = '', $after = '</div>' ) {
		$description = apply_filters( 'get_the_archive_description', wp_strip_all_tags( term_description() ) );
		if ( !empty( $description ) ) {
			echo html_entity_decode( esc_html( $before . $description . $after ) );
		}
	}
}