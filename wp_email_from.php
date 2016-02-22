<?php
// change wordpress default from name and from email 
function wp_mail_address($email){
return "username@domainname.com";
}
add_filter("wp_mail_from", "wp_mail_address");
/**Set From Name**/
function wp_mail_fromName($from_name){
return "User Name";
}
add_filter("wp_mail_from_name", "wp_mail_fromName");