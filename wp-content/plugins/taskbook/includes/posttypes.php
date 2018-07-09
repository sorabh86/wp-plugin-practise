<?php

/**
 * Register a Task post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function taskbook_cpt_init() {
	$labels = array(
		'name'               => _x( 'Tasks', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Task', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Tasks', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Task', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Task', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Task', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Task', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Task', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Task', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Tasks', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Tasks', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Tasks:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Tasks found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Tasks found in Trash.', 'your-plugin-textdomain' ),
		'featured_image'        => _x( 'Task Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'taskbook' ),
    'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
    'archives'              => _x( 'Task archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'taskbook' ),
    'insert_into_item'      => _x( 'Insert into Task', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'taskbook' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Task', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'taskbook' ),
    'filter_items_list'     => _x( 'Filter Tasks list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'taskbook' ),
    'items_list_navigation' => _x( 'Tasks list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'taskbook' ),
    'items_list'            => _x( 'Tasks list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'taskbook' ),
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tasks' ),
		'capability_type'    => 'task',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_rest'		 	 => true,
		'rest_base'			 		 => 'tasks',
		'menu_position'      => null,
		'menu_icon'			 		 => 'dashicons-exerpt-view',
		'supports'           => array( 'title', 'editor', 'author' ),
		'map_meta_cap'			 => true,  // https://developer.wordpress.org/reference/functions/map_meta_cap
	);

	register_post_type( 'task', $args );
}
add_action( 'init', 'taskbook_cpt_init' );

/**
 * Flush rewrite rules on activation
 */
function taskbook_rewrite_flush(){
	taskbook_cpt_init();
	flush_rewrite_rules();
}
