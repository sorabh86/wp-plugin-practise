<?php 

function simple_theme_setup(){
	// Feature Image Support
	add_theme_support('post-thumbnails');

	// Menu
	register_nav_menus(array(
		'primary' => __('Primary Menu')
	));
}
// add new functionality
add_action('after_setup_theme', 'simple_theme_setup');

// Excerpt Length cutting content length
function set_excerpt_length() {
	return 20;
}
// update functionality
add_filter('excerpt_length', 'set_excerpt_length');

// hide admin bar on fronthand
// add_filter('show_admin_bar', '__return_false');

// Widget Locations
function init_widgets($id) {
	register_sidebar(array(
		"name" => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="side-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

add_action('widgets_init', 'init_widgets');