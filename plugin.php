<?php

/**
 * Plugin Name: Elli & Friends Foundation
 * Plugin URI: https://github.com/ellifriends/wp-ef-foundation
 * Description: Must use code for Elli & Friends projects.
 * Version: 1.0.0
 * Author: Elli & Friends
 * Author URI: https://ellifriends.se/
 * License: MIT License
 */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Bootstrap plugin.
 */
add_action( 'plugins_loaded', function() {
	\EF\Foundation\Foundation::instance();
} );
