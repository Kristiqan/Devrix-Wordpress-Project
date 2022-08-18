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
add_filter('the_content', 'my_filter');
function my_filter($content){
  
    if(is_singular()){
    _e( 'This is my filter', 'hello' );
   }
}

function div_one($content){
  
    if(is_singular()){
    echo '<div>One</div>';
   }
}
add_filter('the_content', 'div_one', 3);





function div_two($content){
  
    if(is_singular()){
    echo '<div>Two</div>';
   }
}
add_filter('the_content', 'div_two', 2);


function div_three($content){
  
    if(is_singular()){
    echo '<div>Three</div>';
   }
}
add_filter('the_content', 'div_three', 1);


function members_only($items, $args ){
     
       if(is_user_logged_in()){
        $items .=  '<li><a href="' . admin_url( 'profile.php' ) . '">Profile settings</a></li>';
    }
    return $items;
        
     
}
add_filter('wp_nav_menu_items', 'members_only', 10, 2)





?>