<?php
// Fix for URL's if domain change
function nc_domainfix($url) {
  $out = site_url(wp_make_link_relative($url));
  return $out;
}
?>
