<?php
/**
 * Filters for WP update
 */

// Update core
add_filter( 'auto_update_core', '__return_true' );

// Update for Nightly Build
add_filter( 'allow_dev_auto_core_updates', '__return_false' );

// Update core minor
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

// Update core major
add_filter( 'allow_major_auto_core_updates', '__return_false' );

// Update theme
add_filter( 'auto_update_theme', '__return_false' );

// Update plugins
add_filter( 'auto_update_plugin', '__return_false' );

// Update translation
add_filter( 'auto_update_translation', '__return_true' );

// Send email for update notification
add_filter( 'auto_core_update_send_email', '__return_true' );

// Send email for debug notification
add_filter( 'automatic_updates_send_debug_email', '__return_true' );

// Change email for update/debug notification
add_filter( 'auto_core_update_email', 'nc_override_update_email', 1 );
add_filter( 'automatic_updates_debug_email', 'nc_override_update_email', 1 );
function nc_override_update_email( $email ) {
  $email['to'] = 'wordpress@ideus.biz';
  return $email;
}
