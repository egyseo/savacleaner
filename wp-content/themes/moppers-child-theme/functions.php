<?php
// Prevent direct script access
if ( !defined( 'ABSPATH' ) )
  die ( 'No direct script access allowed' );
  
/**
 * SviRom
 * Moppers Child Theme
 *
 **/

/* Add child theme styles */
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'moppers-child-style', get_stylesheet_directory_uri().'/style.css' );
}

/* Remove GET param ver from js/css */
function remove_cssjs_ver( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'remove_cssjs_ver', 15, 1 );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 15, 1 );

/* Stop loading wp-emoji-release.min.js in */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* remove unnecessary code in header */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

add_filter('the_generator', function ()
{
	return '';
});

/* remove REST API output in header */
function remove_api () {
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

/* Automatically clear autoptimizeCache if it goes beyond 256MB */
if (class_exists('autoptimizeCache')) {
	$myMaxSize = 256000; # You may change this value to lower like 100000 for 100MB if you have limited server space
	$statArr=autoptimizeCache::stats(); 
	$cacheSize=round($statArr[1]/1024);
	
	if ($cacheSize>$myMaxSize){
		 autoptimizeCache::clearall();
		 header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
	}
}

/* Disable xmlrpc.php */
add_filter('xmlrpc_enabled', '__return_false');
