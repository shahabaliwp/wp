<?php

/**
 * Customizer Colors
 *
 * @package Sedona Shop
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/
// Primary color
new \Kirki\Field\Color( array(
    'settings'  => 'sedona_shop_settings_primary_color',
    'label'     => esc_html__( 'Primary', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $primary_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-primary-color',
) ),
    'transport' => 'auto',
) );
// Primary light color
new \Kirki\Field\Color( array(
    'settings'  => 'sedona_shop_settings_primary_light_color',
    'label'     => esc_html__( 'Primary light', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => '#f5ebe1',
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-primary-color--light',
) ),
    'transport' => 'auto',
) );
// Headings colors
new \Kirki\Field\Color( array(
    'settings'  => 'sedona_shop_settings_headings_color',
    'label'     => esc_html__( 'Headings', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-heading-color',
) ),
    'transport' => 'auto',
) );
// Text color
new \Kirki\Field\Color( array(
    'settings'  => 'sedona_shop_settings_text_color',
    'label'     => esc_html__( 'Text', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $text_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-text-color',
) ),
    'transport' => 'auto',
) );
// Background light
new \Kirki\Field\Color( array(
    'settings'  => 'sedona_shop_settings_background_light_color',
    'label'     => esc_html__( 'Background light', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-background-color--light',
) ),
    'transport' => 'auto',
) );
// Borders color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_borders_color',
    'label'     => esc_html__( 'Borders', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $border_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-border-color',
) ),
    'transport' => 'auto',
) );
// Buttons hover background color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_buttons_hover_background_color',
    'label'     => esc_html__( 'Buttons hover background', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-buttons-hover-background-color',
) ),
    'transport' => 'auto',
) );
// Buttons hover border color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_buttons_hover_border_color',
    'label'     => esc_html__( 'Buttons hover border', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-buttons-hover-border-color',
) ),
    'transport' => 'auto',
) );
// Buttons hover text color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_buttons_hover_text_color',
    'label'     => esc_html__( 'Buttons hover text', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_general_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => 'body, :root',
    'property' => '--deo-buttons-hover-text-color',
) ),
    'transport' => 'auto',
) );
// Page background color
new \Kirki\Field\Color( array(
    'type'        => 'color',
    'settings'    => 'sedona_shop_settings_page_background_color',
    'label'       => esc_html__( 'Page background', 'sedona-shop' ),
    'description' => esc_html__( 'Applies on a blog, archive and search results pages', 'sedona-shop' ),
    'section'     => 'sedona_shop_settings_general_colors',
    'default'     => '#ffffff',
    'output'      => array( array(
    'element'  => '.blog-section, .archive-section, .search-results-section',
    'property' => 'background-color',
) ),
    'transport'   => 'auto',
) );
/*-------------------------------------------------------*/
/* Footer Colors
/*-------------------------------------------------------*/
// Footer background color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_footer_background_color',
    'label'     => esc_html__( 'Background color', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_footer_colors',
    'default'   => '#ffffff',
    'output'    => array( array(
    'element'  => '.footer',
    'property' => 'background-color',
), array(
    'element'  => ':root[data-widget-area-id*="sedona-shop-footer-col-"]',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Footer dividers color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_footer_dividers_color',
    'label'     => esc_html__( 'Dividers color', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_footer_colors',
    'default'   => '#ebebeb',
    'output'    => array( array(
    'element'  => '.footer__row',
    'property' => 'border-color',
) ),
    'transport' => 'auto',
) );
// Footer widget links color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_footer_widgets_links_color',
    'label'     => esc_html__( 'Widgets links', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_footer_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.footer .widget a, .footer .widget a:focus, .footer .widget a:hover',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );
// Footer bottom background color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_footer_bottom_background_color',
    'label'     => esc_html__( 'Bottom background color', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_footer_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.footer__bottom',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Footer bottom text color
new \Kirki\Field\Color( array(
    'type'      => 'color',
    'settings'  => 'sedona_shop_settings_footer_bottom_text_color',
    'label'     => esc_html__( 'Bottom text color', 'sedona-shop' ),
    'section'   => 'sedona_shop_settings_footer_colors',
    'default'   => '',
    'output'    => array( array(
    'element'  => '.footer__bottom',
    'property' => 'color',
) ),
    'transport' => 'auto',
) );