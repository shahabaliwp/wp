<?php
/**
 * Core Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Checks if WooCommerce is activated
 * @return boolean
 */
if ( ! function_exists( 'sedona_shop_is_woocommerce_activated' ) ) {
	function sedona_shop_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

/**
  * Shim for wp_body_open
  *
  * @since  1.0.0
  */
if ( ! function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}


if ( ! function_exists( 'rwmb_meta' ) ) {
	/**
	* Metabox check
	*
	* @since 1.0.0
	*/
	function rwmb_meta( $key, $args = '', $post_id = null ) {
		return false;
	}
}

/**
 * Get page ID by title
 */
function sedona_shop_get_page_by_title( $page_title, $post_type = 'page' ) {
	$posts = get_posts(
		array(
			'post_type'              => $post_type,
			'title'                  => $page_title,
			'post_status'            => 'all',
			'numberposts'            => 1,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,           
			'orderby'                => 'post_date ID',
			'order'                  => 'ASC',
		)
	);

	if ( ! empty( $posts ) ) {
		$post = $posts[0];
	} else {
		$post = null;
	}

	return $post;
}

/**
  * Shim for wp_body_open
  *
  * @since  1.0.0
  */
if ( ! function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

/**
* Check if page built with Elementor
*
* @since  1.0.0
*/
function sedona_shop_is_elementor_page() {
	$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

	if ( is_search() || is_archive() ) {
		return false;
	}

	if ( (bool)$elementor_page ) {
		return true;
	} else {
		return false;
	}	
}


if ( ! function_exists( 'sedona_shop_is_gutenberg' ) ) {
	/**
	* Gutenberg Check
	*
	* @since 1.0.0
	*/
	function sedona_shop_is_gutenberg() {
		return function_exists( 'register_block_type' ); 
	}
}

/**
 * Custom excerpt length
 */
function sedona_shop_custom_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'sedona_shop_settings_posts_excerpt_settings', 20 );
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'sedona_shop_custom_excerpt_length', 999 );


/**
 * Replace excerpt dotslength
 */
function sedona_shop_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'sedona_shop_excerpt_more', 21 );


if ( ! function_exists( 'sedona_shop_custom_post_type_nav_classes' ) ) {
	/**
	* Fix for current_page_parent menu class
	*
	* @since 1.0.0
	*/
	function sedona_shop_custom_post_type_nav_classes( $classes, $item ) {
		$custom_post_type = array( 'portfolio', 'services' );
		if ( ( is_post_type_archive( $custom_post_type ) || is_singular( $custom_post_type ) )
		&& get_post_meta( $item->ID, '_menu_item_object_id', true ) == get_option( 'page_for_posts' ) ){
			$classes = array_diff( $classes, array( 'current_page_parent' ) );
		}
		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'sedona_shop_custom_post_type_nav_classes', 10, 2 );


if ( ! function_exists( 'sedona_shop_page_featured_image_url' ) ) {
	/**
	* Featured Image URL
	*
	* @return string Featured image URL.
	*/
	function sedona_shop_page_featured_image_url( $page_id ) {

		$page_for_posts = get_option( 'page_for_posts' );

		if ( is_home() && $page_for_posts ) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'full' );
			$featured_image = isset( $img[0] ) ? $img[0] : '';
			return $featured_image;
		} else {
			return get_the_post_thumbnail_url( $page_id );
		}

	}
}

/**
 * Fix pagination on portfolio pages
 *
 * @since 1.0.0
 */
function sedona_shop_pagination_rewrite() {
	$permalinks = get_option( 'sedona_shop_permalinks' );
	$portfolio_base = empty( $permalinks['portfolio_base'] ) ? 'portfolio' : $permalinks['portfolio_base'];

  add_rewrite_rule( $portfolio_base . '/page/?([0-9]{1,})/?$', 'index.php?pagename=' . $portfolio_base . '&paged=$matches[1]', 'top');
}
add_action('init', 'sedona_shop_pagination_rewrite');


