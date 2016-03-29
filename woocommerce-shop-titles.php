<?php
// WooCommerce – Limit Product Titles on Shop Page
add_filter( 'the_title', 'shorten_product_title', 10, 2 );

function shorten_product_title( $title, $id ) {
	if ( is_shop() && get_post_type( $id ) === 'product' && strlen( $title ) > 50 ) {
		return substr( $title, 0, 50 ) . '...'; 
	} else {
		return $title;
	}
}