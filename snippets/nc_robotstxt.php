<?php
// Change robots.txt
add_filter('robots_txt', 'nc_robotstxt');
function nc_robotstxt($text){
  $text .= 'Allow: /sitemap/'."\n";
  return $text;
}
?>
