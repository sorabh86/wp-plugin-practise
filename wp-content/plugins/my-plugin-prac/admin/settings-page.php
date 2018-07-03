<?php // Setting Page

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