<?php
/**
 * twentytwenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twentytwenty
 */

/**
 * Enqueue Scripts and Styles.
 */
function twentytwenty_child_enqueue_styles() {
  //Enqueue parent style.
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_child_enqueue_styles' );
