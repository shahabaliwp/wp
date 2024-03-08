<?php
/**
 * Header template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php sedona_shop_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php sedona_shop_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-no-jquery itemscope itemtype="http://schema.org/WebPage">

	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'sedona-shop' ) ?></a>

	<!-- Preloader -->
	<?php if ( get_theme_mod( 'sedona_shop_settings_preloader_settings', false ) ) : ?>
		<div class="loader-mask">
			<div class="loader">
				<div></div>
			</div>
		</div>
	<?php endif; ?>

	<div class="main-wrapper">

		<?php sedona_shop_header_before(); ?>

		<?php sedona_shop_header(); ?>
		
		<?php sedona_shop_header_after(); ?>

		<?php sedona_shop_content_before(); ?>

		<div id="content" class="site-content">

			<?php sedona_shop_content_top(); ?>