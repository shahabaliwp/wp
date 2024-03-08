<?php
/**
 * Header default template
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$header_classes = array( 'sedona-shop-header', 'nav' );
$header_sticky = ( get_theme_mod( 'sedona_shop_settings_sticky_header', true ) ) ? 'nav--sticky ' : '';
$header_classes = implode( ' ', $header_classes );

if ( get_theme_mod( 'sedona_shop_settings_top_bar_show', true ) ) {
	get_template_part( 'template-parts/header/topbar' );
}
?>

<header class="<?php echo esc_attr( $header_classes ); ?>" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
	<div class="nav__holder-placeholder d-none"></div>
	<div class="nav__holder <?php echo esc_attr( $header_sticky ); ?>">
		<div class="nav__container container container-wide">
			<div class="nav__flex-parent">

				<div class="nav__header">

					<?php sedona_shop_logo_before(); ?>
					<?php sedona_shop_logo(); ?>
					<?php sedona_shop_logo_after(); ?>

					<?php sedona_shop_menu_mobile(); ?>

				</div> <!-- .nav__header -->

				<?php sedona_shop_menu_before(); ?>

				<?php if ( has_nav_menu('primary-menu') ) : ?>
					<!-- Navbar -->
					<nav class="nav__wrap collapse navbar-collapse" id="navbar-collapse" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="<?php echo esc_attr__( 'Primary menu', 'sedona-shop' ); ?>">		
						<?php			
							wp_nav_menu( array(
								'theme_location'  => 'primary-menu',
								'fallback_cb'			=> '__return_false',
								'container'       => false,
								'menu_class'      => 'nav__menu',
								'walker'          => new Sedona_Shop_Walker_Nav_Menu()
							) );
						?>

						<?php sedona_shop_last_menu_item_after(); ?>

					</nav> <!-- end nav__wrap -->
				<?php endif; ?>

				<?php sedona_shop_menu_after(); ?>

			</div> <!-- .flex-parent -->
		</div> <!-- .nav__container -->
	</div> <!-- .nav__holder -->
</header> <!-- .sedona-shop-header -->