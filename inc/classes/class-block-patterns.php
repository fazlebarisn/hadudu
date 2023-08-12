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
		add_action( 'init' , [ $this, 'register_block_pattern_categories' ] );
	}

	public function register_block_patterns(){
		if( function_exists('register_block_pattern') ){
			/**
			 * Register cover block patterns
			 */
			$cover_content = $this->get_pattern_content('template-parts/patterns/cover');

			register_block_pattern(
				'hadudu/cover',
				[
					'title'			=> __('Hadudu Cover', 'hadudu'),
					'description'	=> __('A Hadudu block with text and image', 'hadudu'),
					'categories'	=> ['cover'],
					'content'		=> $cover_content,
				]
			);

			/**
			 * Register two column block patterns
			 */
			$columns_content = $this->get_pattern_content('template-parts/patterns/columns');

			register_block_pattern(
				'hadudu/columns',
				[
					'title'			=> __('Hadudu Columns', 'hadudu'),
					'description'	=> __('A Hadudu column block with text', 'hadudu'),
					'categories'	=> ['tow-columns'],
					'content'		=> $columns_content,
				]
			);

		}
	}

	public function get_pattern_content( $template_path ){
		ob_start();
		get_template_part($template_path);
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function register_block_pattern_categories(){

		$pattern_categories = [
			'cover'		=> __('Cover', 'hadudu'),
			'tow-columns'	=> __('Tow Columns', 'hadudu')
		];

		if( ! empty( $pattern_categories) && is_array( $pattern_categories) ){
			foreach( $pattern_categories as $pattern_category => $pattern_category_label ){
				if( function_exists('register_block_pattern_category')){
					register_block_pattern_category(
						$pattern_category,
						['label' => $pattern_category_label]
					);
				}
			}
		}
	}

}