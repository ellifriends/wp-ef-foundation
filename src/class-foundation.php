<?php

namespace EF\Foundation;

final class Foundation {
	/**
	 * The instance of foundation class.
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Get foundation instance.
	 *
	 * @return object
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new static;
		}
	}

	/**
	 * Foundation constructor.
	 */
	protected function __construct() {
		$this->load_files();
	}

	/**
	 * Load files.
	 */
	protected function load_files() {
		$paths = [
			'/helpers/*.php',
			'/lib/*.php',
		];

		foreach ( $paths as $path ) {
			foreach ( glob( __DIR__ . $path ) as $file ) {
				if ( file_exists( $file ) ) {
					require_once $file;
				}
			}
		}
	}
}
