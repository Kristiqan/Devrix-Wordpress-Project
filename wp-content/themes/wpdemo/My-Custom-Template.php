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


get_header();
?>


    <?php

    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();

           
            the_title();
            the_post_thumbnail();
            the_content();
            the_author();
            
        }
    }

    ?>



<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

<?php   wp_reset_postdata();  ?>