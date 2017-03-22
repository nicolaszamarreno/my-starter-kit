<?php 
	// Allow to upload picture in SVG
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}

	add_filter('upload_mimes', 'cc_mime_types');
?>