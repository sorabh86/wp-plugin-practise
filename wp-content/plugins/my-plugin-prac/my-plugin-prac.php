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

// display the plugin setting page
function myplugin_display_setting_page() {
	//check if user is allow access
	if(!current_user_can( 'manage_options' )) return;

	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php 
			// output security fields
			settings_fields( 'myplugin_options' );

			//output setting section
			do_settings_sections( 'myplugin' );

			//submit button
			submit_button();
			 ?>
		</form>
	</div>
<?php
}

// add top-level administrative menu
function myplugin_add_toplevel_menu() {
	/*
		add_menu_page(
			string $page_title,
			string $menu_title,
			string $capability,
			callable $function='',
			string $icon_url='',
			int $position = null
		)
	*/

	add_menu_page( 
		'My Plugin Practise Settings', 
		'MyPlugin', 
		'manage_options', 
		'myplugin', 
		'myplugin_display_setting_page', 
		'dashicons-admin-generic', 
		null 
	);
}
add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );

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