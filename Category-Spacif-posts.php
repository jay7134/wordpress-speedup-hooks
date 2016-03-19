<?php
function my_home_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '123' );
    }
}
add_action( 'pre_get_posts', 'my_home_category' );