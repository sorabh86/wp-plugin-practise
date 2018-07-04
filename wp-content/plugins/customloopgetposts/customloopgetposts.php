<?php
/*
Plugin Name: Custom Loops: get_posts() | WP_Query
Description: Demonstrates how to customize the WP loop using get_posts()
Author: Sorabh
Version: 1.0
*/

// custom loop shortcode: [get_posts_example]
function custom_loop_shortcode_get_posts($atts) {

	// get global post variable
	global $post;

	// define shortcode variables
	extract(shortcode_atts( array(
		'posts_per_page' => 5,
		'orderby' => 'date'
	), $atts ));

	// define get_post parameters
	$args = array('posts_per_page'=>$posts_per_page, 'orderby'=>$orderby);

	// get the posts
	$posts = get_posts($args);

	// begin output variable
	$output = '<h3>Custom Loop Example: get_posts()</h3>';
	$output .= '<ul>';

	// loop thru posts
	foreach ($posts as $post) {
		// prepare post data
		setup_postdata( $post );

		// continue output variable
		$output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
	}

	// reset post data
	wp_reset_postdata();

	// complete output variable
	$output .= '</ul>';

	// return output
	return $output;
}
// register shortcode function
add_shortcode( 'get_posts_example', 'custom_loop_shortcode_get_posts' );


// Modify Query using action hook
function custom_loop_pre_get_posts($query) {
	if(!is_admin() && $query->is_main_query()) {
		// $query->set('posts_per_page', 2);
		// $query->set('order', 'ASC');
		$query->set('cat', '-2');
	}
}
add_action( 'pre_get_posts', 'custom_loop_pre_get_posts' );

// custom loop shortcode: [wp_query_example]
function custom_loop_shortcode_wp_query($atts) {

	// define shortcode variables
	extract(shortcode_atts( array(
		'posts_per_page' => 5,
		'orderby' => 'date'
	), $atts ));

	// define query parameters
	$args = array( 'posts_per_page' => $posts_per_page, 'orderby' => $orderby );

	$posts = new WP_Query( $args );

	// begin output variable
	$output = '<h3>'. esc_html__('Custom Loop Example: WP_Query', 'my-plugin-prac').'</h3>';

	// begin the loop
	if( $posts->have_posts() ) {
		while($posts->have_posts()) {
			$posts->the_post();

			$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
			$output .= get_the_content();
		}

		// add pagination here

		// add comments here

		// reset post data
		wp_reset_postdata();
	} else {

		// if no posts are found
		$output .= esc_html__( 'Sorry, no posts matched your criteria', 'my-plugin-prac' );
	}

	// return output
	return $output;
}
// register shortcode function
add_shortcode( 'wp_query_example', 'custom_loop_shortcode_wp_query' );