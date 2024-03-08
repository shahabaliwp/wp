<?php
/**
 * Header top bar
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$top_bar_message = get_theme_mod( 'sedona_shop_settings_top_bar_message', esc_html__( 'Discover best selling sofas, Lounge chairs and get an extra 10% off using the code SEDONA10', 'sedona-shop' ) );
$support_label = get_theme_mod( 'sedona_shop_settings_top_bar_support_label', esc_html__( 'Support', 'sedona-shop' ) );
$support_url = get_theme_mod( 'sedona_shop_settings_top_bar_support_url', '#' );
$store_location_label = get_theme_mod( 'sedona_shop_settings_top_bar_store_location_label', esc_html__( 'Store location', 'sedona-shop' ) );
$store_location_url = get_theme_mod( 'sedona_shop_settings_top_bar_store_location_url', '#' );
$phone_label = get_theme_mod( 'sedona_shop_settings_top_bar_phone_label', esc_html__( '1-800-995-3959', 'sedona-shop' ) );
$phone_url = get_theme_mod( 'sedona_shop_settings_top_bar_phone_url', '#' );
?>

<!-- Top Bar -->
<div class="top-bar d-none d-lg-block">
	<div class="container container-wide">
		<div class="row">
			<?php if ( get_theme_mod( 'sedona_shop_settings_top_bar_message_show', true ) ) : ?>
				<div class="col-lg-6">					
					<span class="top-bar__message">
						<?php echo esc_html( $top_bar_message ); ?>
					</span>
				</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'sedona_shop_settings_top_bar_support_show', true ) ) : ?>
				<div class="col-lg-6">
					<div class="top-bar__items tob-bar-list">
						<?php if ( get_theme_mod( 'sedona_shop_settings_top_bar_support_show', true ) ) : ?>
							<div class="top-bar__item hover-underline">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke-width="2" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
								</svg>
								<a href="<?php echo esc_attr( $support_url ); ?>" class="top-bar__item-label"><?php echo esc_html( $support_label ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'sedona_shop_settings_top_bar_store_location_show', true ) ) : ?>
							<div class="top-bar__item hover-underline">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke-width="2" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
								</svg>
								<a href="<?php echo esc_attr( $store_location_url ); ?>" class="top-bar__item-label"><?php echo esc_html( $store_location_label ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'sedona_shop_settings_top_bar_phone_show', true ) ) : ?>
							<div class="top-bar__item hover-underline">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke-width="2" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
								</svg>
								<a href="<?php echo esc_attr( $phone_url ); ?>" class="top-bar__item-label"><?php echo esc_html( $phone_label ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div> <!-- end top bar -->