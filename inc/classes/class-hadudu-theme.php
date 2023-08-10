<?php
/**
 * Register sidebars 
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class HADUDU_THEME {

	use Singleton;

	protected function __construct() {
		// load class.
		Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();
		Block_Patterns::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'after_setup_theme', [ $this, 'setup_theme'] );
	}

	public function setup_theme(){
		// Site title
		add_theme_support( 'title-tag' );

		// Add custom logo
		add_theme_support( 'custom-logo', [
			'height'               => 100,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true,
		 ] );

		 //add custom background
		 add_theme_support( 'custom-background' , [
			'default-color' => 'fff',
			//'default-image' => get_template_directory_uri() . '/images/wapuu.jpg',
			//'default-repeat'         => 'no-repeat',
			// 'default-position-x'     => 'left',
			// 'default-position-y'     => 'top',
			// 'default-size'           => 'auto',
			// 'default-attachment'     => 'scroll',
			// 'wp-head-callback'       => '_custom_background_cb',
			// 'admin-head-callback'    => '',
			// 'admin-preview-callback' => ''
		 ]);

		 // Add post thumbnails
		 add_theme_support('post-thumbnails');
		 // Register image size
		 add_image_size( 'featured-thumbnail', 356, 237, true );

		 add_theme_support('customize-selective-refresh-widgets');
		 add_theme_support('automatic-feed-links');

		 add_theme_support(
			 'html5',
			 [
				 'search-form',
				 'comment-form',
				 'comment-list',
				 'gallery',
				 'caption',
				 'script',
				 'style'
			 ]
		 );

		 // Default Editor style
		 add_theme_support('aditor-styles');

		 // Custom aditor style
		 add_editor_style('assets/build/css/editor.css');

		 add_theme_support('wp-block-styles');

		 // Wide image support 
		 add_theme_support('align-wide');

		 // Set a width for the theme
		 global $content_width;
		 if(! isset($content_width)){
			$content_width = 1240;
		 }
	}

}