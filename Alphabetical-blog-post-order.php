<?php
function wpblog_orderby( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
 // do conditional checks here and return on false.?

    if ( is_category('uncategorized') ) {
	remove_action( 'pre_get_posts', __FUNCTION__ );
	add_filter( 'posts_orderby', function() { return ' post_title ASC'; } );
	}
}
add_action( 'pre_get_posts', 'wpblog_orderby' );

}