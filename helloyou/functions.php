<?php
//////////////////////////////////////////////////////////////
////------------------ GLOBAL FUNCTIONS ------------------////
//////////////////////////////////////////////////////////////

// Protect Mailto
require_once('functions/mailto.php');

// Remove Size on default image SRC
require_once('functions/remove-size-img.php');

// Add SVG files
require_once('functions/format-svg.php');

////////////////////////////////////////////////////////////////
////------------------ WORDPRESS NAV MENU ------------------////
////////////////////////////////////////////////////////////////
register_nav_menus( array(
	'primary'   => ( 'Menu principal' ),
));


/////////////////////////////////////////////////////////////////////////////////
////------------------ RESET TAG BR AND P WORDPRESS EDITOR ------------------////
/////////////////////////////////////////////////////////////////////////////////
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


////////////////////////////////////////////////////////////
////------------------ ADD LINE BREAK ------------------////
////////////////////////////////////////////////////////////
add_filter( 'the_content', 'nl2br' );
add_filter( 'the_excerpt', 'nl2br' );
$br = false;
add_filter( 'the_content', function( $content ) use ( $br ) { return wpautop( $content, $br ); }, 10 );


//////////////////////////////////////////////////////////////////////////
////------------------ DEFINE SIZE OF PREVIEW POSTS ------------------////
//////////////////////////////////////////////////////////////////////////
function resume_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 200);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
}


//////////////////////////////////////////////////////////////////
////------------------ ADD EXCERPT TO PAGES ------------------////
//////////////////////////////////////////////////////////////////
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}


////////////////////////////////////////////////////////////////
////------------------ CUSTOM ADMIN LOGIN ------------------////
////////////////////////////////////////////////////////////////
function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/login.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
	return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'my_login_logo_url' );
	function my_login_logo_url_title() {
	return get_bloginfo( 'description' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

?>
