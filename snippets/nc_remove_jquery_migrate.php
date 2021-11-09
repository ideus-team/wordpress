<?php
/**
 * Remove jquery-migrate
 */
add_filter( 'wp_default_scripts', 'nc_remove_jquery_migrate' );
function nc_remove_jquery_migrate( $scripts ) {

  if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
    return;
  }

  $deps = & $scripts->registered['jquery']->deps;

  $deps = array_diff( $deps, [ 'jquery-migrate' ] );
}
