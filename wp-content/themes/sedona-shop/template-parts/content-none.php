<?php
/**
 * If no content template.
 *
 * @package Sedona Shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<div class="no-content pt-64 pb-64">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="text-center">
				<h3><?php esc_html_e( 'There is no content to display', 'sedona-shop' ); ?></h3>

				<p class="mb-32"><?php esc_html_e('Don\'t fret! Let\'s get you back on track. Perhaps searching can help', 'sedona-shop') ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>    
</div>