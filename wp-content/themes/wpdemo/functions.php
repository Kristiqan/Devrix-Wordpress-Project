<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}
?>

<?php

//function display_content() {

    // ala bla

    //$content = apply_filters( 'the_content' );

    // ala bala + This is my filter

//}

add_filter('the_content', 'my_filter');
function my_filter($content){
  
    if(is_singular()){
        $content .= apply_filters( 'bill_change_text', __( 'This is my filter', 'twentytwentychild' ) );
    
   }
   return $content;
}

// // ala bala + This is my filter + my second filter

function my_new_filter($content){

    $content = __( 'This is my extendable filter', 'twentytwentychild' );
    
    return $content;

}
add_filter('bill_change_text', 'my_new_filter');

function div_one($content){
  
    if(is_singular()){
          printf(
             wp_kses(
           __( '<div>One</div>' ),
            [
                '<div>' => []
            ]
            ),
        );
        
   }
}
add_filter('the_content', 'div_one', 3);





function div_two($content){
  
    if(is_singular()){
        printf(
            wp_kses(
          __( '<div>Two</div>' ),
           [
               '<div>' => []
           ]
           ),
       );
   }
}
add_filter('the_content', 'div_two', 2);


function div_three($content){
  
    if(is_singular()){
        printf(
            wp_kses(
          __( '<div>Three</div>' ),
           [
               '<div>' => []
           ]
           ),
       );
   }
}
add_filter('the_content', 'div_three', 1);


function members_only($items, $args ){
     
       if(is_user_logged_in()){
        $items .=  '<li><a href="' . admin_url( 'profile.php' ) . '">Profile settings</a></li>';
    }
    return $items;
        
     
}
add_filter('wp_nav_menu_items', 'members_only', 10, 2);


add_action( 'profile_update', 'send_email_to_admin', 10, 3 );
function send_email_to_admin( $user_id, $old_data, $new_data ) {

    
        $to = 'kstefanov@devrix.com';
        $headers = array( 'Content-Type: text/html; charset=UTF-8' );
        $subject = 'A User Updated Their Profile Settings';
        $body = 'This is not a RickRoll I Promise: https://www.youtube.com/watch?v=xm3YgoEiEDc';
        
        wp_mail( $to, $subject, $body, $headers );
    
}







?>