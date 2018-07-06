<?php 

/*
	Plugin Name: SOS Filter
	Plugin URI: http://expertcodedesign.com
	Description: Just for Practise
	Author: Sorabh
	Author URI: http://sorabh86.github.com
	Version: 1.0
*/

/*
	This plugin used for understanding to Wordpress Hooks.
	Hooks are used to inject your code into wordpress, or filter wordpress methods returns values based on your logic.
*/

// add_filter or remove_filter to hook something for modify something
	/*add_filter( 'the_title', function($content){
		return 'SOS '.ucwords($content);
	});


	add_filter( 'the_content', function($content){
		return $content.' '.time();
	});*/


// add_action or remove_action to hook something for modify something
	// when wordpress run function wp_footer
	/*add_action( 'wp_footer', function(){
		echo 'hello footer';
	} );*/

	// send mail to admin for every comment post
	/*add_action( 'comment_post', function(){
		$email = get_bloginfo( 'admin_email' );

		//wp_mail function for sending emails.
		wp_mail($email, 'New Comment Posted', 'A new comment has been left on your blog.');
	});*/

/* showing relevent articles within the category */
add_filter( 'the_content', function($content){

	$id = get_the_id();
	if(!is_singular( 'post' )) {
		return $content;
	}

	// getting all terms name category, or fetching all category included in post
	$terms = get_the_terms( $id, 'category' );

	// pushing all category id to an array
	$cats = array();
	foreach ($terms as $term) {
		$cats[] = $term->term_id;
	}

	// setup configuration object for query
	$args = array(
		'posts_per_page' 	=> 3,
		'category__in'		=> $cats,
		'orderby'		=> 'rand',
		'post__not_in' 	=> array($id)
	);
	// create instance of wordpress query object
	$query = new WP_Query( $args );

	// access posts
	if( $query->have_posts() ) {
		$content .= '
			<h2> Post Related to Category </h2>
			<ul class="related-category-posts">';

		while ($query->have_posts()) {
			$query->the_post();

			$content .= '
			<li> <a href="'.get_the_permalink().'">'.get_the_title().'</a> </li>';
		}

		$content .= '</ul>';
		wp_reset_query();
	}

	return $content;	
} );