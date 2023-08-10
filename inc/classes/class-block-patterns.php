<?php
/**
 * Block pattarns
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class Block_Patterns{

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'init' , [ $this, 'register_block_patterns' ] );
	}

	public function register_block_patterns(){
		if( function_exists('reginter_block_pattern') ){
			register_block_pattern(
				'hadudu/cover',
				[
					'title'	=> __('Hadudu Cover', 'hadudu'),
					'description'	=> __('A Hadudu block with text and image', 'hadudu'),
				]
			);
		}
	}


}