<?php
// Modifiers for body
add_filter('body_class', 'nc_body_class');
function nc_body_class($classes) {
  global $post;
  $post_data = get_post($post->ID, ARRAY_A);

  $slug = (is_front_page()) ? '' : $post_data['post_name'];

  $classes[] = (is_front_page()) ? '-page_home' : '-page_inner';
  if ($slug) {
    $classes[] = '-page_'.$slug;
  }

  return $classes;
}
?>