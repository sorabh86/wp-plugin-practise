<?php
/*
Plugin Name: Database Examples
Description: Demonstration of database queries using global wpdb variable
Plugin URI: https://sorabh86.github.com
Author: Sorabh
Version: 1.0
*/

// Example:1 select a variable
function database_examples_get_user_count() {
	global $wpdb;

	$query = "SELECT COUNT(*) FROM $wpdb->users";
	$results = $wpdb->get_var($query);

	// display the results
	if(null !== $results) {
		echo '<div>Number of users: '.$results.'</div>';
	} else {
		echo '<div>No results.</div>';
	}
}

// Example:2 select a variable
function database_examples_sum_custom_fields() {
	global $wpdb;

	$meta_key = 'minutes';
	$query = "SELECT sum( meta_value ) FROM $wpdb->postmeta WHERE meta_key=%s";
	$prepare_query = $wpdb->prepare($query,$meta_key);

	// display the results
	if(null !== $results) {
		echo '<div>Total minutes: '.$results.'</div>';
	} else {
		echo '<div>No results.</div>';
	}
}

// Example:3 select a row
function database_examples_get_primary_admin(){
	global $wpdb;

	$user_id = 1;
	$query = "SELECT * FROM $wpdb->users WHERE ID=%d";
	$prepare_query = $wpdb->prepare($query,$user_id);
	$user = $wpdb->get_row($prepare_query);

	// display the results
	if(null !== $user) {
		echo '<div>Primary admin User:</div>';
		echo '<pre>';
		var_dump($user);
		echo '</pre>';

		echo '<div>User ID: '.$user->ID.'</div>';
		echo '<div>User Login: '.$user->user_login.'</div>';
		echo '<div>User Email: '.$user->user_email.'</div>';
	} else {
		echo '<div>No Result</div>';
	}
}

// Example:4 select a column
function database_examples_get_all_user_ids() {
	global $wpdb;

	$query = "SELECT ID FROM $wpdb->users";
	$results = $wpdb->get_col($query);

	// display the results
	if(null !== $results) {
		echo '<div>All user IDs:</div>';
		echo '<pre>';
		var_dump($results);
		echo '</pre>';
	} else {
		echo '<div>No results.</div>';
	}
}

// Example:5 select generic results
function database_examples_get_draft_posts() {
	global $wpdb;

	$post_author = 1;
	$query = "SELECT ID, post_title FROM $wpdb->posts WHERE post_status='draft' AND post_type='post' AND post_author=%s";

	$prepare_query = $wpdb->prepare($query,$post_author);
	$draft_posts = $wpdb->get_results($prepare_query);

	// display the results
	if(null !== $draft_posts) {
		echo '<div>All draft posts:</div>';
		echo '<pre>';
		var_dump($draft_posts);
		echo '</pre>';

		echo '<p>Draft post titles:</p>';
		foreach ($draft_posts as $draft_post) {
			echo '<div>'.$draft_post->post_title.'</div>';
		}
	} else {
		echo '<div>No results</div>';
	}
}

// Example: 6 running general queries
function database_examples_add_custom_field() {
	global $wpdb;

	$post_id = 1;
	$meta_key = 'favorite-session';
	$meta_value = 'Autumn';

	$query = "INSERT INTO $wp->postmeta(post_id,meta_key,meta_value) VALUES(%d, %s, %s)";

	$prepare_query = $wpdb->prepare($query,$post_id,$meta_key,$meta_value);
	$results = $wpdb->query($prepare_query);

	// display the results
	echo '<div>Add custom field: ';
	if(false === $results) echo 'There was an error.';
	elseif(0 === $results) echo 'No results.';
	else echo 'The custom field was added.';
	echo '</div>';
}


// add top-level administrator menu
function database_examples_add_toplevel_menu() {

	add_menu_page( 
		'Database Examples', 
		'Database Examples', 
		'manage_options', 
		'database_example', 
		'database_example_display_setting_page', 
		'dashicons-admin-generic', 
		null 
	);
}
add_action('admin_menu', 'database_examples_add_toplevel_menu');

// display the plugin setting page
function database_example_display_setting_page() {

	// check if user is allowed access
	if( !current_user_can('manage_options') ) return;

	?>
	
	<div class="wrap">
		<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
		<p><?php esc_html_e('This plugin demo shows ways to query the database', 'myplugin'); ?></p>

		<h2><?php esc_html_e('Select a variable', 'myplugin'); ?></h2>
		<?php database_examples_get_user_count(); ?>
		<?php database_examples_sum_custom_fields(); ?>
		
		<h2><?php esc_html_e('Select a row','myplugin'); ?></h2>
		<?php database_examples_get_primary_admin(); ?>

		<h2><?php esc_html_e('Select a column','myplugin'); ?></h2>
		<?php database_examples_get_all_user_ids(); ?>

		<h2><?php esc_html_e('Select generic results','myplugin') ?></h2>
		<?php database_examples_get_draft_posts(); ?>

		<h2><?php esc_html_e('Run general queries','myplugin') ?></h2>
		<?php database_examples_add_custom_fields(); ?>
		<?php database_examples_delete_custom_fields(); ?>
	</div>

	<?php
}