<?php
/** 
* Theme functions
* @package Hadudu
*/

if ( ! defined( 'FBS_DIR_PATH' ) ) {
	define( 'FBS_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'FBS_DIR_URI' ) ) {
	define( 'FBS_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once FBS_DIR_PATH . '/inc/helpers/autoloader.php';
require_once FBS_DIR_PATH . '/inc/helpers/template-tag.php';

function fbs_get_theme_instance() {
	\FBS_THEME\Inc\FBS_THEME::get_instance();
}

fbs_get_theme_instance();
