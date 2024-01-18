<?php
/**
 * Download external files
 */
function nc_download_external( $items = array() ) {
	$path = get_theme_file_path( 'assets/js/temp' );

	foreach ( $items as $item ) {
		$content = file_get_contents( $item['url'] );
		$save_to = $path . '/' . $item['filename'];

		file_put_contents( $save_to, $content );
	}
}

/**
 * Download all external files
 */
function nc_download_external_all() {
	nc_download_external( array(
		array (
			'url'      => 'https://ssl.google-analytics.com/ga.js',
			'filename' => 'ga.js',
		),
	) );
}

/**
 * Add hook for download external
 */
add_action( 'nc_download_external_hook', 'nc_download_external_all' );


/**
 * Schedule download external
 */
if ( ! wp_next_scheduled( 'nc_download_external_hook' ) ) {
	wp_schedule_event( time(), 'hourly', 'nc_download_external_hook' );
}
