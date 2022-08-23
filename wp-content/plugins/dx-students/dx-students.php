<?php
/**
 * @package Dx_students
 * Plugin Name:       Dx_students
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Plugin that helps a school manage its students.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * Text Domain:       twentytwentychild
 */


if ( ! function_exists('custom_post_type') ) {

    
    function custom_post_type() {
    
        $labels = array(
            'name'                  => _x( 'Students', 'Post Type General Name', 'twentytwentychild' ),
            'singular_name'         => _x( 'Students', 'Post Type Singular Name', 'twentytwentychild' ),
            'menu_name'             => __( 'Students', 'twentytwentychild' ),
            'name_admin_bar'        => __( 'Post Type', 'twentytwentychild' ),
            'archives'              => __( 'Item Archives', 'twentytwentychild' ),
            'attributes'            => __( 'Item Attributes', 'twentytwentychild' ),
            'parent_item_colon'     => __( 'Parent Item:', 'twentytwentychild' ),
            'all_items'             => __( 'All Items', 'twentytwentychild' ),
            'add_new_item'          => __( 'Add New Item', 'twentytwentychild' ),
            'add_new'               => __( 'Add New', 'twentytwentychild' ),
            'new_item'              => __( 'New Item', 'twentytwentychild' ),
            'edit_item'             => __( 'Edit Item', 'twentytwentychild' ),
            'update_item'           => __( 'Update Item', 'twentytwentychild' ),
            'view_item'             => __( 'View page', 'twentytwentychild' ),
            'view_items'            => __( 'View page', 'twentytwentychild' ),
            'search_items'          => __( 'Search Item', 'twentytwentychild' ),
            'not_found'             => __( 'Not found', 'twentytwentychild' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'twentytwentychild' ),
            'featured_image'        => __( 'Featured Image', 'twentytwentychild' ),
            'set_featured_image'    => __( 'Set featured image', 'twentytwentychild' ),
            'remove_featured_image' => __( 'Remove featured image', 'twentytwentychild' ),
            'use_featured_image'    => __( 'Use as featured image', 'twentytwentychild' ),
            'insert_into_item'      => __( 'Insert into item', 'twentytwentychild' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'twentytwentychild' ),
            'items_list'            => __( 'Items list', 'twentytwentychild' ),
            'items_list_navigation' => __( 'Items list navigation', 'twentytwentychild' ),
            'filter_items_list'     => __( 'Filter items list', 'twentytwentychild' ),
        );
        $args = array(
            'label'                 => __( 'Students', 'twentytwentychild' ),
            'description'           => __( 'This is used for managing students', 'twentytwentychild' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies'            => array( 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'students', $args );
    
    }
    add_action( 'init', 'custom_post_type', 0 );
    
    }