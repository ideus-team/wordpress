<?php
/**
 * Get the page or post slug
 */
if ( ! function_exists( 'get_the_slug' ) ) {
	function get_the_slug( $post = 0 ) {
		$post = get_post( $post );

		$slug = isset( $post->post_name ) ? $post->post_name : '';
		$id = isset( $post->ID ) ? $post->ID : 0;

		return apply_filters( 'the_slug', $slug, $id );
	}
}

/**
 * Display the page or post slug
 *
 * Uses get_the_slug()
 */
if ( ! function_exists( 'the_slug' ) ) {
	function the_slug() {
		$slug = get_the_slug();

		echo $slug;
	}
}
