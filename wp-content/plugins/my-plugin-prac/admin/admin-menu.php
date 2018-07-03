<?php // Menus

//exit if file is called directly
if( !(defined('ABSPATH')) ) {
	exit;
}

// add sub-level administrative menu
function myplugin_add_sublevel_menu() {
	/*
	add_submenu_page(
		string $parent_slug,
		string $page_title,
		string $menu_title,
		string $capability,
		string $menu_slug,
		callable $function=''
	)
	*/
	add_submenu_page( 
		'options-general.php', 
		'My Plugin Practise Settings', 
		'MyPlugin',
		'manage_options', 
		'myplugin', 
		'myplugin_display_setting_page'
	);
}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );