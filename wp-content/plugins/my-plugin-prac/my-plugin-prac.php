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
}

// register plugin settings
function myplugin_register_setting() {
	/*
	register_setting(
		string $option_group,
		string $option_name,
		callback $sanitize_callback
	);
	*/
	register_setting( 
		'myplugin_options', 
		'myplugin_options', 
		'myplugin_callback_validate_options' 
	);

	/*
	add_setting_section(
		string $id,
		string $title,
		string $callback,
		string $page
	);
	*/

	add_settings_section( 
		'myplugin_section_login', 
		'Customize Login Page', 
		'myplugin_callback_section_login', 
		'myplugin' 
	);

	add_settings_section( 
		'myplugin_section_admin', 
		'Customize Admin Area', 
		'myplugin_callback_section_admin', 
		'myplugin' 
	);

	/*
	add_setting_field(
		string $id,
		string $title,
		callable $callback,
		string $page,
		string $section = 'default',
		array $args = []
	);
	*/
	add_settings_field( 
		'custom_url', 
		'Custom URL', 
		'myplugin_callback_field_text', 
		'myplugin', 
		'myplugin_section_login', 
		[ 'id'=>'custom_url', 'label'=>'Custom URL for the login logo' ] 
	);
	add_settings_field( 
		'custom_title', 
		'Custom Title', 
		'myplugin_callback_field_text', 
		'myplugin', 
		'myplugin_section_login', 
		[ 'id'=>'custom_title', 'label'=>'Custom title attribue for the logo link' ] 
	);
	add_settings_field( 
		'custom_style', 
		'Custom Style', 
		'myplugin_callback_field_radio', 
		'myplugin', 
		'myplugin_section_login', 
		[ 'id'=>'custom_style', 'label'=>'Custom CSS for the login Screen' ] 
	);
	add_settings_field( 
		'custom_message', 
		'Custom Message', 
		'myplugin_callback_field_textarea', 
		'myplugin', 
		'myplugin_section_login', 
		[ 'id'=>'custom_message', 'label'=>'Custom text and/or markup' ] 
	);
	add_settings_field( 
		'custom_footer', 
		'Custom Footer', 
		'myplugin_callback_field_text', 
		'myplugin', 
		'myplugin_section_admin', 
		[ 'id'=>'custom_footer', 'label'=>'Custom footer text' ] 
	);
	add_settings_field( 
		'custom_toolbar', 
		'Custom Toolbar', 
		'myplugin_callback_field_checkbox', 
		'myplugin', 
		'myplugin_section_admin', 
		[ 'id'=>'custom_toolbar', 'label'=>'Remove new post and comment links from the toolbar' ] 
	);
	add_settings_field( 
		'custom_scheme', 
		'Custom Scheme', 
		'myplugin_callback_field_select', 
		'myplugin', 
		'myplugin_section_admin', 
		[ 'id'=>'custom_scheme', 'label'=>'Default color scheme for new users' ] 
	);
}
add_action( 'admin_init', 'myplugin_register_setting' );

// callback: login section
function myplugin_callback_section_login() {
	echo '<p>These settings enable you to customize the WP Login screen.</p>';
}
// callback: admin section
function myplugin_callback_section_admin() {
	echo '<p>These settings enable you to customize the WP Admin screen.</p>';
}

// validate plugin settings
function myplugin_callback_validate_options($input) {

	// todo: add validation functionality..

	return $input;
}

// callback: text field
function myplugin_callback_field_text($args) {
	// todo: add callback functionality...

	echo 'This will be a text field';
}
// callback: radio field
function myplugin_callback_field_radio($args) {
	// todo: add callback functionality...

	echo 'This will be a radio field';
}
// callback: textarea field
function myplugin_callback_field_textarea($args) {
	// todo: add callback functionality...

	echo 'This will be a textarea field';
}
// callback: checkbox field
function myplugin_callback_field_checkbox($args) {
	// todo: add callback functionality...

	echo 'This will be a checkbox field';
}
// callback: select field
function myplugin_callback_field_select($args) {
	// todo: add callback functionality...

	echo 'This will be a select field';
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

