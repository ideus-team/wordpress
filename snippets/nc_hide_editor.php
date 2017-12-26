<?php
/**
 * Hide editor on specific page
 */
add_action( 'user_can_richedit', 'nc_hide_editor' );
function nc_hide_editor() {
  global $post;

  if ( $post ) {
    $templates = array(
      'page-templates/home.php',
      'page-templates/template.php',
    );
    $template_file = get_post_meta( $post->ID, '_wp_page_template', true );

    if ( in_array( $template_file, $templates ) ) {
      remove_post_type_support( 'page', 'editor' );
    }
  }

  return true;
}
