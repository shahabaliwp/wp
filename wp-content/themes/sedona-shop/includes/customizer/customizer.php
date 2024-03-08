<?php

/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
function sedona_shop_customize_register( $wp_customize )
{
    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background Styles', 'sedona-shop' );
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    // Remove Custom Header Section
    $wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'sedona_shop_customize_register' );
// Check if Kirki is installed

if ( class_exists( 'Kirki' ) ) {
    function sedona_shop_customizer_options()
    {
        // Selector Vars
        $selectors = array(
            'headings'  => 'h1,h2,h3,h4,h5,h6',
            'h1'        => 'h1, .h1',
            'h2'        => 'h2, .h2',
            'h3'        => 'h3, .h3',
            'h4'        => 'h4, .h4',
            'h5'        => 'h5, .h5',
            'h6'        => 'h6, .h6',
            'base_font' => 'body',
            'buttons'   => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button,
				.btn,
				.button,
				.wp-element-button,
				.elementor-widget-button .elementor-button,
				.wp-block-button .wp-block-button__link
				',
        );
        if ( sedona_shop_is_woocommerce_activated() ) {
            $selectors['shop_headings_font'] = '.woocommerce #review_form .comment-reply-title, ul.product_list_widget li a:not(.remove)';
        }
        if ( function_exists( 'sedona_shop_get_typekit_fonts' ) ) {
            $typekit_fonts = sedona_shop_get_typekit_fonts();
        }
        $heading_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[0] )) ? $typekit_fonts[0] : 'Poppins' );
        $body_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[1] )) ? $typekit_fonts[1] : 'Source Sans Pro' );
        $border_color = '#e5e5e5';
        $primary_color = '#ffb31a';
        $primary_color_light = '#f5ebe1';
        $heading_color = '#222222';
        $secondary_color = '#2f95ef';
        $text_color = '#868686';
        $bg_light = '#f9f9f9';
        $mobile_menu_dividers_color = '#e3e3e3';
        $container_width = '1320';
        $bp_lg_up = '@media (min-width: 1025px)';
        $bp_lg_down = '@media (max-width: 1024px)';
        $bp_md_up = '@media (min-width: 768px)';
        $bp_md_down = '@media (max-width: 767px)';
        // Kirki
        Kirki::add_config( 'sedona_shop_settings_config', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
            'option_name' => 'sedona_shop_settings_config',
        ) );
        /**
         * SECTIONS / PANELS
         **/
        $priority = 20;
        $uniqid = 1;
        // GENERAL PANEL
        Kirki::add_panel( 'sedona_shop_settings_general', array(
            'title'    => esc_html__( 'General', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Preloader
        Kirki::add_section( 'sedona_shop_settings_preloader', array(
            'title' => esc_html__( 'Preloader', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_general',
        ) );
        // Back to Top
        Kirki::add_section( 'sedona_shop_settings_back_to_top', array(
            'title' => esc_html__( 'Back to Top', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_general',
        ) );
        // HEADER PANEL
        Kirki::add_panel( 'sedona_shop_settings_header', array(
            'title'    => esc_html__( 'Header & Logo', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Header
        Kirki::add_section( 'sedona_shop_settings_header', array(
            'title' => esc_html__( 'Header', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_header',
        ) );
        // Logo
        Kirki::add_section( 'sedona_shop_settings_logo', array(
            'title' => esc_html__( 'Logo', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_header',
        ) );
        // Primary Menu
        Kirki::add_section( 'sedona_shop_settings_primary_menu', array(
            'title' => esc_html__( 'Menu', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_header',
        ) );
        // Top Bar
        Kirki::add_section( 'sedona_shop_settings_top_bar', array(
            'title' => esc_html__( 'Top Bar', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_header',
        ) );
        // FOOTER
        Kirki::add_section( 'sedona_shop_settings_footer', array(
            'title'    => esc_html__( 'Footer', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // LAYOUT PANEL
        Kirki::add_panel( 'sedona_shop_settings_layout', array(
            'title'    => esc_html__( 'Layout', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Content
        Kirki::add_section( 'sedona_shop_settings_content_layout', array(
            'title' => esc_html__( 'Content', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_layout',
        ) );
        // Blog Layout
        Kirki::add_section( 'sedona_shop_settings_blog_layout', array(
            'title'       => esc_html__( 'Blog', 'sedona-shop' ),
            'description' => esc_html__( 'Layout options for the blog pages', 'sedona-shop' ),
            'panel'       => 'sedona_shop_settings_layout',
        ) );
        // Single Post Layout
        Kirki::add_section( 'sedona_shop_settings_single_post_layout', array(
            'title' => esc_html__( 'Single Post', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_layout',
        ) );
        // Page Layout
        Kirki::add_section( 'sedona_shop_settings_page_layout', array(
            'title' => esc_html__( 'Page', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_layout',
        ) );
        // Archives Layout
        Kirki::add_section( 'sedona_shop_settings_archives_layout', array(
            'title'       => esc_html__( 'Archives', 'sedona-shop' ),
            'description' => esc_html__( 'Layout options for archives and categories pages', 'sedona-shop' ),
            'panel'       => 'sedona_shop_settings_layout',
        ) );
        if ( sedona_shop_is_woocommerce_activated() ) {
            // Shop Layout
            Kirki::add_section( 'sedona_shop_settings_shop_layout', array(
                'title'       => esc_html__( 'Shop', 'sedona-shop' ),
                'description' => esc_html__( 'Layout options for shop catalog pages', 'sedona-shop' ),
                'panel'       => 'sedona_shop_settings_layout',
            ) );
        }
        // Search Results Layout
        Kirki::add_section( 'sedona_shop_settings_search_results_layout', array(
            'title'       => esc_html__( 'Search Results', 'sedona-shop' ),
            'description' => esc_html__( 'Layout options for search result page', 'sedona-shop' ),
            'panel'       => 'sedona_shop_settings_layout',
        ) );
        // COLORS PANEL
        Kirki::add_panel( 'sedona_shop_settings_colors', array(
            'title'    => esc_html__( 'Colors', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // General Colors
        Kirki::add_section( 'sedona_shop_settings_general_colors', array(
            'title' => esc_html__( 'General', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_colors',
        ) );
        // Footer Colors
        Kirki::add_section( 'sedona_shop_settings_footer_colors', array(
            'title' => esc_html__( 'Footer', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_colors',
        ) );
        if ( class_exists( 'Sedona_Shop_Core' ) ) {
            // Cookies Bar Colors
            Kirki::add_section( 'sedona_shop_settings_cookies_bar_colors', array(
                'title' => esc_html__( 'Cookies Bar', 'sedona-shop' ),
                'panel' => 'sedona_shop_settings_colors',
            ) );
        }
        // TYPOGRAPHY
        Kirki::add_section( 'sedona_shop_settings_typography', array(
            'title'    => esc_html__( 'Typography', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // PORTFOLIO PANEL
        Kirki::add_panel( 'sedona_shop_settings_portfolio', array(
            'title'    => esc_html__( 'Portfolio', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Portfolio Single
        Kirki::add_section( 'sedona_shop_settings_portfolio_single', array(
            'title' => esc_html__( 'Portfolio Single', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_portfolio',
        ) );
        // BLOG PANEL
        Kirki::add_panel( 'sedona_shop_settings_blog', array(
            'title'    => esc_html__( 'Blog', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Post Meta
        Kirki::add_section( 'sedona_shop_settings_post_meta', array(
            'title' => esc_html__( 'Post Meta', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_blog',
        ) );
        // Single Post
        Kirki::add_section( 'sedona_shop_settings_single_post', array(
            'title' => esc_html__( 'Single Post', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_blog',
        ) );
        if ( class_exists( 'Sedona_Shop_Core' ) ) {
            // Social Share
            Kirki::add_section( 'sedona_shop_settings_social_share', array(
                'title' => esc_html__( 'Social Share Buttons', 'sedona-shop' ),
                'panel' => 'sedona_shop_settings_blog',
            ) );
        }
        // Post Excerpt
        Kirki::add_section( 'sedona_shop_settings_post_excerpt', array(
            'title' => esc_html__( 'Excerpt', 'sedona-shop' ),
            'panel' => 'sedona_shop_settings_blog',
        ) );
        // PAGE TITLE
        Kirki::add_section( 'sedona_shop_settings_page_title', array(
            'title'    => esc_html__( 'Page Title / Breadcrumbs', 'sedona-shop' ),
            'priority' => $priority++,
        ) );
        // Page 404
        Kirki::add_section( 'sedona_shop_settings_page_404', array(
            'title'       => esc_html__( 'Page 404', 'sedona-shop' ),
            'description' => esc_html__( 'Settings for page 404', 'sedona-shop' ),
            'priority'    => $priority++,
        ) );
        if ( sedona_shop_is_woocommerce_activated() ) {
            // WooCommerce Social Share
            Kirki::add_section( 'sedona_shop_settings_product_social_share', array(
                'title' => esc_html__( 'Social share buttons', 'sedona-shop' ),
                'panel' => 'woocommerce',
            ) );
        }
        // Load modules
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/general.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/header.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/footer.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/layout.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/page-title.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/blog.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/colors.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/typography.php';
        require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/page-404.php';
        if ( sedona_shop_is_woocommerce_activated() ) {
            require_once SEDONA_SHOP_DIR . '/includes/customizer/modules/woocommerce.php';
        }
    }
    
    sedona_shop_customizer_options();
}

// endif Kirki check