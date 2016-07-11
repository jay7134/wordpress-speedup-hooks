<?php
// limit number of months in Archives
function my_limit_archives( $args ) {
    $args['limit'] = 12;
    return $args;
}
add_filter( 'widget_archives_args', 'my_limit_archives' );

// limit number of months in Archives widget dropdown 
add_filter( 'widget_archives_dropdown_args', 'my_limit_archives' );