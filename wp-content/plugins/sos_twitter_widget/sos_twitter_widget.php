<?php

error_reporting(EP_ALL);

/*
	Plugin Name: Sos Twitter Widget
	Plugin URI: http://expertcodedesign.com
	Description: This is simple widget for Twitter feeds
	Version: 1.0.0
	Author: Sorabh
	Author URI: http://sorabh86.github.com
*/

class SOS_Twitter_Widget extends WP_Widget {

	function __construct() {
		$arg = array(
			'name' 	=> 'SOS Twitter Widget',
			'description' => 'Widget for Twitter feeds build by sorabh'
		);
		parent::__construct('SOS_Twitter_Widget', '', $arg);
	}

	public function form($instance) {
		extract($instance);
		?>
		<p>
			<label for="<?= $this->get_field_id('title') ?>">Title:</label>
			<input class="widefat" id="<?= $this->get_field_id('title') ?>" name="<?= $this->get_field_name('title') ?>" type="text" value="<?php if(isset($title)) echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?= $this->get_field_id('username') ?>">Twitter Username:</label>
			<input class="widefat" id="<?= $this->get_field_id('username') ?>" name="<?= $this->get_field_name('username') ?>" type="text" value="<?php if(isset($username)) echo esc_attr( $username ); ?>">
		</p>
		<p>
			<label for="<?= $this->get_field_id('tweet_count') ?>">Number of Tweets to Retrive:</label>
			<input class="widefat" id="<?= $this->get_field_id('tweet_count') ?>" name="<?= $this->get_field_name('tweet_count') ?>" type="number" style="width:40px" min="1" max="40" value="<?php echo !empty($tweet_count) ? esc_attr( $tweet_count) : 5; ?>">
		</p>
		
		<?php
	}

	public function widget() {

	}
}

add_action( 'widgets_init', 'sos_twitter_widget_register' );
function sos_twitter_widget_register() {
	register_widget( 'SOS_Twitter_Widget' );
}
