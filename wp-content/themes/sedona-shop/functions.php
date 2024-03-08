<?php

/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Set the content width based on the theme's design and stylesheet.

if ( !isset( $content_width ) ) {
    $content_width = 1280;
    /* pixels */
}

// Constants
define( 'SEDONA_SHOP_DIR', get_template_directory() );
define( 'SEDONA_SHOP_URI', get_template_directory_uri() );
define( 'SEDONA_SHOP_VERSION', '1.0.2' );

if ( !function_exists( 'sedona_shop_fs' ) ) {
    // Create a helper function for easy SDK access.
    function sedona_shop_fs()
    {
        global  $sedona_shop_fs ;
        
        if ( !isset( $sedona_shop_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $sedona_shop_fs = fs_dynamic_init( array(
                'id'             => '15050',
                'slug'           => 'sedona-shop',
                'premium_slug'   => 'sedona-shop-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_3ca16380f9027d6fe02d272b338eb',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'sedona-shop-theme',
                'contact' => false,
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $sedona_shop_fs;
    }
    
    // Init Freemius.
    sedona_shop_fs();
    // Signal that SDK was initiated.
    do_action( 'sedona_shop_fs_loaded' );
}

/**
* Change theme icon
*/
function sedona_shop_fs_custom_icon()
{
    return get_template_directory() . '/assets/admin/img/theme-icon.png';
}

sedona_shop_fs()->add_filter( 'plugin_icon', 'sedona_shop_fs_custom_icon' );
// Includes
require_once SEDONA_SHOP_DIR . '/includes/admin/theme-admin.php';
require_once SEDONA_SHOP_DIR . '/includes/theme-setup.php';
require_once SEDONA_SHOP_DIR . '/includes/theme-functions.php';
require_once SEDONA_SHOP_DIR . '/includes/theme-hooks.php';
require_once SEDONA_SHOP_DIR . '/includes/template-tags.php';
require_once SEDONA_SHOP_DIR . '/includes/template-parts.php';
require_once SEDONA_SHOP_DIR . '/includes/class-sedona-shop-query.php';
require_once SEDONA_SHOP_DIR . '/includes/class-sedona-shop-walker-nav-menu.php';
require_once SEDONA_SHOP_DIR . '/includes/class-sedona-shop-walker-comments.php';
require_once SEDONA_SHOP_DIR . '/includes/class-sedona-shop-theme-update.php';
require_once SEDONA_SHOP_DIR . '/includes/customizer/customizer.php';
/**
* TGM plugins activation.
*/
require_once SEDONA_SHOP_DIR . '/includes/tgmpa/tgm-plugin-activation.php';
/**
 * Compatibility
 */

if ( sedona_shop_is_woocommerce_activated() ) {
    require_once SEDONA_SHOP_DIR . '/includes/woocommerce/class-sedona-shop-woocommerce.php';
    require_once SEDONA_SHOP_DIR . '/includes/woocommerce/woocommerce-theme-functions.php';
    require_once SEDONA_SHOP_DIR . '/includes/woocommerce/woocommerce-theme-hooks.php';
    // Remove Woo styles
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    // Dequeue YITH Wishlist styles
    
    if ( defined( 'YITH_WCWL' ) && sedona_shop_is_woocommerce_activated() ) {
        function sedona_shop_dequeue_yith_wcwl_font_awesome_styles( $deps )
        {
            $deps = array( 'jquery-selectBox' );
            return $deps;
        }
        
        add_filter( 'yith_wcwl_main_style_deps', 'sedona_shop_dequeue_yith_wcwl_font_awesome_styles' );
        // Remove social icon color style
        add_filter( 'yith_wcwl_custom_css_rules', function ( $custom_css ) {
            unset(
                $custom_css['color_fb_button'],
                $custom_css['color_tw_button'],
                $custom_css['color_pr_button'],
                $custom_css['color_em_button'],
                $custom_css['color_wa_button'],
                $custom_css['color_wa_button']
            );
            return $custom_css;
        } );
    }

}

// Theme styles.
function sedona_shop_theme_styles()
{
    wp_enqueue_style(
        'sedona-shop-styles',
        SEDONA_SHOP_URI . '/assets/css/style.min.css',
        array(),
        SEDONA_SHOP_VERSION,
        'all'
    );
    wp_style_add_data( 'sedona-shop-styles', 'rtl', 'replace' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // Editor shared styles
    wp_enqueue_style( 'sedona-shop-block-editor-shared-styles', get_theme_file_uri( '/assets/css/editor-shared.min.css' ), false );
    wp_style_add_data( 'sedona-shop-block-editor-shared-styles', 'rtl', 'replace' );
    // WooCommerce styles
    
    if ( sedona_shop_is_woocommerce_activated() ) {
        wp_register_style(
            'sedona-shop-woocommerce',
            SEDONA_SHOP_URI . '/assets/css/compatibility/woocommerce/woocommerce.min.css',
            array(),
            SEDONA_SHOP_VERSION
        );
        wp_enqueue_style( 'sedona-shop-woocommerce' );
        wp_style_add_data( 'sedona-shop-woocommerce', 'rtl', 'replace' );
    }
    
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_enqueue_style(
            'sedona-shop-google-fonts',
            '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap',
            [],
            null
        );
    }
}

add_action( 'wp_enqueue_scripts', 'sedona_shop_theme_styles' );
/**
 * Block editor styles.
 */
function sedona_shop_block_editor_assets()
{
    wp_enqueue_style(
        'sedona-shop-editor-styles',
        get_theme_file_uri( '/assets/css/editor.min.css' ),
        array(),
        SEDONA_SHOP_VERSION
    );
    wp_style_add_data( 'sedona-shop-editor-styles', 'rtl', 'replace' );
    // Editor shared styles
    wp_enqueue_style( 'sedona-shop-block-editor-shared-styles', get_theme_file_uri( '/assets/css/editor-shared.min.css' ), false );
    wp_style_add_data( 'sedona-shop-block-editor-shared-styles', 'rtl', 'replace' );
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_enqueue_style(
            'sedona-shop-editor-google-fonts',
            '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap',
            [],
            null
        );
    }
}

add_action( 'enqueue_block_editor_assets', 'sedona_shop_block_editor_assets' );
/**
 * Theme scripts.
 */
function sedona_shop_theme_scripts()
{
    
    if ( is_archive() || is_search() || is_home() ) {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'imagesloaded' );
    }
    
    wp_enqueue_script(
        'bootstrap',
        SEDONA_SHOP_URI . '/assets/js/vendor/min/bootstrap.min.js',
        array(),
        SEDONA_SHOP_VERSION,
        true
    );
    wp_enqueue_script(
        'body-scroll-lock',
        SEDONA_SHOP_URI . '/assets/js/vendor/min/bodyScrollLock.min.js',
        array(),
        SEDONA_SHOP_VERSION,
        true
    );
    wp_register_script(
        'sedona-shop-scripts',
        SEDONA_SHOP_URI . '/assets/js/scripts.js',
        array(),
        SEDONA_SHOP_VERSION,
        true
    );
    wp_enqueue_script( 'sedona-shop-scripts' );
    if ( sedona_shop_is_woocommerce_activated() ) {
        wp_enqueue_script(
            'sedona-shop-woo-scripts',
            SEDONA_SHOP_URI . '/assets/js/woo-scripts.min.js',
            array(),
            SEDONA_SHOP_VERSION,
            true
        );
    }
    
    if ( !is_single() && !is_home() && !is_search() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'classic-theme-styles' );
    }
    
    $sedona_shop_php_data = array(
        'home_url'   => esc_url( home_url( '/' ) ),
        'theme_path' => SEDONA_SHOP_URI,
    );
    wp_localize_script( 'sedona-shop-scripts', 'Sedona_Shop_PHP_Data', $sedona_shop_php_data );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'wp_enqueue_emoji_styles' );
}