if ( ! function_exists( 'sedona_shop_sidebar' ) ) {
	/**
	* Get sidebar
	*
	* @since 1.0.0
	*/
	function sedona_shop_sidebar( $sidebar = '' ) {
		if ( ! is_active_sidebar( $sidebar ) ) return;
		?>
			<aside class="col-lg-4 sidebar">
				<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
					<?php sedona_shop_sidebar_before(); ?>
					<?php dynamic_sidebar( $sidebar ); ?>
					<?php sedona_shop_sidebar_after(); ?>
				</div> <!-- #secondary -->
			</aside>
		<?php
	}
}


if ( ! function_exists( 'sedona_shop_is_active_sidebar' ) ) {
	/**
	* Check if sidebar is active
	* @param string sidebar name
	* @param string sidebar type
	* @param string default layout
	* @return bool
	* @since 1.0.0
	*/
	function sedona_shop_is_active_sidebar( $sidebar = '', $layout = '', $default = 'fullwidth' ) {
		if ( 'fullwidth' !== sedona_shop_layout_type( $layout, $default ) && is_active_sidebar( 'sedona-shop-' . $sidebar . '-sidebar' ) ) {
			return true;
		}
	}
}


if ( ! function_exists( 'sedona_shop_layout_type' ) ) {
	/**
	 * Check layout type based on customizer and meta settings
	 * @return string $type Layout type
	 */
	function sedona_shop_layout_type( $type, $default = 'fullwidth' ) {
		$layout = '';
		$meta = get_post_meta( get_the_ID(), '_sedona_shop_page_layout', true );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( is_home() && $page_for_posts ) {
			$meta = get_post_meta( $page_for_posts, '_sedona_shop_page_layout', true );
		}

		if ( is_archive() || is_404() || is_search() || is_home() ) {
			$meta = '';
		}

		if ( 'left-sidebar' == get_theme_mod( 'sedona_shop_settings_' . $type .  '_layout_type', $default ) ) {
			$layout = ( $meta ) ? $meta : 'left-sidebar';		
		}

		if ( 'right-sidebar' == get_theme_mod( 'sedona_shop_settings_' . $type .  '_layout_type', $default ) ) {
			$layout = ( $meta ) ? $meta : 'right-sidebar';
		}

		if ( 'fullwidth' == get_theme_mod( 'sedona_shop_settings_' . $type .  '_layout_type', $default ) ) {			
			$layout = ( $meta ) ? $meta : 'fullwidth';
		}	

		return $layout;
	}
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sedona_shop_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Page layout llass
	if ( is_page() ) {
		if ( sedona_shop_is_woocommerce_activated() ) {
			if ( is_cart() || is_checkout() || is_account_page() ) {
				$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'shop_pages' );
			} else {
				$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'page' );
			}
		} else {
			$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'page' );
		}		
	}

	// Blog Layout Class
	if ( is_home() ) {
		$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'blog', 'right-sidebar' );
	}

	// Single Post Layout Class
	if ( is_single() ) {
		if ( sedona_shop_is_woocommerce_activated() && is_product() ) {
			$classes[] = '';
		} else {
			$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'single_post' );
		}
	}
    
  // Archives Layout Class
	if ( is_archive() ) {
		if ( sedona_shop_is_woocommerce_activated() && is_shop() ) {
			$classes[] = '';	
		} else {
			$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'archive' );
		}
	}

	// Search Layout Class
	if ( is_search() ) {
		$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'search_results' );	
	}

	// Shop Layout Class
	if ( sedona_shop_is_woocommerce_activated() ) {
		if ( ! is_product() && is_woocommerce() || is_shop() ) {
			$classes[] = 'sedona-shop-' . sedona_shop_layout_type( 'shop', 'left-sidebar' );
		}
	}

	$classes[] = '';

	return $classes;
}
add_filter( 'body_class', 'sedona_shop_body_classes' );



/**
 * Adds custom admin classes.
 *
 * @param string $classes Classes for the body element.
 * @return string
 */
function sedona_shop_admin_body_classes( $classes ) {

	$screen = get_current_screen();

	// Add blog layout class
	if( $screen->id === "post" ) {
		$classes = 'sedona-shop-' . sedona_shop_layout_type( 'single_post' );
	}

	// Add page layout class
	if( $screen->id === "page" ) {
		$classes = 'sedona-shop-' . sedona_shop_layout_type( 'page' );
	}
	
	return $classes;
}
add_filter( 'admin_body_class', 'sedona_shop_admin_body_classes' );