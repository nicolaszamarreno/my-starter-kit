<?php
/**
* Add Menu(s) location
**/
require_once('inc/functions/menu.php');


/**
* Add support theme thumbnail
**/
add_theme_support( 'post-thumbnails' );


/**
* Add support SVG import in the media
**/
require_once('inc/functions/support_svg.php');


/**
* ACF
* Pages Options
**/
//require_once('inc/acf/options_pages.php');


/**
* Posts
* Import Custom Post Type
* @param   [custom_default.php] [Rename {default} by name of your post]
* @param   [rename_adminPost.php] [If you want change name of the article in the BO]
**/
//require_once('inc/posts/custom_default.php');
//require_once('inc/functions/rename_adminPost.php');


/**
* Ajax
* Call Script AJAX and action
* @param   [ajax.php] [Configuration Script Ajax]
**/
//require_once('inc/ajax/ajax.php');


/**
* Display Custom Post Type in the pages type
* WARNING : You should put the name of the Custom Post in this file
**/
//require_once('inc/ajax/display_custom.php');
?>
