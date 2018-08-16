<?php

namespace EF\Foundation\Lib;

use Normalizer;

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
	if ( ! Normalizer::isNormalized( $file['name'], Normalizer::FORM_C ) ) {
		$file['name'] = Normalizer::normalize( $file['name'], Normalizer::FORM_C );
	}

	return $file;
}, 1 );
