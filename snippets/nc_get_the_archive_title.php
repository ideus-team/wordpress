<?php
/**
 * Remove "Category: ", "Tag: " etc. from archive title
 */
add_action( 'get_the_archive_title', 'nc_get_the_archive_title' );
function nc_get_the_archive_title( $title ) {
  return preg_replace( '~^[^:]+: ~', '', $title );
}
