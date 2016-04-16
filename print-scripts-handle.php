<?php
function wpa54064_inspect_scripts() {
    global $wp_scripts;
    foreach( $wp_scripts->queue as $handle ) :
        echo $handle,' ';
    endforeach;
}
add_action( 'wp_print_scripts', 'wpa54064_inspect_scripts' );