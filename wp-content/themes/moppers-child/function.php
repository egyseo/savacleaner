<?php  
/**
 * The SlashCreative Themes
 * Moppers Child Theme
 *
 **/
/* add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'moppers-child-style', get_template_directory_uri().'/style.css' );
} */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
/* Stop loading wp-emoji-release.min.js in */
/* remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles'); */