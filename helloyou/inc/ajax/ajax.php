<?php 
/**
 * Ajax function inject script and define action 
 * See file `js/ajax` in the theme
 */
function add_js_scripts() {
    wp_enqueue_script( 'script', get_template_directory_uri().'/js/ajax.js', array('jquery'), '1.0', true );

    // pass Ajax Url to script.js
    wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action('wp_enqueue_scripts', 'add_js_scripts');

add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );

function mon_action() {

    // Your instructions
    // ...

    // Return response
    echo $instruction;

    die();
}
?>