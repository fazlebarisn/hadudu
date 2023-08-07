<?php
/**
 * Bootstraps the Theme.
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class Assets {

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		// actions hooks
		add_action( 'wp_enqueue_scripts' , [ $this, 'registerStyles' ] );
		add_action( 'wp_enqueue_scripts' , [ $this, 'registerScripts' ] );
	}

	public function registerStyles(){
		// Register Syle
		wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime( HADUDU_DIR_PATH . '/style.css'), 'all');
		wp_register_style('bootstrap-css', HADUDU_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

		// Enqueue Style
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('stylesheet');
	}

	public function registerScripts(){
		// Register Scripts
		wp_register_script( 'main-js', HADUDU_DIR_URI . '/assets/main.js', ['jquery'], filemtime( HADUDU_DIR_PATH . '/assets/main.js'), true );
		wp_register_script( 'bootstrap-js', HADUDU_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true );

		// Enqueue Script
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('main-js');
	}
}