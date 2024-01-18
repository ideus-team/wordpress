<?php
/**
 * Template Name: Redirect to other URL
 * Template Post Type: page
 */

if ( get_field( '_nc_redirect' ) ) {
	wp_redirect( get_field( '_nc_redirect' ) );
	exit;
}
