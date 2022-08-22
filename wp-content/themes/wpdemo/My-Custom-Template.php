<?php
/**
* Template Name: My-Custom-Template
* 
* Template Post Type: post, page
*
* @package WordPress
* @subpackage Twenty_Twenty
* @since Twenty Fourteen 1.0
*/




$args = array (
  
'post_type' => 'post',
'post_status'=> 'publish',
'posts_per_page' => 1

);

$loop= new WP_Query($args);

if ( $loop -> have_posts() ) :
    while ( $loop -> have_posts() ) : $loop -> the_post();
      get_header();
       the_title();
       the_post_thumbnail();
        the_content();
        the_author();
        get_footer();

endwhile;
    endif;
   

?>

<?php   wp_reset_postdata();  ?>