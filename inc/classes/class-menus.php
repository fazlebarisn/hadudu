<?php
/**
 * Register menus
 *
 * @package Fbs
 */

namespace FBS_THEME\Inc;

use FBS_THEME\Inc\Traits\Singleton;

class Menus {

	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		// actions hooks
		add_action( 'init' , [ $this, 'registerMenus' ] );
	}

	public function registerMenus(){
        // Register Menus
        register_nav_menus(
            [
              'fbs-header-menu' => esc_html__( 'Header Menu', 'fbs' ),
              'fbs-footer-menu' => esc_html__( 'Footer Menu', 'fbs' )
            ]
          );

    }
    
    // Get menu id 
    public function get_menu_id( $location ){
        // get all the locations
        $locations = get_nav_menu_locations();

        // get object id by location
        $menu_id = $locations[$location];

        return ! empty( $menu_id ) ? $menu_id : '' ;
    }

    public function get_child_menu_items( $menu_array , $parent_id ){
        
        $child_menu = [];

        if( !empty ( $menu_array ) && is_array( $menu_array )){
            foreach( $menu_array as $menu ){
                if( intval( $menu->menu_item_parent) === $parent_id ){
                    array_push( $child_menu, $menu );
                }
            }
        }

        return $child_menu;
    }

}