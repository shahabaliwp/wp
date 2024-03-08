<?php

/**
 * Theme admin functions.
 *
 * @package Sedona Shop
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* Add admin menu
*
* @since 1.0.0
*/
function sedona_shop_theme_admin_menu()
{
    add_theme_page(
        esc_html__( 'Getting Started', 'sedona-shop' ),
        esc_html__( 'Sedona Shop', 'sedona-shop' ),
        'manage_options',
        'sedona-shop-theme',
        'sedona_shop_admin_page_content',
        30
    );
}

add_action( 'admin_menu', 'sedona_shop_theme_admin_menu' );
/**
* Add admin page content
*
* @since 1.0.0
*/
function sedona_shop_admin_page_content()
{
    $theme = wp_get_theme();
    $theme_name = 'Sedona Shop';
    $active_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->template ) );
    $urls = array(
        'theme-url' => 'https://sedona-shop.deothemes.com',
        'docs'      => 'https://docs.deothemes.com/sedona-shop/',
    );
    $features = array(
        'demos'             => array(
        'title' => esc_html__( 'Home pages', 'sedona-shop' ),
        'url'   => '',
        'free'  => esc_html__( '1', 'sedona-shop' ),
        'pro'   => esc_html__( '2', 'sedona-shop' ),
    ),
        'rtl-translation'   => array(
        'title' => esc_html__( 'RTL and translation ready', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'woo-builder'       => array(
        'title' => esc_html__( 'WooCommerce product builder', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'demo-import'       => array(
        'title' => esc_html__( 'Easy installation wizard', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'builder'           => array(
        'title' => esc_html__( 'Header / footer builder', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'product-layouts'   => array(
        'title' => esc_html__( 'Product layouts', 'sedona-shop' ),
        'url'   => '',
        'free'  => esc_html__( '1', 'sedona-shop' ),
        'pro'   => esc_html__( '4', 'sedona-shop' ),
    ),
        'newsletter-popup'  => array(
        'title' => esc_html__( 'Newsletter popup', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'ajax-search'       => array(
        'title' => esc_html__( 'Ajax search', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'ajax-side-cart'    => array(
        'title' => esc_html__( 'Ajax side cart', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'woo-ajax-filter'   => array(
        'title' => esc_html__( 'Catalog Ajax filters', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'elementor-widgets' => array(
        'title' => esc_html__( 'Elementor widgets', 'sedona-shop' ),
        'url'   => '',
        'free'  => esc_html__( 'Basic', 'sedona-shop' ),
        'pro'   => esc_html__( '40+ premium widgets', 'sedona-shop' ),
    ),
        'megamenu'          => array(
        'title' => esc_html__( 'Customizable mega menu', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'gdpr'              => array(
        'title' => esc_html__( 'GDPR tools', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'acf-pro'           => array(
        'title' => esc_html__( 'ACF Pro integrated', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
        'typography'        => array(
        'title' => esc_html__( 'Typography', 'sedona-shop' ),
        'url'   => '',
        'free'  => esc_html__( 'Google Fonts', 'sedona-shop' ),
        'pro'   => esc_html__( 'Google Fonts + Custom Fonts + Adobe Fonts', 'sedona-shop' ),
    ),
        '24-7-support'      => array(
        'title' => esc_html__( 'Priority email support', 'sedona-shop' ),
        'url'   => '',
        'free'  => '<i class="sedona-shop-list-item-icon sedona-shop-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
        'pro'   => '<i class="sedona-shop-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
    ),
    );
    $videos = array(
        'theme-installation' => array(
        'links' => array( array(
        'link_url'     => 'https://www.youtube.com/watch?v=j-os3z7g1JI',
        'link_text'    => __( 'Theme Installation', 'sedona-shop' ),
        'link_img_src' => SEDONA_SHOP_URI . '/assets/admin/img/videos/theme_installation.jpg',
    ) ),
    ),
    );
    ?>

		<div class="sedona-shop-page-header">
			<div class="sedona-shop-page-header__container">
				<div class="sedona-shop-page-header__branding">
					<a href="<?php 
    echo  esc_url( $urls['theme-url'] ) ;
    ?>" target="_blank" rel="noopener" >
						<img src="<?php 
    echo  esc_url( SEDONA_SHOP_URI . '/assets/admin/img/theme_logo.png' ) ;
    ?>" class="sedona-shop-page-header__logo" alt="<?php 
    echo  esc_attr__( 'Sedona Shop', 'sedona-shop' ) ;
    ?>" />
					</a>
					<span class="sedona-shop-theme-version"><?php 
    echo  esc_html( SEDONA_SHOP_VERSION ) ;
    ?></span>
				</div>
				<div class="sedona-shop-page-header__tagline">
					<span  class="sedona-shop-page-header__tagline-text">				
						<?php 
    echo  esc_html__( 'Made by ', 'sedona-shop' ) ;
    ?>
						<a href="https://deothemes.com/"><?php 
    echo  esc_html__( 'DeoThemes', 'sedona-shop' ) ;
    ?></a>						
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap sedona-shop-container">
			<div class="sedona-shop-grid">

				<div class="sedona-shop-grid-content">
					<div class="sedona-shop-body">

						<h1 class="sedona-shop-title"><?php 
    esc_html_e( 'Getting Started', 'sedona-shop' );
    ?></h1>
						<p class="sedona-shop-intro-text">
							<?php 
    printf( __( 'Sedona Shop is now installed and ready to use! Get ready to build something beautiful. Check the <a href="%1$s" target="_blank">Documentation</a> for installation and customization guides. We hope you enjoy it!', 'sedona-shop' ), esc_url( 'https://docs.deothemes.com/sedona/' ) );
    ?>
						</p>

						<?php 
    ?>
						
						<?php 
    ?>
							<!-- Comparison -->
							<section class="sedona-shop-section">
								<h2 class="sedona-shop-heading"><?php 
    echo  esc_html__( 'Free Vs Pro', 'sedona-shop' ) ;
    ?></h2>
								<table class="sedona-shop-comparison widefat striped table-view-list">
									<thead>
										<tr>
											<th><span><?php 
    echo  esc_html__( 'Features', 'sedona-shop' ) ;
    ?></span></th>
											<th><span><?php 
    printf( esc_html__( '%s Free', 'sedona-shop' ), $theme_name );
    ?></span></th>
											<th><span><?php 
    printf( esc_html__( '%s Pro', 'sedona-shop' ), $theme_name );
    ?></span></th>
										</tr>
									</thead>
									<tbody>
										<?php 
    foreach ( $features as $feature ) {
        ?>
											<tr>
												<td><?php 
        echo  esc_html( $feature['title'] ) ;
        ?></td>
												<td><?php 
        echo  wp_kses( $feature['free'], array(
            'i' => array(
            'class'       => array(),
            'aria-hidden' => array(),
        ),
        ) ) ;
        ?></td>
												<td><?php 
        echo  wp_kses( $feature['pro'], array(
            'i' => array(
            'class'       => array(),
            'aria-hidden' => array(),
        ),
        ) ) ;
        ?></td>
											</tr>
										<?php 
    }
    ?>
									</tbody>
								</table>
								<a href="<?php 
    echo  esc_url( sedona_shop_fs()->get_upgrade_url() ) ;
    ?>" class="button button-primary button-hero">
									<span><?php 
    echo  esc_html__( 'Upgrade Now', 'sedona-shop' ) ;
    ?></span>
								</a>
							</section>
						<?php 
    ?>


					</div> <!-- .body -->
				</div> <!-- .content -->
				
				<!-- Sidebar -->
				<aside class="sedona-shop-grid-sidebar">
					<div class="sedona-shop-grid-sidebar-widget-area">
						
						<!-- Useful Links -->
						<div class="sedona-shop-widget">
							<h2 class="sedona-shop-widget-title"><?php 
    echo  esc_html__( 'Useful Links', 'sedona-shop' ) ;
    ?></h2>
							<ul class="sedona-shop-useful-links">
								<li>
									<a href="https://docs.deothemes.com/sedona-shop/" target="_blank"><?php 
    echo  esc_html__( 'Knowledge Base', 'sedona-shop' ) ;
    ?></a>
								</li>
								<li>
									<a href="https://wordpress.org/support/theme/sedona-shop/reviews/#new-post" target="_blank"><?php 
    echo  esc_html__( 'Rate us ★★★★★', 'sedona-shop' ) ;
    ?></a>
								</li>
								<?php 
    ?>
								<li>
									<a href="https://twitter.com/deothemes"><?php 
    echo  esc_html__( 'Follow us', 'sedona-shop' ) ;
    ?></a>
								</li>
							</ul>
						</div>
						
						<!-- Leave a Feedback -->
						<div class="sedona-shop-widget">
							<h2 class="sedona-shop-widget-title"><?php 
    echo  esc_html__( 'Suggest a Feature', 'sedona-shop' ) ;
    ?></h2>
							<p><?php 
    echo  esc_html__( 'Missing an important feature? Let us know how we can improve the product.', 'sedona-shop' ) ;
    ?></p>
							<a href="https://deothemes.canny.io/sedona-shop-feature-requests" target="_blank" class="button button-secondary"><?php 
    echo  esc_html__( 'Leave a Feedback', 'sedona-shop' ) ;
    ?></a>		
						</div>

						<!-- Videos -->
						<div class="sedona-shop-widget sedona-shop-widget-video-tutorials">
							<h2 class="sedona-shop-widget-title"><?php 
    esc_html_e( 'Video Tutorials', 'sedona-shop' );
    ?></h2>
							<ul class="sedona-shop-video-tutorials">
								<?php 
    foreach ( (array) $videos as $video => $info ) {
        echo  '<li class="sedona-shop-video-tutorials__item">' ;
        foreach ( $info['links'] as $key => $link ) {
            echo  '<a href="' . esc_url( $link['link_url'] ) . '" class="sedona-shop-video-tutorials__url" target="_blank" rel="noopener">' ;
            echo  '<img src="' . esc_url( $link['link_img_src'] ) . '" alt="' . esc_html( $link['link_text'] ) . '" class="sedona-shop-video-tutorials__img" />' ;
            echo  '<span class="sedona-shop-video-tutorials__label">' . esc_html( $link['link_text'] ) . '</span>' ;
            echo  '</a>' ;
        }
        echo  '</li>' ;
    }
    ?>
							</ul>
						</div>

					</div>					
				</aside>

			</div> <!-- .grid -->				
		</div>
	<?php 
}

/**
* Adds an admin notice upon successful activation.
*/
function sedona_shop_activation_admin_notice()
{
    global  $current_user ;
    global  $current_screen ;
    // Don't show on Sedona Shop main admin page
    if ( $current_screen->id === 'appearance_page_sedona-shop-theme' || $current_screen->id === 'toplevel_page_sedona-shop' ) {
        return;
    }
    
    if ( is_admin() ) {
        $current_theme = wp_get_theme();
        $welcome_dismissed = get_user_meta( $current_user->ID, 'sedona_shop_wizard_admin_notice' );
        if ( ($current_theme->get( 'Name' ) == "Sedona Shop" || $current_theme->get( 'Name' ) == "Sedona Shop Pro") && !$welcome_dismissed ) {
            add_action( 'admin_notices', 'sedona_shop_wizard_admin_notice', 99 );
        }
        wp_enqueue_style( 'sedona-shop-wizard-notice-css', get_template_directory_uri() . '/assets/admin/css/wizard-notice.css' );
    }

}

add_action( 'current_screen', 'sedona_shop_activation_admin_notice' );
/**
* Adds a button to dismiss the notice
*/
function sedona_shop_dismiss_wizard_notice()
{
    global  $current_user ;
    $user_id = $current_user->ID;
    if ( isset( $_GET['sedona_shop_wizard_dismiss'] ) && $_GET['sedona_shop_wizard_dismiss'] == '1' ) {
        add_user_meta(
            $user_id,
            'sedona_shop_wizard_admin_notice',
            'true',
            true
        );
    }
}

add_action( 'admin_init', 'sedona_shop_dismiss_wizard_notice', 1 );
/**
* Display an admin notice linking to the wizard screen
*/
function sedona_shop_wizard_admin_notice()
{
    
    if ( current_user_can( 'customize' ) ) {
        ?>
		<div class="notice theme-notice">
			<div class="theme-notice-logo">
				<img src="<?php 
        echo  esc_url( SEDONA_SHOP_URI . '/assets/admin/img/theme_logo.png' ) ;
        ?>" alt="<?php 
        esc_attr_e( 'Sedona Shop', 'sedona-shop' );
        ?>">
			</div>
			<div class="theme-notice-message wp-theme-fresh">
				<h2><?php 
        esc_html_e( 'Thank you for choosing Sedona Shop!', 'sedona-shop' );
        ?></h2>
				<?php 
        
        if ( class_exists( 'Merlin' ) ) {
            ?>
					<p class="about-description"><?php 
            esc_html_e( 'Run the Setup Wizard to configure your new theme and begin customizing your site.', 'sedona-shop' );
            ?></p>
				<?php 
        } else {
            ?>
					<p class="about-description"><?php 
            esc_html_e( 'Follow the steps to configure your new theme and begin customizing your site.', 'sedona-shop' );
            ?></p>
				<?php 
        }
        
        ?>
			</div>
			<div class="theme-notice-cta">
				<?php 
        
        if ( class_exists( 'Merlin' ) ) {
            ?>
					<a href="<?php 
            echo  esc_url( admin_url( 'themes.php?page=merlin' ) ) ;
            ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php 
            esc_html_e( 'Run Setup Wizard', 'sedona-shop' );
            ?></a>
				<?php 
        } else {
            ?>
					<a href="<?php 
            echo  esc_url( admin_url( 'themes.php?page=sedona-shop-theme' ) ) ;
            ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php 
            esc_html_e( 'Setup Instructions', 'sedona-shop' );
            ?></a>
				<?php 
        }
        
        ?>
				<a href="<?php 
        echo  esc_url( wp_nonce_url( add_query_arg( 'sedona_shop_wizard_dismiss', '1' ) ) ) ;
        ?>" class="notice-dismiss" target="_parent"></a>
			</div>
		</div>
	<?php 
    }

}
