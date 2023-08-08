<?php
/** 
* Theme functions
* @package Hadudu
*/

if( !function_exists('dd') ){
	function dd($val){
		echo "<pre>";
			var_dump($val);
		echo "</pre>";
	}
}

if ( ! defined( 'HADUDU_DIR_PATH' ) ) {
	define( 'HADUDU_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'HADUDU_DIR_URI' ) ) {
	define( 'HADUDU_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'HADUDU_BUILD_URI' ) ) {
	define( 'HADUDU_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/build' );
}

if ( ! defined( 'HADUDU_BUILD_JS_URI' ) ) {
	define( 'HADUDU_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/build/js' );
}

if ( ! defined( 'HADUDU_BUILD_JS_DIR_PATH' ) ) {
	define( 'HADUDU_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/build/js' );
}

if ( ! defined( 'HADUDU_BUILD_IMG_URI' ) ) {
	define( 'HADUDU_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/build/src/img' );
}

if ( ! defined( 'HADUDU_BUILD_CSS_URI' ) ) {
	define( 'HADUDU_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/build/css' );
}

if ( ! defined( 'HADUDU_BUILD_CSS_DIR_PATH' ) ) {
	define( 'HADUDU_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/build/css' );
}

require_once HADUDU_DIR_PATH . '/inc/helpers/autoloader.php';
require_once HADUDU_DIR_PATH . '/inc/helpers/template-tag.php';

function hadudu_get_theme_instance() {
	\HADUDU_THEME\Inc\HADUDU_THEME::get_instance();
}

hadudu_get_theme_instance();
