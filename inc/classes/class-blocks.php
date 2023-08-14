<?php
/**
 * Blocks class 
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class Blocks {

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		// actions hooks
		add_action( 'block_categories' , [ $this, 'add_block_categories' ] );
	}

	public function add_block_categories( $categories ){
        $catecory_slugs = wp_list_pluck( $categories, 'slug' );
        
		$result = in_array( 'hadudu', $catecory_slugs, true ) ? $categories : 
			array_merge(
				$categories,
				[
					[
						'slug'	=> 'hadudu',
						'title'	=> __('Hadudu Blocks', 'hadudu'),
						'icon'	=> 'table-row-after'
					]
				]
			);
		return $result;

	}


}