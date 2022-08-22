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

<main id="site-content">

    <?php

    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();

           
            the_title();
            the_post_thumbnail();
            the_content();
            do_action( 'bill_action_something' );
            the_author();
          
        }
    }

    ?>

</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

<?php   wp_reset_postdata();  ?>