add_action( 'wp_enqueue_scripts', 'sedona_shop_theme_scripts' );
/**
 * Theme admin scripts and styles.
 */
function sedona_shop_admin_scripts()
{
    $screen = get_current_screen();
    $user_id = get_current_user_id();
    wp_enqueue_style( 'sedona-shop-admin-styles', SEDONA_SHOP_URI . '/assets/admin/css/admin-styles.css' );
    wp_style_add_data( 'sedona-shop-admin-styles', 'rtl', 'replace' );
    
    if ( $screen->id === 'appearance_page_sedona-shop-theme' ) {
        wp_enqueue_script(
            'sedona-shop-canny-scripts',
            SEDONA_SHOP_URI . '/assets/admin/js/canny-scripts.js',
            array(),
            false,
            true
        );
        wp_localize_script( 'sedona-shop-canny-scripts', 'sedona_shop_canny_params', array(
            'user_email'  => sanitize_email( get_option( 'admin_email' ) ),
            'user_id'     => absint( $user_id ),
            'user_name'   => esc_html( wp_get_current_user()->user_login ),
            'user_avatar' => esc_url( get_avatar_url( $user_id ) ),
        ) );
    }

}

add_action( 'admin_enqueue_scripts', 'sedona_shop_admin_scripts' );
/**
 * Customizer scripts and styles.
 */
function sedona_shop_customizer_scripts()
{
    wp_enqueue_style( 'sedona-shop-customizer-styles', SEDONA_SHOP_URI . '/assets/css/customizer/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'sedona_shop_customizer_scripts' );