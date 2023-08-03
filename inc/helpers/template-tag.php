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

/**
 * To display post author name 
 */
function hadudu_posted_by(){
    $byline = sprintf(
        esc_html_x( ' By %s', 'post author', 'hadudu' ),
        '<span class="author vcard"><a href="'. esc_url( get_author_posts_url( get_the_author_meta('ID')) ) .'">' . esc_html( get_the_author() ) . '</a></span>'
    );
    echo '<span class="byline text-secondary">' . $byline . '</span>';
}

/**
 * To display excerpt
 */
function hadudu_the_excerpt( $trim_character_count = 0 ){

    if( ! has_excerpt() || 0 === $trim_character_count ){
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0, $trim_character_count );
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ') );

    echo $excerpt . '[...]';
}

/**
 * Read more button
 */
function hadudu_excerpt_more( $more = '' ){
    if( ! is_single() ){
        $more = sprintf(
            '<button class="mt-2 btn btn-info"><a class="hadudu-read-more text-white" href="%1$s">%2$s</a></button>',
            get_permalink( get_the_ID() ),
            __('Read More', 'hadudu'),
        );
    }
    return $more;
}