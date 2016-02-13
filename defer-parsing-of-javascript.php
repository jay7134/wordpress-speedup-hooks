<?php
//defer parsing of javascript
function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 10 );