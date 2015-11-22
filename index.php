<?php
// remove contact form 7 styles
add_action( 'wp_print_styles', 'jay_deregister_styles', 100 );
function jay_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}