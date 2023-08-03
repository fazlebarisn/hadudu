<?php

/**
 * get post thumbnail
 */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ){

    $custom_thumbnail = '';

    if( null === $post_id ){
        $post_id = get_the_ID();
    }

    if( has_post_thumbnail( $post_id ) ){

        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge( $additional_attributes , $default_attributes );

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id(),
            $size,
            false,
            $additional_attributes
        );
    }

    return $custom_thumbnail;
}

/**
 * Display the thumbnail
 */
function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ){
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

/**
 *  post publish date function
 */
function hadudu_post_on(){
    $time_string = '<time class="entry-date publish updated" datetime="%1$s">%2$s</time>';

    /**
     * check if the post publish date and modify date not same
     * second <time> tag only for seo. We will hide second time section by css
     */
    if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ){
        $time_string = '<time class="entry-date publish" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    // second two parameter only for if the post publish date and modify date not same
    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date(DATE_W3C) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date(DATE_W3C) ),
        esc_attr( get_the_modified_date() )
    );

    // inject the $time_string 
    $post_on = sprintf(
        esc_html_x( 'Post On %s', 'post date', 'hadudu'),
        '<a href="'.esc_url(get_the_permalink()).'" rel="bookmark">' .$time_string.'</a>'
    );

    echo '<span class="posted-on text-secondary">'. $post_on.'</span>';
}