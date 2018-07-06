<?php 
/*
	Plugin Name: SOS Twitter Shortcode
	Plugin URI: http://expertcodedesign.com
	Description: Simple Shortcode
	Author: Sorabh
	Author URI: http://sorabh86.github.com
	Version: 1.0
*/

//  simple shortcode ex.
// add_shortcode( 'sos_twitter', function(){
// 	return '<a href="http://twitter.com/sorabh86">Follow Me on Twitter</a>';
// });

// adding $atts argument for access shortcode attributes for ex. [sos_twitter user="sorabh86"]
// add_shortcode( 'sos_twitter', function($atts){
// 	$atts['user']?$atts['user']:'sorabh86';
// 	return '<a href="http://twitter.com/'.$atts['user'].'">Follow Me on Twitter</a>';
// });

// specify content of shortcode, for ex. [sos_twitter] The content [/sos_twitter]
// add_shortcode( 'sos_twitter', function($atts, $content){
// 	$atts['user'] = isset($atts['user']) ? $atts['user'] : 'sorabh86';
// 	$content = empty(!$content) ? $content : 'Follow Me on Twitter';
// 	return '<a href="http://twitter.com/'.$atts['user'].'">'.$content.'</a>';
// });

// cleanup best practise
add_shortcode( 'sos_twitter', function($atts, $content){
	// wordpress function that gives you easy to manage default values and re-assign to $atts variable
	$atts = shortcode_atts( array(
			'user' 		=> 'sorabh86',
			'content'	=>	!empty($content)?$content:'Follow Me on Twitter',
			'show_tweets' => false,		
			'tweet_reset_time' 	=> 10, // in seconds
			'num_tweets'		=> 5,
			'twitter_api_url' 	=> 'http://localhost/wpthemedev/tweet/'
		), $atts
	);

	// php function that extract array key value to local variables
	extract($atts);

	// showing tweets
	if($show_tweets) {
		$tweets = fetch_tweets($twitter_api_url, $num_tweets, $user, $tweet_reset_time);
	}

	return "$tweets <p><a href='http://twitter.com/$user.'>$content</a></p>";
});

// In order to allow for caching, we can take advance of wordpress functions called get_post_meta, delete_post_meta, and add_post_meta, so when it does, we can attached data to each post, we can attached anything we want.
function fetch_tweets($url, $num_tweets, $user, $tweet_reset_time) {

	global $id;
	$recent_tweets = get_post_meta( $id, 'sos_recent_tweets' );
	reset_data($recent_tweets, $tweet_reset_time);
	// delete_post_meta( $id, 'sos_recent_tweets' ); die();
	// print_r($recent_tweets);die();

	// if no cache, fetch new tweets and cache.
	if(empty($recent_tweets)) {
		$tweets = curl($url.$user.'.json');

		$data = array();
		foreach ($tweets as $tweet) {
			if($num_tweets-- === 0) break;
			$data[] = $tweet->text;
		}

		$recent_tweets = array( (int)date('i', time()) );
		$recent_tweets[] = '<ul class="sos_tweets"><li>'.implode('</li><li>', $data).'</li></ul>';

		cache($recent_tweets);
	}

	return isset($recent_tweets[0][1]) ? $recent_tweets[0][1] : $recent_tweets[1];
}

// cache and save post meta, argument $recent_tweets type array, [0] = current minute, [1] = tweet html fragment
function cache($recent_tweets) {
	global $id;

	// save post meta to relation to current post id
	add_post_meta( $id, 'sos_recent_tweets', $recent_tweets, true );
}

function reset_data($recent_tweets, $tweet_reset_time) {
	global $id;

	if(isset($recent_tweets[0][0])) {
		$delay = $recent_tweets[0][0] + (int)$tweet_reset_time;
		if($delay >= 60) $delay -= 60;
		if($delay <= (int)date('i', time())) {
			delete_post_meta( $id, 'sos_recent_tweets' );
		}
	}
}

// curl functiionality to fetch url
function curl($url) {
	$c = curl_init($url);
	// Are we going to immediately echo out whatever returned or transfer that to a variable
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 3); // AFTER 3 SEC.  
	curl_setopt($c, CURLOPT_TIMEOUT, 5); // Standard timeout after 5 sec.

	return json_decode( curl_exec($c) );
}