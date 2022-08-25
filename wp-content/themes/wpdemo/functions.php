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
        $content .= apply_filters( 'bill_change_text', __( 'This is my filter', 'twentytwentychild' ) );
    
   }
   return $content;
}



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


function dx_location_box() {
    $screens = [ 'students' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dxloc_box_id',                 
            'Location',     
            'dx_lo_box_html',  
            $screen                    
        );
    }
}
add_action( 'add_meta_boxes', 'dx_location_box' );


function dx_lo_box_html( $post ) {
?>
<label for="dx_field">Lives in</label>
<input type="text" id="dx_lo" name="dx_lo" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'dx_lo', true))?>">
<?php
}

function dx_addr_custom_box() {
    $screens = [ 'students' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dxaddr_box_id',                 
            'Full Address:',     
            'dx_addr_box_html',  
            $screen                    
        );
    }
}
add_action( 'add_meta_boxes', 'dx_addr_custom_box' );


function dx_addr_box_html( $post ) {
?>
<label for="dx_field">Address</label>
<input type="text" id="dx_address" name="dx_address" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'dx_address', true))?>">
<?php
}

function dx_birth_custom_box() {
    $screens = [ 'students' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dxabi_box_id',                 
            'Birth Date:',     
            'dx_bi_box_html',  
            $screen                    
        );
    }
}
add_action( 'add_meta_boxes', 'dx_birth_custom_box' );


function dx_bi_box_html( $post ) {
?>
<label for="dx_field">Born</label>
<input type="date" id="dx_bi" name="dx_bi" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'dx_bi', true))?>">
<?php
}

function dx_cg_custom_box() {
    $screens = [ 'students' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dxcg_box_id',                 
            'Class/Grade:',     
            'dx_cg_box_html',  
            $screen                    
        );
    }
}
add_action( 'add_meta_boxes', 'dx_cg_custom_box' );


function dx_cg_box_html( $post ) {
?>
<label for="dx_field">Class And Grade</label>
<input type="text" id="dx_cg" name="dx_cg" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'dx_cg', true))?>">
<?php
}


function dx_acin_custom_box() {
    $screens = [ 'students' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'dxacin_box_id',                 
            'Active/inactive',     
            'dx_acin_box_html',  
            $screen                    
        );
    }
}
add_action( 'add_meta_boxes', 'dx_acin_custom_box' );


function dx_acin_box_html( $post ) {
?>
<label for="dx_field">Is the student active or not</label>
<input type="text" id="dx_axin" name="dx_acin" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'dx_acin', true))?>">
<?php
}

function dx_dxcus_box_save($post_id){
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
    return;
}
if( $parent_id = wp_is_post_revision($post_id)){
    $post_id = $parent_id;
}
$field_list = [
  'dx_lo',
  'dx_address',
  'dx_bi',
  'dx_acin',
  'dx_cg'
];
foreach ( $field_list as $fieldName){
    if(array_key_exists($fieldName,$_POST)){
        update_post_meta(
        $post_id,
        $fieldName,
        sanitize_text_field( $_POST[ $fieldName ] )


        );
    }
}
 
}
add_action( 'save_post', 'dx_dxcus_box_save' );