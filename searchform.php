<?php
/** 
* Search form
* @package Hadudu
*/
?>

<form class="d-flex" role="search" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
    <span class="screen-reader-text"><?php echo esc_attr_x('Search For', 'label', 'hsdudu') ?></span>
    <input class="form-control me-2" 
        type="search" 
        placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'hadudu'); ?>" 
        value="<?php the_search_query(); ?>" 
        name="s" 
        aria-label="Search">

    <button class="btn btn-outline-success" type="submit"><?php echo esc_attr_x('Search', 'submit button', 'hadudu'); ?></button>
</form>