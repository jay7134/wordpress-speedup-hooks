<?php
/*--Disable Visual Editor for Slider--*/
function mz_post_type_editor_settings( $settings ) {
    global $post_type;
    if ( $post_type == 'custom_post_type' ) {
        $settings[ 'tinymce' ] = false;
    }
    return $settings;
}
add_filter( 'wp_editor_settings', 'mz_post_type_editor_settings' );