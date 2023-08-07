<?php
/**
 * Bootstraps the Theme.
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class Sidebars {

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		// actions hooks
		add_action( 'widgets_init' , [ $this, 'register_sidebars' ] );
	}

    public function register_sidebars(){

        register_sidebar([
			'name'				=> __('Sidebar', 'hadudu'),
			'id'				=> 'sidebar-1',
			'description'		=> __('Main sidebar', 'hadudu'),
			'before_widget'		=> '<div id="%1$s" class="widget widget-sidebar %2$s">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h3 class="widget-title">',
			'after_title'		=> '</h3>'
		]);

        register_sidebar([
			'name'				=> __('Footer', 'hadudu'),
			'id'				=> 'sidebar-2',
			'description'		=> __('Fooler sidebar', 'hadudu'),
			'before_widget'		=> '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h3 class="widget-title">',
			'after_title'		=> '</h3>'
		]);

    }

}