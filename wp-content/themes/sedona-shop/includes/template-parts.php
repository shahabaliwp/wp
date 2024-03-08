<?php
/**
 * Template parts
 * @author  	DeoThemes
 * @copyright (c) Copyright by DeoThemes
 * @link      https://deothemes.com
 * @package 	Sedona Shop
 * @since 		1.0.0
 */

add_action( 'sedona_shop_header', 'sedona_shop_header_markup' );
add_action( 'sedona_shop_menu_after', 'sedona_shop_last_menu_item' );
add_action( 'sedona_shop_footer', 'sedona_shop_footer_template' );
add_action( 'sedona_shop_comments', 'sedona_shop_comments_template' );

if ( ! function_exists( 'sedona_shop_header_markup' ) ) {
	/**
	* Get site Header
	*/
	function sedona_shop_header_markup() {
		if ( ! get_theme_mod( 'sedona_shop_settings_header_show', true ) ) {
			return;
		}
		get_template_part( 'template-parts/header/header-default-template' );		
	}
}

if ( ! function_exists( 'sedona_shop_last_menu_item' ) ) {
	/**
	* Header last item in menu
	*/
	function sedona_shop_last_menu_item( $is_mobile = false ) {
		$hide_on_mobile = get_theme_mod( 'sedona_shop_settings_header_last_menu_item_hide', false );

		$search = get_theme_mod( 'sedona_shop_settings_header_search_show', true );
		$account = get_theme_mod( 'sedona_shop_settings_header_account_show', true );
		$wishlist = get_theme_mod( 'sedona_shop_settings_header_wishlist_show', true );
		$cart = get_theme_mod( 'sedona_shop_settings_header_shopping_cart', true );

		if ( $hide_on_mobile ) {
			return;
		}

		if ( false === $search ) {
			return;
		}

		if ( ! $is_mobile ) {
			echo '<div class="nav__icons d-lg-flex d-none">';
		}

			if ( $search ) { ?>
				<div class="nav__icons-item">
					<div class="sedona-shop-menu-search">
						<button type="button" class="sedona-shop-menu-search__trigger" title="<?php echo esc_attr__( 'Open Search', 'sedona-shop' ); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class="sedona-shop-icon-search sedona-shop-menu-search__icon">
								<path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
							</svg>
						</button>
						<div class="sedona-shop-menu-search-modal" tabindex="-1" aria-hidden="true" aria-label="<?php echo esc_attr( 'Search Modal', 'sedona-shop' ); ?>">
							<div class="sedona-shop-menu-search-modal__inner">
								<div class="container">
									<div class="sedona-shop-menu-search__input-container relative">
									<?php get_search_form(); ?>
									</div>
								</div>				
							</div>
						</div>
					</div>
				</div>				
				<?php
			}

			if ( sedona_shop_is_woocommerce_activated() && $account ) { ?>
				<div class="nav__icons-item">
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="nav__icons-item-url">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class="sedona-shop-icon-account">
							<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
						</svg>
					</a>
				</div>
				<?php
			}

			if ( $wishlist && defined( 'YITH_WCWL' ) ) { ?>
				<div class="nav__icons-item">
					<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" class="nav__icons-item-url sedona-shop-menu-wishlist">
						<span class="screen-reader-text"><?php echo esc_html__( 'Wishlist', 'sedona-shop' ); ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class="sedona-shop-icon-wishlist">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
						</svg>
						<?php if ( function_exists( 'sedona_shop_wishlist_count' ) ) : ?>
							<span class="sedona-shop-menu-wishlist__count sedona-shop-item-counter <?php if ( 0 === yith_wcwl_count_all_products() ) echo 'd-none'; ?>">
								<?php echo sedona_shop_wishlist_count(); ?>
							</span>
						<?php endif; ?>					
					</a>
				</div>
				<?php
			}

			if ( sedona_shop_is_woocommerce_activated() && $cart ) {
				echo '<div class="nav__icons-item">';
					sedona_shop_woo_cart_icon( true );
				echo '</div>';
			}			

		if ( ! $is_mobile ) {
			echo '</div>';
		}

	}
}

