<?php
/** 
* Cover patterns content
* @package Hadudu
*/
// $cover_style = sprintf()
$cover_image_url = HADUDU_BUILD_IMG_URI . '/patterns/cover.jpg';
?>

<!-- wp:cover {"url":"<?php esc_url( $cover_image_url ); ?>","id":389,"dimRatio":50,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
    <img class="wp-block-cover__image-background wp-image-389" alt="" src="<?php esc_url( $cover_image_url ); ?>" data-object-fit="cover"/>
    <div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
        <p class="has-text-align-center has-large-font-size">What to make</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">Make your own destiny</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","style":{"border":{"radius":"10px"}},"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline">
                <a class="wp-block-button__link has-text-align-center wp-element-button" href="http://localhost/wp/blog/" style="border-radius:10px"><strong>Blog</strong></a>
            </div>
        <!-- /wp:button -->
        </div>
<!-- /wp:buttons -->
    </div>
</div>
<!-- /wp:cover -->