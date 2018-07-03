<?php // Register Settings

//exit if file is called directly
if( !(defined('ABSPATH')) ) {
	exit;
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
