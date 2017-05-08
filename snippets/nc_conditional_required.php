<?php
/*
 * Conditional Required Contact Form 7 Fields
 * Source: http://second-cup-of-coffee.com/conditional-required-contact-form-7-fields/
 */
add_filter( 'wpcf7_validate_tel', 'nc_conditional_required', 10, 2 );
add_filter( 'wpcf7_validate_tel*', 'nc_conditional_required', 10, 2 );
add_filter( 'wpcf7_validate_email', 'nc_conditional_required', 10, 2 );
add_filter( 'wpcf7_validate_email*', 'nc_conditional_required', 10, 2 );
function nc_conditional_required( $result, $tag ) {
  $tag = new WPCF7_Shortcode( $tag );

  $name = $tag->name;

  $value = isset( $_POST[$name] ) ? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) ) : '';

  if ( $name == 'phone' && $_POST['email'] == '' ) {
    if ( $value == '' ) {
      $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    }
  }

  if ( $name == 'email' && $_POST['phone'] == '' ) {
    if ( $value == '' ) {
      $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    } elseif ( ! wpcf7_is_email( $value ) ) {
      $result->invalidate( $tag, wpcf7_get_message( 'invalid_email' ) );
    }
  }

  return $result;
}
