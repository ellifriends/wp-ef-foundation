<?php

namespace EF\Foundation\Lib;

/**
 * Disable redirection of /dashboard/ to /wp-admin/
 */
add_action( 'template_redirect', function () {
	remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
} );
