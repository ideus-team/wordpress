<?php
/**
 * Get remote JSON & cache with Transients API
 */
function nc_remote_api_get( $api_url, $expiration = HOUR_IN_SECONDS ) {
  $api_url_hash = 'nc_cache_' . md5( $api_url );
  $cache = get_transient( $api_url_hash );

  if ( $cache ) {
    $body = $cache;
  } else {
    $request = wp_remote_get( $api_url );

    if ( is_wp_error( $request ) ) {
      return false;
    }

    $body = wp_remote_retrieve_body( $request );

    set_transient( $api_url_hash, $body, $expiration );
  }

  return json_decode( $body );
}
