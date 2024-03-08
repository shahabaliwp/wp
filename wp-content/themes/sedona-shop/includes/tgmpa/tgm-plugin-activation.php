<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Sedona Shop for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
require_once SEDONA_SHOP_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'sedona_shop_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function sedona_shop_register_required_plugins()
{
    $url = 'https://sedona-shop.deothemes.com';
    $plugins = array(
        array(
        'name'     => esc_html__( 'Kirki', 'sedona-shop' ),
        'slug'     => 'kirki',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'Elementor', 'sedona-shop' ),
        'slug'     => 'elementor',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'Contact Form 7', 'sedona-shop' ),
        'slug'     => 'contact-form-7',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'MailChimp for WordPress', 'sedona-shop' ),
        'slug'     => 'mailchimp-for-wp',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'WooCommerce', 'sedona-shop' ),
        'slug'     => 'woocommerce',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'YITH WooCommerce Quick View', 'sedona-shop' ),
        'slug'     => 'yith-woocommerce-quick-view',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'sedona-shop' ),
        'slug'     => 'yith-woocommerce-wishlist',
        'required' => false,
    ),
        array(
        'name'     => esc_html__( 'Smash Balloon Social Photo Feed', 'sedona-shop' ),
        'slug'     => 'instagram-feed',
        'required' => false,
    )
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',
        'strings'      => array(
        'page_title'                     => esc_html__( 'Install Required Plugins', 'sedona-shop' ),
        'menu_title'                     => esc_html__( 'Install Plugins', 'sedona-shop' ),
        'installing'                     => esc_html__( 'Installing Plugin: %s', 'sedona-shop' ),
        'updating'                       => esc_html__( 'Updating Plugin: %s', 'sedona-shop' ),
        'oops'                           => esc_html__( 'Something went wrong with the plugin API.', 'sedona-shop' ),
        'return'                         => esc_html__( 'Return to Required Plugins Installer', 'sedona-shop' ),
        'plugin_activated'               => esc_html__( 'Plugin activated successfully.', 'sedona-shop' ),
        'activated_successfully'         => esc_html__( 'The following plugin was activated successfully:', 'sedona-shop' ),
        'plugin_already_active'          => esc_html__( 'No action taken. Plugin %1$s was already active.', 'sedona-shop' ),
        'plugin_needs_higher_version'    => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'sedona-shop' ),
        'complete'                       => esc_html__( 'All plugins installed and activated successfully. %1$s', 'sedona-shop' ),
        'dismiss'                        => esc_html__( 'Dismiss this notice', 'sedona-shop' ),
        'notice_cannot_install_activate' => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'sedona-shop' ),
        'contact_admin'                  => esc_html__( 'Please contact the administrator of this site for help.', 'sedona-shop' ),
        'nag_type'                       => 'updated',
    ),
    );
    tgmpa( $plugins, $config );
}
