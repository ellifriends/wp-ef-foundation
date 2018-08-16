<?php

/**
 * Get a asset url from assets directory.
 *
 * @param string $path
 * @param string $dir
 *
 * @return string
 */
if ( ! function_exists( 'asset' ) ) {
	function asset( string $path, string $dir = 'assets' ) {
		return get_stylesheet_directory_uri() . '/' . $dir . '/' . ltrim( $path, '/' );
	}
}

/**
 * Get the asset url to a versioned Mix file.
 *
 * @param string $path
 * @param string $dir
 *
 * @return string
 */
if ( ! function_exists( 'mix' ) ) {
	function mix( string $path, string $dir = 'assets' ) {
		static $manifest;

		$path = '/' . ltrim( $path, '/' );
		$dir  = get_template_directory() . '/' . ltrim( $dir, '/' );

		if ( file_exists( $dir . '/hot' ) ) {
			return '//localhost:8080' . $path;
		}

		if ( ! $manifest ) {
			$file = $dir . '/mix-manifest.json';
			if ( file_exists( $file ) ) {
				$manifest = json_decode( file_get_contents( $file ), true );
			}
		}

		if ( is_array( $manifest ) && array_key_exists( $path, $manifest ) ) {
			return $dir . $manifest[$path];
		}

		return $dir . $path;
	}
}
