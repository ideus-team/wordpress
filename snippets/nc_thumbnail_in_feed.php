<?php
/**
 * Add thumbnail to RSS
 */
add_filter( 'the_excerpt_rss', 'nc_thumbnail_in_feed' );
add_filter( 'the_content_feed', 'nc_thumbnail_in_feed' );
function nc_thumbnail_in_feed( $content ) {
	global $post;

	if ( has_post_thumbnail( $post->ID ) ) {
		$thumbnail = get_the_post_thumbnail( $post->ID, 'large', array( 'style' => 'max-width: 100%;' ) );
		$thumbnail = '<div>' . $thumbnail . '</div>';
		$content = $thumbnail . $content;
	}

	return $content;
}
