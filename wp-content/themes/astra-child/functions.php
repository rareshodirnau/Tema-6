<?php

// Add custom style in child theme
function wpr_add_style()
{
    wp_enqueue_style(
        'wpr-academy-style',
        get_stylesheet_directory_uri() . '/style.css',
    );
}
add_action('wp_enqueue_scripts', 'wpr_add_style');

// Create CPT Engineers
function engineers()
{
    $taxargs = array (
        'labels' =>  array (
        'name'              => __( 'Level', '' ),
        'singular_name'     => __( 'Level', '' ),
        'search_items'      => __( 'Search Level', '' ),
        'all_items'         => __( 'All Levels', '' ),
        'parent_item'       => __( 'Parent Level', '' ),
        'parent_item_colon' => __( 'Parent Level:', '' ),
        'edit_item'         => __( 'Edit Level', '' ),
        'update_item'       => __( 'Update Level', '' ),
        'add_new_item'      => __( 'Add New Level', '' ),
        'new_item_name'     => __( 'New Level', '' ),
        ), 
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true, 
        'query_var'         => true, 
        'rewrite'           => array( 
            'slug' => 'level', 
        ),
        'public' => true,
    );
    register_taxonomy( 'level', array('level'), $taxargs);
    
    $args = [
        'label'               => __( 'Engineers', '' ),
        'labels' => [
            'name' => __('Engineers'),
            'singular_name' => __('Engineer'),
            'add_new_item' => __('Add engineer'),
            'add_new' => __('Add engineer'),
            'edit_item' => __('Edit engineer'),
        ],
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
        'menu_position'       => 4,
        'taxonomies'     => array( 'level' ), 

    ];
    register_post_type('engineers', $args);
}
add_action('init', 'engineers');

// Create CPT Software
function software()
{
    $taxargs = array (
        'labels' =>  array (
        'name'              => __( 'Country', '' ),
        'singular_name'     => __( 'Country', '' ),
        'search_items'      => __( 'Search Country', '' ),
        'all_items'         => __( 'All Countries', '' ),
        'parent_item'       => __( 'Parent Country', '' ),
        'parent_item_colon' => __( 'Parent Country:', '' ),
        'edit_item'         => __( 'Edit Country', '' ),
        'update_item'       => __( 'Update Country', '' ),
        'add_new_item'      => __( 'Add New Country', '' ),
        'new_item_name'     => __( 'New Country', '' ),
        ), 
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true, 
        'query_var'         => true, 
        'rewrite'           => array( 
            'slug' => 'country', 
        ),
    );
    register_taxonomy( 'country', array('country'), $taxargs);

    $args = [
        'label'               => __( 'Software', '' ),
        'labels' => [
            'name' => __('Software'),
            'singular_name' => __('Software'),
            'add_new_item' => __('Add software'),
            'add_new' => __('Add software'),
            'edit_item' => __('Edit software'),
        ],
        'hierarchical'   => true,
        'public'         => true,
        'has_archive'    => false,
        'menu_icon'      => 'dashicons-analytics',
        'supports'       => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'show_in_rest'   => true,
        'menu_position'  => 5,
        'taxonomies'     => array( 'country' ), 
    ];
    register_post_type('software', $args);
}
add_action('init', 'software');



