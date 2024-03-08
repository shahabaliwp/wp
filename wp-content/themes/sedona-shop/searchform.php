<?php defined('ABSPATH') OR die('restricted access'); ?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-input" placeholder="<?php esc_attr_e( 'Search', 'sedona-shop' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-button">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke-width="1.5" stroke="currentColor" class="search-icon">
			<path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
		</svg>
	</button>
</form>