<?php
/**
 * Template for content footer
 * @package hadudu
 */

 $the_post_id = get_the_ID();
 $artical_terms = wp_get_post_terms( $the_post_id, ['category', 'post_tag'] );

 if( empty($artical_terms) || ! is_array($artical_terms) ){
    return;
 }
?>

<div class="entry-footer mt-4">
    <?php
    foreach( $artical_terms as $key => $artical_term ){
        ?>
        <a href="<?php echo esc_url(get_term_link($artical_term)) ?>">
            <button class="btn border border-secondary mb-2 mr-2">
                <?php echo esc_html($artical_term->name) ?>
            </button>
        </a>
        <?php
    }
    ?>
</div>