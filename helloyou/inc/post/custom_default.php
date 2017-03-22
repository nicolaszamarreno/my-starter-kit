<?php
/**
 * Create Rotator post type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 */
function create_post_type_default() {
	$labels = array(
		'name' => 'Defaults',
		'singular_name' => 'Default',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Default',
		'edit_item' => 'Edit Default',
		'new_item' => 'New Default',
		'view_item' => 'View Default',
		'search_items' => 'Search Defaults',
		'not_found' =>  'No Defaults found',
		'not_found_in_trash' => 'No Defaults found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Defaults'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		//'rewrite'            => array( 'slug' => 'your-slug-url' ),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','thumbnail','editor')
	); 
	register_post_type( 'default', $args );
}

add_action( 'init', 'create_post_type_default' );