<?php
add_action('init', 'nc_cookie_init');
function nc_cookie_init() {
  add_filter('auth_cookie_expiration', 'nc_return_year');
}
function nc_return_year() {
  return YEAR_IN_SECONDS;
}
?>