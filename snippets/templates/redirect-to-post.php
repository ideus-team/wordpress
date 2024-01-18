<?php
/**
 * Template Name: Redirect to other post
 * Template Post Type: page
 */

if ( get_field( '_nc_redirect' ) ) {
	wp_redirect( get_permalink( get_field( '_nc_redirect' ) ) );
	exit;
}
