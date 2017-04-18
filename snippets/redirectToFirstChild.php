<?php
/*
Template Name: Redirect To First Child
*/
while ( have_posts() ) {
  the_post();

  $pages = get_pages( array(
    'sort_order'  => 'ASC',
    'sort_column' => 'menu_order',
    'parent'      => get_the_ID(),
    'number'      => 1,
  ) );

  if ( $pages ) {
    $first = $pages[0];
    wp_redirect( get_permalink( $first->ID ) );
  }
}
