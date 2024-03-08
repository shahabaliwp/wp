<?php
/**
 * Footer default template
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$footer_bottom_text = get_theme_mod( 'sedona_shop_settings_footer_bottom_text', sprintf(
	esc_html__( '&copy; [current-year] %1$s. Made by %2$sDeoThemes%3$s' , 'sedona-shop' ),
	get_bloginfo( 'name' ),
	'<a href="https://deothemes.com">',
	'</a>'
) );

?>
	
<?php if ( get_theme_mod( 'sedona_shop_settings_footer_show', true ) ) : ?>
	<!-- Footer -->
	<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

		<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) || is_active_sidebar( 'sedona-shop-footer-col-2' ) || is_active_sidebar( 'sedona-shop-footer-col-3' ) || is_active_sidebar( 'sedona-shop-footer-col-4' ) || is_active_sidebar( 'sedona-shop-footer-col-5' ) ) : ?>
			<div class="footer__widgets">
				<div class="container-wide">
					<div class="row">

						<?php // 5 Columns						
						if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-5' ) : ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) ) : ?>
								<div class="col-lg col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-2' ) ) : ?>
								<div class="col-lg col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-2' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-3' ) ) : ?>
								<div class="col-lg col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-3' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-4' ) ) : ?>
								<div class="col-lg col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-4' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-5' ) ) : ?>
								<div class="col-lg col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-5' ); ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>

						<?php // 4 Columns
						if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-4' ) : ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) ) : ?>
								<div class="col-lg-4 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-2' ) ) : ?>
								<div class="col-lg-2 offset-lg-2 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-2' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-3' ) ) : ?>
								<div class="col-lg-2 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-3' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-4' ) ) : ?>
								<div class="col-lg-2 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-4' ); ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>

						<?php // 3 Columns
						if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-3' ) : ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) ) : ?>
								<div class="col-lg-4 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-2' ) ) : ?>
								<div class="col-lg-4 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-2' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-3' ) ) : ?>
								<div class="col-lg-4 col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-3' ); ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>

						<?php // 2 Columns
						if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-2' ) : ?>

							<?php if(is_active_sidebar( 'sedona-shop-footer-col-1' )) : ?>
								<div class="col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
								</div>
							<?php endif; ?>

							<?php if(is_active_sidebar( 'sedona-shop-footer-col-2' )) : ?>
								<div class="col-md-6">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-2' ); ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>

						<?php // 1 Column
						if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-1' ) : ?>

							<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) ) : ?>
								<div class="col-md-12">
									<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>

						<?php // 50 / 25 / 25 Columns
							if ( get_theme_mod( 'sedona_shop_settings_footer_columns', 'footer-col-4' ) == 'footer-col-50-25-25' ) : ?>                

								<?php if ( is_active_sidebar( 'sedona-shop-footer-col-1' ) ) : ?>
									<div class="col-lg-6 footer__col-1">
										<?php dynamic_sidebar( 'sedona-shop-footer-col-1' ); ?>
									</div>
								<?php endif; ?>

								<?php if ( is_active_sidebar( 'sedona-shop-footer-col-2' ) ) : ?>
									<div class="col-lg-3 footer__col-2">
										<?php dynamic_sidebar( 'sedona-shop-footer-col-2' ); ?>
									</div>
								<?php endif; ?>

								<?php if ( is_active_sidebar( 'sedona-shop-footer-col-3' ) ) : ?>
									<div class="col-lg-3 footer__col-3">
										<?php dynamic_sidebar( 'sedona-shop-footer-col-3' ); ?>
									</div>
								<?php endif; ?>

							<?php endif; ?>
					</div>
				</div> <!-- .container -->
			</div> <!-- end footer widgets -->
		<?php endif; ?>

	

	<?php if( get_theme_mod( 'sedona_shop_settings_footer_bottom_show', true ) ) : ?>
		<div class="footer__bottom">
			<div class="container-wide">
				<div class="footer__row">
					<div class="row">
						
						<?php if ( has_nav_menu( 'footer-bottom-menu' ) && get_theme_mod( 'sedona_shop_settings_footer_bottom_menu_show', true ) ) : ?>						
							<div class="col-md-6">
						<?php else : ?>
							<div class="col-md-12">
						<?php endif; ?>
							<?php if ( $footer_bottom_text ) : ?>
								<div class="footer__bottom-copyright">									
									<span class="copyright">
										<?php sedona_shop_footer_bottom_text(); ?>
									</span>
								</div>
							<?php endif; ?>
						</div>

						<?php if ( has_nav_menu( 'footer-bottom-menu' ) && get_theme_mod( 'sedona_shop_settings_footer_bottom_menu_show', true ) ) : ?>
							<div class="col-md-6">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-bottom-menu',
										'menu_class'     => 'footer__nav-menu',
										'depth'          => 1,
									) );
								?>
							</div>
						<?php endif; ?>

					</div> <!-- .row -->
				</div> <!-- .footer__row -->
			</div> <!-- .container -->
		</div> <!-- .footer__bottom -->

	<?php endif; ?>
	</footer> <!-- end footer -->
<?php endif; ?> <!-- if footer show -->