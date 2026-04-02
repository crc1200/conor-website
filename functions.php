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