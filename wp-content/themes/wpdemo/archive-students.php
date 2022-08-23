<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();


$args = array (

'post_type' => 'students',
'post_status'=> 'publish',
'posts_per_page' => 4

);

$loop= new WP_Query($args);

if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();

    
       the_post_thumbnail();
       the_title();
       the_excerpt();
        
    
        

endwhile;
    endif;


    get_footer();
?>



<?php   wp_reset_postdata();  ?>