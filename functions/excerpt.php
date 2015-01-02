<?php
// Modify except
add_filter('excerpt_more', 'nc_excerpt_more');
function nc_excerpt_more($more) {
  return '…';
}

add_filter('excerpt_length', 'nc_excerpt_length');
function nc_excerpt_length($length) {
	return 15;
}
?>