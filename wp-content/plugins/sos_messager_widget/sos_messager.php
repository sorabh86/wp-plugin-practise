<?php 

error_reporting(EP_ALL);

/**
 * Plugin Name: Sos Messager Widget
 * Description: This Widget is part of practicing widget, Display any message.
 * Plugin URI: http://expertcodedesign.com
 * Author: Sorabh
 * Author URI: http://sorabh86.github.com
 * Version: 1.0.0
 */

class SOS_Messager extends WP_Widget {

	//  this function runs on instanciate
	function __construct() {
		$params = array(
			'description' 	=> 'This Widget is part of practicing widget, Display any message',
			'name'			=> 'SOS Messager'
		);

		parent::__construct('SOS_Messager', '', $params);
	}

	// responsible for display form in admin area
	public function form($instance) {
		extract($instance);
		?>
			<p>
				<label for="<?= $this->get_field_id('title') ?>">Title:</label>
				<input class="widefat" id="<?= $this->get_field_id('title') ?>" type="text" name="<?= $this->get_field_name('title') ?>" value="<?php if(isset($title)) echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?= $this->get_field_id('title') ?>">Description:</label>
				<textarea class="widefat" id="<?= $this->get_field_id('title') ?>"
					name="<?= $this->get_field_name('description') ?>"
					rows="10"><?php if(isset($description)) echo esc_attr( $description ); ?></textarea>
			</p>
		<?php
	}

	// responsible for display widget on site level
	public function widget($args, $instance) {
		extract($args);
		extract($instance);

		$title = apply_filters( 'widget_title', $title );
		$description = apply_filters( 'widget_description', $description );

		echo $before_widget;
			echo $before_title . $title . $after_title;
			echo "<p>$description</p>";
		echo $after_widget;
	}
}

//  code for register your widget class
add_action( "widgets_init", 'sos_register_messager' );
function sos_register_messager () {
	register_widget( 'SOS_Messager' );
}