<?php

function cvupdates_scripts() {
    // wp_enqueue_style( 'style', get_stylesheet_uri() );
    // wp_enqueue_script( 'app' , get_theme_file_uri( 'assets/js/' ));
    wp_enqueue_style( 'cvupdates-stylesheet', get_template_directory_uri() . '/assets/css/app.css' );
}

add_action( 'wp_enqueue_scripts', 'cvupdates_scripts' );
?>