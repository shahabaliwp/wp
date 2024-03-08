<?php

/**
 * WooCommerce Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
if ( !function_exists( 'sedona_shop_hover_shop_loop_image' ) ) {
    /**
     * Product image back on hover
     */
    function sedona_shop_hover_shop_loop_image()
    {
        $image_id = ( isset( wc_get_product()->get_gallery_image_ids()[0] ) ? wc_get_product()->get_gallery_image_ids()[0] : null );
        if ( $image_id ) {
            echo  wp_get_attachment_image(
                $image_id,
                'woocommerce_thumbnail',
                '',
                [
                'class' => 'sedona-shop-product-image-back',
            ]
            ) ;
        }
    }

}

if ( class_exists( 'YITH_WCQV' ) ) {
    /**
     * QuickView button
     */
    function sedona_shop_quickview_button_html( $button, $label, $product )
    {
        $button = '<a href="#" class="yith-wcqv-button" data-product_id="' . esc_attr( $product->get_id() ) . '">' . '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke-width="1.5" stroke="currentColor" class="sedona-shop-product__quickview-button-icon">
			<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
			<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
		</svg><span class="sedona-shop-product__quickview-button-label">' . $label . '</span></a>';
        return $button;
    }
    
    add_filter(
        'yith_add_quick_view_button_html',
        'sedona_shop_quickview_button_html',
        10,
        3
    );
}


if ( !function_exists( 'sedona_shop_display_numeric_rating' ) ) {
    /**
     * Display numeric rating
     */
    function sedona_shop_display_numeric_rating( $html )
    {
        if ( is_admin() ) {
            return;
        }
        global  $product ;
        if ( !is_a( $product, 'WC_Product' ) ) {
            return;
        }
        $average = $product->get_average_rating();
        
        if ( $average > 0 ) {
            $html = '<span class="sedona-shop-average-rating">' . sprintf( '%.1f', $average ) . '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>';
        } else {
            $html = '';
        }
        
        return $html;
    }
    
    add_filter( 'woocommerce_product_get_rating_html', 'sedona_shop_display_numeric_rating' );
}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'sedona_shop_wishlist_count' ) ) {
    /**
     * Wislist count
     */
    function sedona_shop_wishlist_count()
    {
        ob_start();
        ?>
		<span class="yith-wcwl-items-count">
			<?php 
        echo  esc_html( yith_wcwl_count_all_products() ) ;
        ?>
		</span>
		<?php 
        return ob_get_clean();
    }

}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'sedona_shop_wishlist_ajax_update_count' ) ) {
    /**
     * Wislist Ajax update
     */
    function sedona_shop_wishlist_ajax_update_count()
    {
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products(),
        ) );
    }
    
    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'sedona_shop_wishlist_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'sedona_shop_wishlist_ajax_update_count' );
}

/**
 * Wislist JS
 */

if ( defined( 'YITH_WCWL' ) && !function_exists( 'sedona_shop_wishlist_enqueue_script' ) ) {
    function sedona_shop_wishlist_enqueue_script()
    {
        wp_add_inline_script( 'jquery-yith-wcwl', "\r\n\t\t\t\tjQuery( function( \$ ) {\r\n\t\t\t\t\t\$( document ).on( 'added_to_wishlist removed_from_wishlist', function() {\r\n\t\t\t\t\t\t\$.get( yith_wcwl_l10n.ajax_url, {\r\n\t\t\t\t\t\t\taction: 'yith_wcwl_update_wishlist_count'\r\n\t\t\t\t\t\t}, function( data ) {\r\n\t\t\t\t\t\t\tif ( 0 === data.count ) {\r\n\t\t\t\t\t\t\t\t\$('.sedona-shop-menu-wishlist__count').addClass('d-none');\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t} else {\r\n\t\t\t\t\t\t\t\t\$('.sedona-shop-menu-wishlist__count').removeClass('d-none')\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t\t\$('.yith-wcwl-items-count').html( data.count );           \r\n\t\t\t\t\t\t} );\r\n\t\t\t\t\t} );\r\n\t\t\t\t} );\r\n\t\t\t" );
    }
    
    add_action( 'wp_enqueue_scripts', 'sedona_shop_wishlist_enqueue_script', 20 );
}

