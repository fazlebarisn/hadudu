<?php
/*
* Front page template file
* @packege fbs
*/
get_header();
?>
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
                <?php
                if( have_posts() ) :
                    // Start the loop
                    while( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile;
                    else : 
                        get_template_part( 'template-parts/content-none' );
                endif;
                ?>
        </div>
        </div>
    </main>
</div>

<?php 

get_footer();