<?php
/**
 * Youtube adaptive player
 */
add_filter( 'oembed_dataparse', 'nc_youtube_adaptive', 10, 2 );
function nc_youtube_adaptive( $return, $data ) {
	if ( 'YouTube' === $data->provider_name ) {
		$return = '<div class="l-youtube">' . $return . '</div>';
	}

	return $return;
}
?>
<style>
.l-youtube {
	position: relative;
	overflow: hidden;
	padding-top: 30px;
	padding-bottom: 56.25%;
	height: 0;
}

.l-youtube iframe,
.l-youtube object,
.l-youtube embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
