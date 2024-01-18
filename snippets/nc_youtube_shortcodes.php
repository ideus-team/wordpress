<?php
/**
 * Get Youtube playlist
 */
add_shortcode( 'nc_playlist', 'nc_playlist_shortcode' );
function nc_playlist_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'key' => '',
		'id'  => '',
	), $atts );

	$api_url = add_query_arg( array(
		'part'       => 'snippet',
		'maxResults' => '50',
		'key'        => $atts['key'],
		'playlistId' => $atts['id'],
	), 'https://www.googleapis.com/youtube/v3/playlistItems' );

	$playlistItems = json_decode( file_get_contents( $api_url ) );

	if ( ! empty( $playlistItems->items ) ) {
		$list = '';

		foreach( $playlistItems->items as $item ) {
			if ( $item->snippet->title != 'Private video' ) {
				$list .= '
				<li class="b-playlist__item">
					<a class="b-playlist__link js-video" href="https://youtu.be/' . $item->snippet->resourceId->videoId . '" target="_blank">
						<img class="b-playlist__thumb" src="' . $item->snippet->thumbnails->medium->url . '" alt="' . $item->snippet->title . '">
					</a>
					<h4 class="b-playlist__title">' . $item->snippet->title . '</h4>
				</li>
				';
			}
		}

		$result = '<ul class="b-playlist">' . $list . '</ul>';
	} else {
		$result = 'Empty playlist';
	}

	return $result;
}


/**
 * Get Youtube video
 */
add_shortcode( 'nc_video', 'nc_video_shortcode' );
function nc_video_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'key' => '',
		'id'  => '',
	), $atts );

	$api_url = add_query_arg( array(
		'part' => 'snippet',
		'key'  => $atts['key'],
		'id'   => $atts['id'],
	), 'https://www.googleapis.com/youtube/v3/videos' );

	$videos = json_decode( file_get_contents( $api_url ) );

	if ( ! empty( $videos->items ) ) {
		$list = '';

		foreach( $videos->items as $item ) {
			if ( $item->snippet->title != 'Private video' ) {
				$list .= '
				<div class="b-videoItem">
					<a class="b-videoItem__link js-video" href="https://youtu.be/' . $item->id . '" target="_blank">
						<img class="b-videoItem__thumb" src="' . $item->snippet->thumbnails->medium->url . '" alt="' . $item->snippet->title . '">
					</a>
					<h4 class="b-videoItem__title">' . $item->snippet->title . '</h4>
				</div>
				';
			}
		}

		$result = $list;
	} else {
		$result = 'Empty video';
	}

	return $result;
}
