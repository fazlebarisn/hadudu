<?php
/** 
* Theme functions
* @package Hadudu
*/

if( !function_exists('dd') ){
	function dd( $val, $bool = false ){
		echo "<pre>";
			if($bool){
				var_dump($val);
				wp_die();
			}else{
				var_dump($val);
			}
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
	define( 'HADUDU_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'HADUDU_BUILD_JS_URI' ) ) {
	define( 'HADUDU_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'HADUDU_BUILD_JS_DIR_PATH' ) ) {
	define( 'HADUDU_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'HADUDU_BUILD_PATH' ) ) {
	define( 'HADUDU_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'HADUDU_BUILD_IMG_URI' ) ) {
	define( 'HADUDU_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'HADUDU_BUILD_CSS_URI' ) ) {
	define( 'HADUDU_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'HADUDU_BUILD_CSS_DIR_PATH' ) ) {
	define( 'HADUDU_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

require_once HADUDU_DIR_PATH . '/inc/helpers/autoloader.php';
require_once HADUDU_DIR_PATH . '/inc/helpers/template-tag.php';

function hadudu_get_theme_instance() {
	\HADUDU_THEME\Inc\HADUDU_THEME::get_instance();
}

hadudu_get_theme_instance();
