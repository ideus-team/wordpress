<?php
// Обрабатываем AJAX-запрос типа loadMore
add_action('wp_ajax_loadMore', 'loadMore_callback');
add_action('wp_ajax_nopriv_loadMore', 'loadMore_callback');
function loadMore_callback() {
  $args = wp_parse_args($_POST, array(
    'offset' => false,
    'count'  => false,
  ));

  $result = array(
    'offset'  => $args['offset'],
    'content' => '',
  );

  $query = new WP_Query(array(
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => $args['count'],
    'offset'         => $args['offset'],
  ));

  $result['found'] = $query->found_posts;

  while ($query->have_posts()) {
    $query->the_post();
    ob_start();
    get_template_part('template-parts/content', 'postsItem');
    $result['content'] .= ob_get_clean();
    $result['offset']++;
  }

  wp_reset_postdata();

  die (json_encode($result));
}
?>
