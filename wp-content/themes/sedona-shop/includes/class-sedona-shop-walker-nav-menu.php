<?php

class Sedona_Shop_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = [], $id = 0 ){
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth >= 0 ) ? 'nav__dropdown-menu' : '';
		$output .= "\n$indent<ul class=\"$submenu depth_$depth\" >\n";
	}

	function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= "</ul>";
	}

	function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ){
		$indent = ($depth > 0 ) ? str_repeat("\t", $depth) : '';

		$li_attributes = '';
		$class_names = $values = '';

		$classes = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = ( $args->walker->has_children) ? 'nav__dropdown' : '';
		$classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
		$classes[] = 'menu-item'.$item->ID;

		if($depth && $args->walker->has_children ) {
			$classes[] = 'nav__dropdown-submenu';
		}
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args ));
		$class_names = ' class="'. esc_attr( $class_names ).'"';

		$id = apply_filters('nav_menu_item_id', 'menu-item'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="'.esc_attr( $id ).'"' : '';

		$output .= $indent . '<li' . $id . $values . $class_names . $li_attributes. '>';

		$attributes  = !empty($item->attr_title ) ? ' title="'. esc_attr( $item->attr_title ).'"' : '';
		$attributes .= !empty($item->target ) ? ' target="'. esc_attr( $item->target ).'"' : '';
		$attributes .= !empty($item->xfn ) ? ' rel="'. esc_attr( $item->xfn ).'"' : '';
		$attributes .= !empty($item->url ) ? ' href="'. esc_attr( $item->url ).'"' : '';
		$attributes .= ( $args->walker->has_children ) ? ' class="nav__item-dropdown" aria-expanded="false" role="button" ' : '';

		$submenu_icon = ( $depth > 0 && $args->walker->has_children ) ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="nav__item-submenu-trigger d-lg-block d-none">
			<path fill="none" d="M0 0h24v24H0z"></path>
			<path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path>
		</svg>' : '';
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('nav_link_title', $item->title, $item->ID ) . $submenu_icon . $args->link_after;
		$item_output .= ( $args->walker->has_children ) ? '</a><button class="d-lg-none nav__dropdown-trigger" aria-expanded="false" role="button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
						<path fill="none" d="M0 0h24v24H0z"></path>
						<path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
				</svg>
		</button>' : '</a>'; 
		$item_output .= ( $args->walker->has_children ) ? $args->after : '';

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>
