<?php 
/**
* Page Options
**/
if( function_exists('acf_add_options_page') ) {
	// Main Tab
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));

  // First Page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options Générales',
		'menu_title'    => 'Options Générales',
		'parent_slug'   => 'options-generales',
	));
  // Second Page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options sidebar',
		'menu_title'    => 'Sidebar',
		'parent_slug'   => 'options-generales',
	));
}
?>