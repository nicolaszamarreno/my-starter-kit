<?php

// Define Navigation location Menu
register_nav_menus( array(
	'primary'   => ( 'Main Menu' ),
));

add_filter( 'the_content', 'nl2br' );
add_filter( 'the_excerpt', 'nl2br' );
$br = false;
add_filter( 'the_content', function( $content ) use ( $br ) { return wpautop( $content, $br ); }, 10 );

?>
