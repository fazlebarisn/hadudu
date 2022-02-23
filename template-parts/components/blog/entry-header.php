<?php
/**
 * Template for entry header
 *
 * @package Fbs
 */

 $the_post_id = get_the_ID();
 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

?>

<header class="entry-header">
    <?php
        // Featured Image
        if( $has_post_thumbnail ){
            ?>
                <div class="entry-image mb-3">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php 
                            the_post_custom_thumbnail(
                                $the_post_id,
                                'featured-thumbnail',
                                [
                                    'sizes' => '(max-width: 356px) 356px, 237px',
                                    'class' => 'attachment-featured-thumbnail featured-image-size'
                                ]
                            );
                        ?>
                    </a>
                </div>
            <?php
        }
    ?>
</header>