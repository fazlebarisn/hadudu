<?php
/**
 * Template for entry content
 * @package hadudu
 */
?>
<div class="entry-content">
    <?php
    if( is_single() ){
        the_content(
            sprintf(
                wp_kses(
                    __('Read more %s <span class="meta-nav">&rarr;</span>', 'hadudu'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                    ),
                    the_title('<span class="screen-reader-text">"', '"</span>', false )
            )
        );
    }else{
        hadudu_the_excerpt();
        echo hadudu_excerpt_more();
    }
    ?>
</div>