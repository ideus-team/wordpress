<?php
/**
 * Handling AJAX request nc_load_more
 */
add_action( 'wp_ajax_nc_load_more', 'nc_load_more_callback' );
add_action( 'wp_ajax_nopriv_nc_load_more', 'nc_load_more_callback' );
function nc_load_more_callback() {
  $result = array();

  if ( ! $_POST['postdata'] ) {
    $result['error'] = 'Empty postdata';
  } else {
    $args = wp_parse_args( $_POST['postdata'], array(
      'post_type' => 'post',
      'orderby'   => 'date',
      'order'     => 'DESC',
      'offset'    => get_option( 'posts_per_page', 10 ),
      'count'     => get_option( 'posts_per_page', 10 ),
      'template'  => 'post',
    ) );

    $result = array(
      'offset'  => $args['offset'],
      'content' => '',
    );

    $query = new WP_Query( array(
      'post_type'      => $args['post_type'],
      'orderby'        => array( $args['orderby'] => $args['order'] ),
      'posts_per_page' => $args['count'],
      'offset'         => $args['offset'],
    ) );

    $result['total'] = $query->found_posts;

    while ( $query->have_posts() ) {
      $query->the_post();
      ob_start();
      get_template_part( 'template-parts/content/' . $args['template'] );
      $result['content'] .= ob_get_clean();
      $result['offset'] ++;
    }

    wp_reset_postdata();
  }

  if ( ! $result['error'] ) {
    wp_send_json_success( $result );
  } else {
    wp_send_json_error( $result );
  }
}
