<?php
/**
 * Footer template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Sedona Shop
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

	<?php sedona_shop_footer_before(); ?>

	<?php sedona_shop_footer(); ?>		
	
	<?php sedona_shop_footer_after(); ?>

	<?php sedona_shop_back_to_top(); ?>

	<?php sedona_shop_content_bottom(); ?>

	</div> <!-- #content -->

	<?php sedona_shop_content_after(); ?>

</div> <!-- .main-wrapper -->

<?php sedona_shop_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>