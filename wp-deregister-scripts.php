<?php
//***************Remove unwanted css*******************//
function uma_leopold_remove_styles() {
    wp_deregister_style( 'open-sans' );
    wp_deregister_style( 'ls-google-fonts' );
}
add_action( 'wp_print_styles', 'uma_leopold_remove_styles', 100);
//***************Remove unwanted js*******************//
function uma_leopold_remove_scripts(){
    wp_deregister_script('google_map_api');
    wp_register_script ( 'google_map_api', '//maps.googleapis.com/maps/api/js?key=YOUT-API-KEY' );
    wp_enqueue_script ( 'google_map_api', true, true );   
}
add_action( 'wp_print_scripts', 'uma_leopold_remove_scripts',100 );