<?php
function conor_theme_setup() {
    // This tells WordPress to support navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'conor-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'conor_theme_setup' );

function conor_enqueue_styles() {
    wp_enqueue_style( 'conor-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'conor_enqueue_styles' );

function conor_register_post_types() {
    register_post_type( 'project', array(
        'labels' => array(
            'name'          => 'Projects',
            'singular_name' => 'Project',
            'add_new_item'  => 'Add New Project',
        ),
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'     => 'dashicons-portfolio',
    ) );
}
add_action( 'init', 'conor_register_post_types' );