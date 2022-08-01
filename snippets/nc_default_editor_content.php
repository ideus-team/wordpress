<?php
/**
 * Default content for posts, pages & other post types
 */
add_filter( 'default_content', 'nc_default_editor_content' );
function nc_default_editor_content( $content ) {
  global $post_type;

  switch( $post_type ) {
    case 'post':
      $content = 'Default content for post';
    break;

    case 'page':
      $content = 'Default content for page';
    break;
  }

  return $content;
}
