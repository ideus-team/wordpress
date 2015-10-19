<?php
//Срок действия админской куки = 1 год
add_action('init', 'admin_cookie_init');
function admin_cookie_init() {
  add_filter('auth_cookie_expiration', 'admin_cookie');
}
function admin_cookie() {
  return YEAR_IN_SECONDS;
}
?>