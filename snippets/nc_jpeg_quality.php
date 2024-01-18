<?php
/**
 * JPEG Quality
 */
add_filter( 'jpeg_quality', 'nc_jpeg_quality' );
function nc_jpeg_quality( $quality ) {
	return 70;
}
