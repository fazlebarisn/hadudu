<?php
/** 
* Front page template file
* @package Hadudu
*/
use HADUDU_THEME\Inc\Loadmore_Posts;

get_header();

$loadmore_post = Loadmore_Posts::get_instance();

?>
<div class="container">
    <h1 class="mb-4">Loadmore</h1>
    <?php $loadmore_post->post_script_load_more(); ?>
</div>
<?php
get_footer();
