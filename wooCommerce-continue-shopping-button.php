<?php
// redirect from cart to shop page 
add_action( 'woocommerce_after_cart_totals', 'continue_shopping_button' );
function continue_shopping_button() {
 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
 
 echo '<div class="">';
 echo ' <a href="'.$shop_page_url.'" class="button">Continue Shopping →</a>';
 echo '</div>';
}