<?php
// Modify except
add_filter('wp_trim_excerpt', 'nc_excerpt_more');
function nc_excerpt_more($excerpt) {
  return str_replace('[&hellip;]', '…', $excerpt);
}

add_filter('excerpt_length', 'nc_excerpt_length');
function nc_excerpt_length($length) {
	return 15;
}
?>