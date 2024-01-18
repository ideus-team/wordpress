<?php
/**
 * Remove CF7 styles & scripts from homepage
 */
add_action( 'wp_enqueue_scripts', 'nc_remove_cf7_js_css' );
function nc_remove_cf7_js_css() {
	global $post;
	if ( is_front_page() && isset( $post->post_content ) AND ! has_shortcode( $post->post_content, 'contact-form-7' ) ) {
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
		wp_dequeue_script( 'google-recaptcha' );
	}
}
