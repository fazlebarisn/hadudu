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
		add_action( 'enqueue_block_assets' , [ $this, 'enqueue_editor_assets' ] );
	}

	public function registerStyles(){
		// Register Syle
		wp_register_style('bootstrap-css', HADUDU_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
		wp_register_style( 'main-css', HADUDU_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime( HADUDU_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );

		// Enqueue Style
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style( 'main-css' );

	}

	public function registerScripts(){
		// Register Scripts
		wp_register_script( 'main-js', HADUDU_BUILD_JS_URI . '/main.js', ['jquery'], filemtime( HADUDU_BUILD_JS_DIR_PATH . '/main.js'), true );
		wp_register_script( 'bootstrap-js', HADUDU_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true );

		// Enqueue Script
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('main-js');
	}

	public function enqueue_editor_assets(){

		$assets_config_file = sprintf( '%s/assets.php', HADUDU_BUILD_PATH );

		if( ! file_exists( $assets_config_file ) ){
			return;
		}

		$assets_config = require_once $assets_config_file;

		if( empty( $assets_config['js/editor.js'] ) ){
			return;
		}

		$editor_asset = $assets_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] )) ? $editor_asset['dependencies'] : [];
		$version = ( ! empty( $editor_asset['version'] )) ? $editor_asset['version'] : fileatime($assets_config_file);

		// Theme gutenberg block js
		if( is_admin() ){
			wp_enqueue_script(
				'hadudu-block-js',
				HADUDU_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true,
			);
		}

		// Theme Gutenberd block CSS
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library'
		];

		wp_enqueue_style(
			'hadudu-block-css',
			HADUDU_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			fileatime( HADUDU_BUILD_CSS_DIR_PATH . '/blocks.css'),
			'all'
		);
	}
}