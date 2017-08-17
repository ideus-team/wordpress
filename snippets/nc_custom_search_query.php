<?php
/*
 * Custom search query
 */
add_filter( 'posts_where' , 'nc_custom_search_query', 1 , 2 );
function nc_custom_search_query( $where, $qry ) {
  global $wpdb;
  $first_letter = $qry->get( 'nc_first_letter' );
  $search       = $qry->get( 'nc_search' );

  if ( ! empty( $first_letter ) ) {
    $where .= $wpdb->prepare(
      " AND SUBSTRING( {$wpdb->posts}.post_title, 1, 1 ) = %s ",
      $first_letter
    );
  }

  if ( ! empty( $search ) ) {
    $where .= $wpdb->prepare(
      " AND {$wpdb->posts}.post_title LIKE %s ",
      '%' . $search . '%'
    );
  }

  return $where;
}
