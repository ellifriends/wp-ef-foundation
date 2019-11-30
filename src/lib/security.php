<?php

namespace EF\Foundation\Lib;

/**
 * Change login header url to home url.
 *
 * @return string
 */
add_filter( 'login_headerurl', function () {
	return get_home_url();
} );

/**
 * Change login title to blog name.
 *
 * @return string
 */
add_filter( 'login_headertext', function () {
	return get_bloginfo( 'blogname' );
} );

/**
 * Modify login error message to prevent guessing.
 *
 * @return string
 */
add_filter( 'login_errors', function () {
	return __( '<strong>ERROR</strong>: You have entered incorrect login credentials.', 'ef' );
} );

/**
 * Remove WordPress RSS version.
 *
 * @return string
 */
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Disable XML-RPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
