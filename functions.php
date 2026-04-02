<?php
function conor_theme_setup() {
    // This tells WordPress to support navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'conor-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'conor_theme_setup' );