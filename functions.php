<?php
/** 
* Theme functions
* @package Hadudu
*/

if ( ! defined( 'HADUDU_DIR_PATH' ) ) {
	define( 'HADUDU_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'HADUDU_DIR_URI' ) ) {
	define( 'HADUDU_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once HADUDU_DIR_PATH . '/inc/helpers/autoloader.php';
require_once HADUDU_DIR_PATH . '/inc/helpers/template-tag.php';

function hadudu_get_theme_instance() {
	\HADUDU_THEME\Inc\HADUDU_THEME::get_instance();
}

hadudu_get_theme_instance();
