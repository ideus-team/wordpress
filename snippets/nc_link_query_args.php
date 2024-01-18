<?php
/**
 * Hide some post types from the "link to existing content"
 */
add_filter( 'wp_link_query_args', 'nc_link_query_args' );
function nc_link_query_args ( $query ) {
	$pt_new = array();
	$exclude_types = array( 'dictionary' );

	foreach ( $query['post_type'] as $pt ) {
		if ( in_array( $pt, $exclude_types ) ) continue;
		$pt_new[] = $pt;
	}

	$query['post_type'] = $pt_new;

	return $query;
}
