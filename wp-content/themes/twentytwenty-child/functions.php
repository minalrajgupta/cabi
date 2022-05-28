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
  //enqueue child theme.
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
  //enqueue bootstrap css.
  wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' );


}
add_action( 'wp_enqueue_scripts', 'twentytwenty_child_enqueue_styles' );

/**
 * Creating Custom Post type : News
 */
function twentytwenty_child_custom_post_news() {
    $labels = array(
        'name'               => _x( 'News', 'twentytwenty' ),
        'singular_name'      => _x( 'News', 'twentytwenty' ),
        'add_new'            => _x( 'Add News', 'twentytwenty' ),
        'add_new_item'       => __( 'Add New News', 'twentytwenty'),
        'edit_item'          => __( 'Edit News', 'twentytwenty' ),
        'new_item'           => __( 'New News', 'twentytwenty' ),
        'all_items'          => __( 'All News', 'twentytwenty' ),
        'view_item'          => __( 'View News', 'twentytwenty' ),
        'search_items'       => __( 'Search News', 'twentytwenty' ),
        'not_found'          => __( 'No News found', 'twentytwenty' ),
        'not_found_in_trash' => __( 'No News found in the Trash', 'twentytwenty' ),
        'parent_item_colon'  => __( 'Parent News', 'twentytwenty' ),
        'menu_name'          => 'News'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our news and news specific data',
        'public'        => true,
        'menu_position' => 4,
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'   => true,
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 'twentytwenty_child_custom_post_news' );
