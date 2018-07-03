<?php 

/*
Plugin Name: My Plugin Prac
Description: Example practise plugin for "Wordpress Plugin Practise".
Plugin URI: http://sorabh86.github.com
Author: Sorabh
Version: 1.0
Text Domain: my-plugin-prac
Domain Path: /languages
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/

//exit if file is called directly
if( !(defined('ABSPATH')) ) {
	exit;
}


// if admin area 
if( is_admin() ) {
	// include dependencies
	require_once plugin_dir_path( __FILE__ ).'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ).'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ).'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ).'admin/settings-callback.php';
}



// add top-level administrative menu
// function myplugin_add_toplevel_menu() {
// 	/*
// 		add_menu_page(
// 			string $page_title,
// 			string $menu_title,
// 			string $capability,
// 			callable $function='',
// 			string $icon_url='',
// 			int $position = null
// 		)
// 	*/

// 	add_menu_page( 
// 		'My Plugin Practise Settings', 
// 		'MyPlugin', 
// 		'manage_options', 
// 		'myplugin', 
// 		'myplugin_display_setting_page', 
// 		'dashicons-admin-generic', 
// 		null 
// 	);
// }
// add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );

