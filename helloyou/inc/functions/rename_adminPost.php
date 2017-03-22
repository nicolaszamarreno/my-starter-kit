<?php
function edit_admin_menus() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'Toutes les news';
	$submenu['edit.php'][10][0] = 'Ajouter une news';
}

add_action( 'admin_menu', 'edit_admin_menus' );
?>