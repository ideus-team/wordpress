<?php
/**
 * Modify search result for category search
 */
add_action( 'pre_get_posts', 'nc_search_filter' );
function nc_search_filter( $query ) {
  $cat = sanitize_text_field( $_GET['cat'] );

  if ( ! is_admin() && $query->is_main_query() && $query->is_search && $cat ) {
    $tax_query = array(
      array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $cat,
      ),
    );
    $query->set( 'tax_query', $tax_query );
  }
}
