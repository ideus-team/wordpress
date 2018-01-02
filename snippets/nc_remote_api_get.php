<?php
/**
 * Get remote JSON
 */
function nc_remote_api_get( $api_url ) {
  $request = wp_remote_get( $api_url );
  if ( is_wp_error( $request ) ) {
    return false;
  }
  $body = wp_remote_retrieve_body( $request );
  return json_decode( $body );
}