if ( ! function_exists( 'sedona_shop_menu_mobile' ) ) {
	/**
	* Mobile menu
	*/
	function sedona_shop_menu_mobile() { ?>
		<div class="nav__mobile d-lg-none">

			<?php sedona_shop_last_menu_item( true ); ?>

			<?php if ( has_nav_menu('primary-menu') ) : ?>
				<!-- Mobile toggle -->
				<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
					<span class="visually-hidden"><?php esc_html_e( 'Toggle navigation', 'sedona-shop' ); ?></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
				</button>
			<?php endif; ?>

		</div>
		<?php
	}
}

if ( ! function_exists( 'sedona_shop_logo' ) ) {
	/**
	* Logo
	*/
	function sedona_shop_logo() {
		$width = get_theme_mod( 'sedona_shop_settings_header_logo_width' );
		$logo = get_theme_mod( 'sedona_shop_settings_logo' );
		$size = ( is_customize_preview() ) ? 'full' : [ $width, 0 ];
		?>

		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-url" itemtype="https://schema.org/Organization" itemscope="itemscope">
			<?php if ( isset( $logo['id'] ) ) : ?>
				<img src="<?php echo esc_url( $logo['url'] ) ?>"
				class="logo"
				width="<?php echo esc_attr( $logo['width'] ); ?>"
				height="<?php echo esc_attr( $logo['height'] ); ?>"
				alt="<?php bloginfo( 'name' ) ?>" />
			<?php else : ?>
				<span class="site-title"><?php bloginfo( 'name' ) ?></span>
				<?php $tagline = get_bloginfo( 'description', 'display' ); ?>
				<p class="site-tagline"><?php echo esc_html( $tagline ); ?></p>
			<?php endif; ?>
		</a>

		<?php
	}
}

if ( ! function_exists( 'sedona_shop_footer_template' ) ) {
	/**
	* Footer main template
	*/
	function sedona_shop_footer_template() {
		get_template_part( 'template-parts/footer/footer-default-template' );
	}
}

if ( ! function_exists( 'sedona_shop_footer_bottom_text' ) ) {

	/**
	 * Footer bottom text
	 *
	 * @since 1.0.0
	 */
	function sedona_shop_footer_bottom_text() {
		$output = get_theme_mod( 'sedona_shop_settings_footer_bottom_text', sprintf(
			esc_html__( '&copy; [current-year] %1$s. Made by %2$sDeoThemes%3$s' , 'sedona-shop' ),
			get_bloginfo( 'name' ),
			'<a href="https://deothemes.com">',
			'</a>'
		) );

		$output = str_replace( '[current-year]', date_i18n( 'Y' ), $output );

		echo do_shortcode( wp_kses_post( $output ) );
	}
}

if ( ! function_exists( 'sedona_shop_comments_template' ) ) {
	/**
	* Comments template
	*/
	function sedona_shop_comments_template() {
	
		if ( comments_open() || get_comments_number() ) : ?>
			<!-- Comments -->
			<div class="comments-wrap">
			<?php comments_template(); ?>
		<?php endif;
	}
}

if ( ! function_exists( 'sedona_shop_back_to_top' ) ) {
	/**
	* Back to top
	*/
	function sedona_shop_back_to_top() {
		if ( get_theme_mod( 'sedona_shop_settings_settings_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.828l-4.95 4.95-1.414-1.414L12 8l6.364 6.364-1.414 1.414z"/></svg>
				</a>
			</div>
		<?php endif; 
	}
}

if ( ! function_exists( 'sedona_shop_primary_content_markup_top' ) ) {
	/**
	* Content markup top
	*/
	function sedona_shop_primary_content_markup_top() {
		?>
			<div class="container">
				<div class="row">
		<?php
	}
}

if ( ! function_exists( 'sedona_shop_primary_content_markup_bottom' ) ) {
	/**
	* Content markup bottom
	*/
	function sedona_shop_primary_content_markup_bottom() {
		?>
				</div>
			</div>
		<?php
	}
}