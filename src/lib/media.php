<?php

namespace EF\Foundation\Lib;

/**
 * Force perfect JPG images.
 *
 * @return int
 */
add_filter( 'jpeg_quality', function () {
	return 100;
} );

/**
 * Normalizes a filename before it is uploaded to WordPress.
 *
 * @param array $file
 *
 * @return array
 */
add_filter( 'wp_handle_upload_prefilter', function ( $file ) {
	if ( ! is_array( $file ) && ! is_string( $file ) ) {
		return $file;
	}

	if ( ! is_array( $file ) ) {
		$file = [
			'name' => $file,
		];
	}

	$search   = [ '/[^a-zA-Z0-9 \.\&\/_-]+/', '/[ \.\&\/-]+/' ];
	$replace  = [ '', '-' ];
	$path     = pathinfo( $file['name'] );
	$filename = preg_replace( '/.' . $path['extension'] . '$/', '', $file['name'] );
	$filename = html_entity_decode( $filename, ENT_QUOTES, 'UTF-8' );
	$filename = remove_accents( $filename );
	$filename = preg_replace( $search, $replace, $filename );
	$filename = trim( $filename, '-' );
	$filename = strtolower( $filename );

	$file['name'] = $filename . '.' . $path['extension'];

	return $file;
}, 1 );
