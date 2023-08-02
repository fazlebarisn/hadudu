<?php
/**
 * Register menus
 *
 * @package Hadudu
 */

namespace HADUDU_THEME\Inc;

use HADUDU_THEME\Inc\Traits\Singleton;

class Meta_Boxes {

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		// actions hooks
		add_action( 'add_meta_boxes' , [ $this, 'hide_title_metabox' ] );
        add_action( 'save_post' , [ $this, 'save_post_metadata' ] );
	}

    /**
     * Register a custom metabox for hide the page title 
     * hide_title_metabox function will do that
     */
	public function hide_title_metabox(){
        $screens = ['post'];

        foreach( $screens as $screen ){
            add_meta_box(
                'hide_page_title',
                __('Page Title Options', 'hadudu'),
                [$this, 'hide_title_metabox_html'], // callback function
                $screen,
                'side' // display in sidebar
            );
        }
    }

    /**
     * This is the callback function for hide title metabox
     * We will add html here to display the option 
     * @param $post
     */
    public function hide_title_metabox_html( $post ){
        // Get value from database
        $value = get_post_meta( $post->ID,'_hide_page_title',true );

        ?>
        <label for="hadudu-title-field"><?php esc_html_e('Hide Page Title', 'hadudu') ?></label>
        <select name="hadudu_hide_title_field" id="hadudu-title-field" class="postbox">
            <option value="">
                <?php esc_html_e('Select Option', 'hadudu') ?>
            </option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>>
                <?php esc_html_e('Show', 'hadudu') ?>
            </option>
            <option value="no" <?php selected( $value, 'no' ); ?>>
                <?php esc_html_e('Hide', 'hadudu') ?>
            </option>
        </select>
        <?php
    }
    
    /**
     * Here we will save the post metadata
     * @param $post_id
     */
    public function save_post_metadata( $post_id ){
        if( array_key_exists( 'hadudu_hide_title_field', $_POST )){
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['hadudu_hide_title_field'],
            );
        }
    }

}