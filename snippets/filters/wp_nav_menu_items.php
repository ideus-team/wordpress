<?php
/**
 * Add items to footer menu
 */
add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
	if ( $args->theme_location == 'footer' ) {
		if ( ! is_user_logged_in() ) {
			$items .= '
				<li class="' . $args->menu_class . '__item">
					<a class="' . $args->menu_class . '__link js-modal" href="#login">' . __( 'Login' ) . '</a>
				</li>
				<li class="' . $args->menu_class . '__item">
					<a class="' . $args->menu_class . '__link js-modal" href="#registration">' . __( 'Sign Up, It’s Free' ) . '</a>
				</li>';
		} elseif ( is_user_logged_in() ) {
			$items .= '
				<li class="' . $args->menu_class . '__item">
					<a class="' . $args->menu_class . '__link" href="'. wp_logout_url() . '">' . __( 'Logout' ) . '</a>
				</li>';
		}
	}

	return $items;
}
