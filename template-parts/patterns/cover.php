<?php
/** 
* Cover patterns content
* @package Hadudu
*/
// $cover_style = sprintf()
$cover_image_url = HADUDU_BUILD_IMG_URI . '/patterns/cover.jpg';
?>

<div class="wp-block-cover alignfull">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
    <img class="wp-block-cover__image-background wp-image-1691" alt="" src="<?php echo esc_url($cover_image_url); ?>" data-object-fit="cover"/>
    <div class="wp-block-cover__inner-container">
		<p class="has-text-align-center has-large-font-size">Make Your Own Way</p>
		<p class="has-text-align-center">How to know yourself!</p>
	    <div class="wp-block-buttons">
			<div class="wp-block-button is-style-outline">
                <a class="wp-block-button__link wp-element-button">Blog</a>
            </div>
        </div>
    </div>
</div>