/**
 * WooCommerce cart
 */
if ( !function_exists( 'sedona_shop_woo_cart_icon' ) ) {
    function sedona_shop_woo_cart_icon( $minicart_show = false, $auto_open = true )
    {
        static  $called = false ;
        $auto_open = get_theme_mod( 'sedona_shop_settings_woocommerce_auto_open_mini_cart', true );
        if ( !sedona_shop_is_woocommerce_activated() || is_null( WC()->cart ) ) {
            return;
        }
        $count = WC()->cart->get_cart_contents_count();
        ?>

		<div class="sedona-shop-menu-cart woocommerce">
			<a class="nav__icons-item-url sedona-shop-menu-cart__url sedona-shop-offcanvas-js-trigger <?php 
        if ( $auto_open ) {
            echo  "sedona-shop-auto-open" ;
        }
        ?>" href="<?php 
        echo  esc_url( wc_get_cart_url() ) ;
        ?>" title="<?php 
        echo  esc_attr__( 'View my shopping cart', 'sedona-shop' ) ;
        ?>">
				<span class="sedona-shop-menu-cart__icon-holder">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class="sedona-shop-icon-cart sedona-shop-menu-cart__icon">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
					</svg>
					<span class="sedona-shop-menu-cart__count sedona-shop-item-counter <?php 
        if ( 0 === $count ) {
            echo  'd-none' ;
        }
        ?>"><?php 
        echo  esc_html( $count ) ;
        ?></span>
				</span>
			</a>

			<?php 
        
        if ( $minicart_show ) {
            ?>

				<?php 
            
            if ( !$called ) {
                $called = true;
                add_action( 'sedona_shop_footer_after', function () {
                    $count = WC()->cart->get_cart_contents_count();
                    ?>

					<div class="sedona-shop-offcanvas">
						<div class="sedona-shop-offcanvas__panel">
							<div class="sedona-shop-offcanvas__panel-header">
								<h6 class="sedona-shop-offcanvas__panel-header-title"><?php 
                    echo  esc_html__( 'Cart', 'sedona-shop' ) ;
                    ?></h6>
								<button class="sedona-shop-offcanvas__close">
									<span class="screen-reader-text"><?php 
                    echo  esc_html__( 'Close offcanvas panel', 'sedona-shop' ) ;
                    ?></span>
									<svg class="sedona-shop-offcanvas__close-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
								</button>
							</div>
							
							<div class="sedona-shop-offcanvas__mini-cart">
								<?php 
                    
                    if ( 0 === $count ) {
                        echo  '<div class="sedona-shop-offcanvas__mini-cart-empty">' ;
                        echo  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>' ;
                    }
                    
                    ?>

								<?php 
                    woocommerce_mini_cart();
                    ?>

								<?php 
                    if ( 0 === $count ) {
                        echo  '</div>' ;
                    }
                    ?>

							</div>
						</div>
						<div class="sedona-shop-offcanvas__overlay elementor-clickable"></div>
					</div>

				<?php 
                } );
            }
            
            ?>

			<?php 
        }
        
        ?>

		</div>
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_woo_cart_ajax_count' ) ) {
    /**
     * WooCommerce Ajax cart contents update
     */
    function sedona_shop_woo_cart_ajax_count( $fragments )
    {
        if ( !sedona_shop_is_woocommerce_activated() || is_null( WC()->cart ) ) {
            return;
        }
        $count = WC()->cart->get_cart_contents_count();
        
        if ( 0 === $count ) {
            $fragments['.sedona-shop-menu-cart__count'] = '<span class="sedona-shop-menu-cart__count sedona-shop-item-counter d-none">' . esc_html( $count ) . '</span>';
        } else {
            $fragments['.sedona-shop-menu-cart__count'] = '<span class="sedona-shop-menu-cart__count sedona-shop-item-counter">' . esc_html( $count ) . '</span>';
        }
        
        // mini-cart
        ob_start();
        echo  '<div class="sedona-shop-offcanvas__mini-cart">' ;
        
        if ( 0 === $count ) {
            echo  '<div class="sedona-shop-offcanvas__mini-cart-empty">' ;
            echo  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>' ;
        }
        
        woocommerce_mini_cart();
        if ( 0 === $count ) {
            echo  '</div>' ;
        }
        echo  '</div>' ;
        $fragments['.sedona-shop-offcanvas__mini-cart'] = ob_get_clean();
        return $fragments;
    }

}
if ( !function_exists( 'sedona_shop_store_before_content' ) ) {
    /**
     * Archives layout before
     */
    function sedona_shop_store_before_content()
    {
        if ( get_theme_mod( 'sedona_shop_settings_woocommerce_catalog_page_title_show', true ) ) {
            sedona_shop_store_page_title();
        }
        ?>

			<div class="shop-section main-content-shop">
				<div class="container">

					<?php 
        if ( is_product() ) {
            do_action( 'sedona_shop_store_breadcrumbs' );
        }
        ?>

					<div class="row">
	
						<div class="shop-content content col-lg">
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_store_after_content' ) ) {
    /**
     * Archives layout after
     */
    function sedona_shop_store_after_content()
    {
        ?>
						</div> <!-- .col -->
	
						<?php 
        if ( 'fullwidth' !== sedona_shop_layout_type( 'shop', 'right-sidebar' ) && !is_product() ) {
            do_action( 'sedona_shop_store_sidebar' );
        }
        ?>

					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .main-content -->
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_markup_open' ) ) {
    /**
     * Product markup open
     */
    function sedona_shop_product_markup_open()
    {
        ?>
			<div class="sedona-shop-product">
				<div class="sedona-shop-product__image-holder">
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_overlay_open' ) ) {
    /**
     * Product before add to cart
     */
    function sedona_shop_product_overlay_open()
    {
        ?>
			<div class="sedona-shop-product__overlay">
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_action_icons_open' ) ) {
    /**
     * Product action icons open
     */
    function sedona_shop_product_action_icons_open()
    {
        echo  '<div class="sedona-shop-product__icons">' ;
    }

}
if ( !function_exists( 'sedona_shop_product_add_to_wishlist' ) ) {
    /**
     * Product add to wishlist icon
     */
    function sedona_shop_product_add_to_wishlist()
    {
        if ( class_exists( 'YITH_WCWL' ) ) {
            echo  do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa-heart-o"]' ) ;
        }
    }

}
if ( !function_exists( 'sedona_shop_product_quick_view' ) ) {
    /**
     * Product quickview icon
     */
    function sedona_shop_product_quick_view()
    {
        echo  '<div class="sedona-shop-product__quickview-button">' ;
        echo  do_shortcode( '[yith_quick_view]' ) ;
        echo  '</div> <!-- .sedona-shop-product__quickview-button -->' ;
    }

}
if ( !function_exists( 'sedona_shop_loop_remove_quickview' ) ) {
    /**
     * Remove loop quickview icon
     */
    function sedona_shop_loop_remove_quickview()
    {
        remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
    }

}
if ( !function_exists( 'sedona_shop_product_action_icons_close' ) ) {
    /**
     * Product action icons close
     */
    function sedona_shop_product_action_icons_close()
    {
        echo  '</div>' ;
    }

}
if ( !function_exists( 'sedona_shop_product_after_action_icons_close' ) ) {
    /**
     * Product add to cart
     */
    function sedona_shop_product_after_action_icons_close()
    {
        ?>
		<div class="sedona-shop-product__actions">
			<div class="sedona-shop-product__add-to-cart">
				<?php 
        echo  woocommerce_template_loop_add_to_cart() ;
        ?>
			</div> <!-- .sedona-shop-product__add-to-cart -->
		</div> <!-- .sedona-shop-product__actions -->
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_overlay_close' ) ) {
    /**
     * Product after add to cart
     */
    function sedona_shop_product_overlay_close()
    {
        ?>
			</div> <!-- .sedona-shop-product__overlay -->
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_image_holder_close' ) ) {
    /**
     * Product image holder close
     */
    function sedona_shop_product_image_holder_close()
    {
        ?>
			</div> <!-- .sedona-shop-product__image-holder -->
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_outer_close' ) ) {
    /**
     * Product after link close
     */
    function sedona_shop_product_outer_close()
    {
        ?>
			</div> <!-- .sedona-shop-product -->
			<div class="sedona-shop-product__body">
				<div class="sedona-shop-product__body-title">
		<?php 
    }

}
if ( !function_exists( 'sedona_shop_product_title' ) ) {
    /**
     * Product title
     */
    function sedona_shop_product_title()
    {
        echo  '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' ;
        woocommerce_template_loop_product_link_open();
        echo  get_the_title() ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        woocommerce_template_loop_product_link_close();
        echo  '</h2>' ;
    }

}
if ( !function_exists( 'sedona_shop_after_product_title_and_price' ) ) {
    /**
     * Product after title and price price
     */
    function sedona_shop_after_product_title_and_price()
    {
        echo  '</div> <!-- .sedona-shop-product__body-title -->' ;
    }

}
if ( !function_exists( 'sedona_shop_product_rating' ) ) {
    /**
     * Product rating
     */
    function sedona_shop_product_rating()
    {
        woocommerce_template_loop_rating();
        echo  '</div> <!-- .sedona-shop-product__body -->' ;
    }

}
if ( !function_exists( 'sedona_shop_single_product_remove_wishlist' ) ) {
    /**
     * Remove single product wishlist icon
     */
    function sedona_shop_single_product_remove_wishlist()
    {
        if ( class_exists( 'YITH_WCWL' ) ) {
            remove_action( 'woocommerce_single_product_summary', array( YITH_WCWL_Frontend(), 'print_button' ), 31 );
        }
    }

}
if ( !function_exists( 'sedona_shop_single_product_add_wishlist' ) ) {
    /**
     * Add single product wishlist icon
     */
    function sedona_shop_single_product_add_wishlist()
    {
        if ( class_exists( 'YITH_WCWL' ) ) {
            echo  do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa-heart-o"]' ) ;
        }
    }

}
if ( !function_exists( 'sedona_shop_product_share' ) ) {
    /**
     * Product share
     */
    function sedona_shop_product_share()
    {
        if ( !get_theme_mod( 'sedona_shop_settings_product_share_buttons_show', true ) ) {
            return;
        }
        
        if ( function_exists( 'sedona_shop_social_sharing_buttons' ) ) {
            ?>
			<div class="product-share">
				<?php 
            echo  '<span class="product-share__label">' . esc_html__( 'Share', 'sedona-shop' ) . '</span>' ;
            echo  sedona_shop_social_sharing_buttons( 'socials--no-base', 'product' ) ;
            ?>
			</div>
		<?php 
        }
    
    }

}
if ( !function_exists( 'sedona_shop_store_page_title' ) ) {
    /**
     * Shop page title
     */
    function sedona_shop_store_page_title()
    {
        if ( is_woocommerce() && !is_product() && !is_shop() ) {
            get_template_part( 'template-parts/page-title/page-title-shop' );
        }
    }

}
if ( !function_exists( 'sedona_shop_store_get_sidebar' ) ) {
    /**
     * Display shop sidebar
     *
     * @uses sedona_shop_sidebar()
     * @since 1.0.0
     */
    function sedona_shop_store_get_sidebar()
    {
        if ( is_active_sidebar( 'sedona-shop-store-sidebar' ) ) {
            sedona_shop_sidebar( 'sedona-shop-store-sidebar' );
        }
    }

}
if ( !function_exists( 'sedona_shop_store_breadcrumbs' ) ) {
    /**
     * WooCommerce breadcrumbs
     */
    function sedona_shop_store_breadcrumbs()
    {
        if ( !get_theme_mod( 'sedona_shop_settings_shop_breadcrumbs_show', true ) ) {
            return;
        }
        woocommerce_breadcrumb();
    }

}
if ( !function_exists( 'sedona_shop_store_breadcrumb_delimiter' ) ) {
    /**
     * Change the breadcrumb separator
     */
    function sedona_shop_store_breadcrumb_delimiter( $defaults )
    {
        $defaults['delimiter'] = '<span class="woocommerce-breadcrumb__separator"></span>';
        $defaults['delimiter'] = ( is_rtl() ? '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="12" height="12" stroke-width="1.5" stroke="currentColor">
  			<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
			</svg>' : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="12" height="12" stroke-width="1.5" stroke="currentColor">
  			<path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
			</svg>' );
        return $defaults;
        return $defaults;
    }

}
if ( !function_exists( 'sedona_shop_store_tag_cloud_widget' ) ) {
    /**
     * Tag cloud font size
     */
    function sedona_shop_store_tag_cloud_widget( $args )
    {
        $args = array(
            'smallest' => 10,
            'largest'  => 10,
            'taxonomy' => 'product_tag',
        );
        return $args;
    }

}
if ( !function_exists( 'sedona_shop_quantity_plus_sign' ) ) {
    /**
     * Quantity plus
     */
    function sedona_shop_quantity_plus_sign()
    {
        echo  '<span class="quantity__button quantity__plus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>' ;
    }

}
if ( !function_exists( 'sedona_shop_quantity_minus_sign' ) ) {
    /**
     * Quantity minus
     */
    function sedona_shop_quantity_minus_sign()
    {
        echo  '<span class="quantity__button quantity__minus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>' ;
    }

}
if ( !function_exists( 'sedona_shop_woocommerce_before_customer_login_form' ) ) {
    /**
     * My account before login form
     */
    function sedona_shop_woocommerce_before_customer_login_form()
    {
        echo  '<div class="deo-login-form-container">' ;
    }

}
if ( !function_exists( 'sedona_shop_woocommerce_after_customer_login_form' ) ) {
    /**
     * My account after login form
     */
    function sedona_shop_woocommerce_after_customer_login_form()
    {
        echo  '</div>' ;
    }

}
if ( !function_exists( 'sedona_shop_get_shop_category_thumbnail' ) ) {
    /**
     * Shop category thumbnail
     */
    function sedona_shop_get_shop_category_thumbnail()
    {
        $thumbnail_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        return $image;
    }

}
/* Product Badges
---------------------------------------------------------- */
if ( !function_exists( 'sedona_shop_product_badge' ) ) {
    /**
     * Product sale badge
     */
    function sedona_shop_product_badge()
    {
        global  $post, $product ;
        if ( !is_a( $product, 'WC_Product' ) ) {
            return;
        }
        // Out of Stock only on simple products
        
        if ( $product->get_type() === 'simple' && sedona_shop_out_of_stock() ) {
            ?>
			<span class="badge out-of-stock"><?php 
            echo  esc_html__( 'Out of Stock', 'sedona-shop' ) ;
            ?></span>
		<?php 
        } else {
            
            if ( get_theme_mod( 'sedona_shop_settings_woocommerce_product_new_badge', true ) ) {
                // "New Product" badge
                $postdate = get_the_time( 'Y-m-d' );
                // Post date
                $postdate_stamp = strtotime( $postdate );
                // Timestamped post date
                $new_range = get_theme_mod( 'sedona_shop_settings_woocommerce_new_badge_duration', 5 );
                $is_new = apply_filters( 'sedona_shop_product_is_new', $product_new = false );
                $gallery_image_ids = $product->get_gallery_image_ids();
                $badge_classes = 'badge onsale';
                if ( !empty($gallery_image_ids) ) {
                    $badge_classes .= ' onsale--offset';
                }
                // If the product was published within the time frame display the new badge
                if ( time() - 60 * 60 * 24 * $new_range < $postdate_stamp ) {
                    $is_new = true;
                }
                
                if ( $is_new === true ) {
                    ?>
					<span class="badge onsale new"><?php 
                    esc_html_e( 'New', 'sedona-shop' );
                    ?></span>
				<?php 
                }
            
            }
            
            // "Sale" badge
            if ( $product->is_on_sale() && get_theme_mod( 'sedona_shop_settings_woocommerce_product_sale_badge', 'percent' ) !== 'disabled' ) {
                // Display percentage
                
                if ( get_theme_mod( 'sedona_shop_settings_woocommerce_product_sale_badge', 'percent' ) === 'percent' ) {
                    
                    if ( $product->get_type() === 'variable' ) {
                        // Get product variation prices (regular and sale)
                        $product_variation_prices = $product->get_variation_prices();
                        $highest_sale_percent = 0;
                        foreach ( $product_variation_prices['regular_price'] as $key => $regular_price ) {
                            // Get sale price for current variation
                            $sale_price = $product_variation_prices['sale_price'][$key];
                            // Is product variation on sale?
                            
                            if ( $sale_price < $regular_price ) {
                                $sale_percent = round( ($regular_price - $sale_price) / $regular_price * 100 );
                                // Is current sale percent highest?
                                if ( $sale_percent > $highest_sale_percent ) {
                                    $highest_sale_percent = $sale_percent;
                                }
                            }
                        
                        }
                        if ( $highest_sale_percent > 0 ) {
                            // Return the highest product variation sale percent
                            echo  apply_filters(
                                'woocommerce_sale_flash',
                                '<span class="percent ' . esc_attr( $badge_classes ) . '"><span class="onsale-before">- </span>' . $highest_sale_percent . '<span class="onsale-after">%</span></span>',
                                $post,
                                $product
                            ) ;
                        }
                    } else {
                        $regular_price = $product->get_regular_price();
                        $sale_percent = 0;
                        // Make sure the percentage value can be calculated
                        if ( intval( $regular_price ) > 0 ) {
                            $sale_percent = round( ($regular_price - $product->get_sale_price()) / $regular_price * 100 );
                        }
                        if ( $sale_percent > 0 ) {
                            echo  apply_filters(
                                'woocommerce_sale_flash',
                                '<span class="percent ' . esc_attr( $badge_classes ) . '"><span class="onsale-before">-</span>' . $sale_percent . '<span class="onsale-after">%</span></span>',
                                $post,
                                $product
                            ) ;
                        }
                    }
                    
                    // Or display text
                } else {
                    echo  apply_filters(
                        'woocommerce_sale_flash',
                        '<span class="' . esc_attr( $badge_classes ) . '">' . esc_html__( 'Sale', 'sedona-shop' ) . '</span>',
                        $post,
                        $product
                    ) ;
                }
            
            }
        }
    
    }

}
add_action( 'sedona_shop_product_badge', 'sedona_shop_product_badge', 3 );
if ( !function_exists( 'sedona_shop_out_of_stock' ) ) {
    /**
     * Out of Stock Check
     */
    function sedona_shop_out_of_stock()
    {
        global  $post ;
        $status = get_post_meta( $post->ID, '_stock_status', true );
        
        if ( $status == 'outofstock' ) {
            return true;
        } else {
            return false;
        }
    
    }

}