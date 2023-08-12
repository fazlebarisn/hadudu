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
					'content'	=> '<!-- wp:cover {"url":"http://localhost/r/wpr/wp-content/uploads/2014/01/dsc20050315_145007_132.jpg","id":1691,"dimRatio":50,"align":"full"} -->
					<div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1691" alt="" src="http://localhost/r/wpr/wp-content/uploads/2014/01/dsc20050315_145007_132.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
					<p class="has-text-align-center has-large-font-size">Make Your Own Way</p>
					<!-- /wp:paragraph -->
					
					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">How to know yourself!</p>
					<!-- /wp:paragraph -->
					
					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Blog</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div></div>
					<!-- /wp:cover -->'
				]
			);
		}
	}


}