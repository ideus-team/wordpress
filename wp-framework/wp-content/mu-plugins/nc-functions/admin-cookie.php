<?php
//Срок действия админской куки = 1 год
add_action('init', 'admin_cookie_init');
function admin_cookie_init() {
  add_filter('auth_cookie_expiration', 'admin_cookie');
}
function admin_cookie() {
  return 31536000; //one year: 60 * 60 * 24 * 365
}
?>