<?php
// redirect any page or post to specific url 
if(is_page( 'about-us' )){
wp_redirect( 'http://example.com/about' );
exit();
}