<?php 
// Allow to push custom post in the category page or archive page (See condition is_category() || is_archive())
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
	if( is_category() || is_archive() ) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item', 'post' //Add custum post type name); 
			// don't forget nav_menu_item to allow menus to work!
		$query->set('post_type',$post_type);
		return $query;
	}
}
?>