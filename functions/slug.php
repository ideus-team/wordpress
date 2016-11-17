<?php
//Получение slug поста по его ID
function get_slug($id) {
  $post_data = get_post($id, ARRAY_A);
  $slug = $post_data['post_name'];
  return $slug;
}

function the_slug($id) {
  echo get_slug($id);
}
?>
