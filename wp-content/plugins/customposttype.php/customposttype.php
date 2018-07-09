<?php
/**
 * Plugin Name: Bike Product Post Type
 * Description: Demonstrate Custom Post Type, Custom fields, Add Meta Box 
 * Plugin URI: http://sorabh86.github.com
 * Author: Sorabh
 * Author URI: http://sorabh86.github.com
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: customposttype
 * Domain Path: /languages
 */

/*
	Copyright (C) 2018  Sorabh  ssorabh.ssharma@hotmail.com

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Snippet Wordpress Plugin Boilerplate based on:
 *
 * - https://github.com/purplefish32/sublime-text-2-wordpress/blob/master/Snippets/Plugin_Head.sublime-snippet
 * - http://wordpress.stackexchange.com/questions/25910/uninstall-activate-deactivate-a-plugin-typical-features-how-to/25979#25979
 *
 * By default the option to uninstall the plugin is disabled,
 * to use uncomment or remove if not used.
 *
 * This Template does not have the necessary code for use in multisite.
 *
 * Also delete this comment block is unnecessary once you have read.
 *
 * Version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class CustomPostType {

	private static $instance = null;

	/**
	 * Creates or returns an instance of this class.
	 * @since  1.0.0
	 * @return CustomPostType A single instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function __construct() {
		$this->add_action_hooks();
	}

	public function add_action_hooks() {
		add_action( 'init', array($this, 'add_posttype_bike') );
		add_action( 'init', array($this, 'add_taxonomy_bikes') );
	}
	public function add_posttype_bike() {
		$args = array(
			'labels' 			=> array('name'=>'Bikes'),
			'public' 			=> true,
			'public_queryable'	=> true,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'query_var'			=> true,
			'rewrite'			=> array('slug'=>'bike'),
			'capability_type'	=> 'post',
			'has_archive'		=> true,
			'hierarchical'		=> false,
			'menu_position'		=> null,
			'supports'			=> array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'category')
		);
		register_post_type( 'bike', $args );
	}
	function add_taxonomy_bikes() {
		$args = array(
			'labels'			=> array('name'=>'Bike Category'),
			'hierarchical'		=> false,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true
		);
		register_taxonomy( 'bikes', 'bike', $args );
	}

	public static function activate() {

	}

	public static function deactivate() {

	}

/*
	public static function uninstall() {
		if ( __FILE__ != WP_UNINSTALL_PLUGIN )
			return;
	}
*/
}

add_action( 'plugins_loaded', array( 'CustomPostType', 'get_instance' ) );
register_activation_hook( __FILE__, array( 'CustomPostType', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CustomPostType', 'deactivate' ) );
// register_uninstall_hook( __FILE__, array( 'CustomPostType', 'uninstall' ) );