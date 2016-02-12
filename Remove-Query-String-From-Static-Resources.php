<?php
// Remove Query String From Static Resources
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10 );
