<?php
// To hide a post type menu item from non-admin users:
function wpse28782_remove_menu_items() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=your_post_type' );
    endif;
}
add_action( 'admin_menu', 'wpse28782_remove_menu_items' );

//other menu pages you can remove:
remove_menu_page('edit.php'); // Posts
remove_menu_page('upload.php'); // Media
remove_menu_page('link-manager.php'); // Links
remove_menu_page('edit-comments.php'); // Comments
remove_menu_page('edit.php?post_type=page'); // Pages
remove_menu_page('plugins.php'); // Plugins
remove_menu_page('themes.php'); // Appearance
remove_menu_page('users.php'); // Users
remove_menu_page('tools.php'); // Tools
remove_menu_page('options-general.php'); // Settings