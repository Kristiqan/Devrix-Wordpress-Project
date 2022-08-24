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
?>

<main id="site-content">

    <?php
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
     $args = array(
          
        'post_type' => 'students',
        'posts_per_page' => 4,
        'paged' => $paged,
        );

        $loop= new WP_Query($args);

      if ( $loop->have_posts() ) :

        while ( $loop->have_posts() ) : $loop->the_post();
            

            the_post_thumbnail();
            the_title();
            the_excerpt();
           
            
            
            
        endwhile;
      endif;
           
      $big = 999999999;
      echo paginate_links( array(
           'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
           'format' => '?paged=%#%',
           'current' => max( 1, get_query_var('paged') ),
           'total' => $loop->max_num_pages,
           'prev_text' => '&laquo;',
           'next_text' => '&raquo;'
      ) );
      

    ?>


</div>
</main>



<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>




<?php   wp_reset_postdata();  ?>