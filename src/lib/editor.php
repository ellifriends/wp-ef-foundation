<?php

namespace EF\Foundation\Lib;

/**
 * Remove Microsoft Word formatting on save for TinyMCE.
 *
 * @param  string $content
 *
 * @return string
 */
add_filter( 'content_save_pre', function ( $content ) {
	return preg_replace( '/\<\!\-\-\[if gte mso.*?\-\-\>/ms', '', $content );
} );
