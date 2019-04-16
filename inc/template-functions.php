<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cw2019
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cw_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cw_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cw_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cw_pingback_header' );


function cw_replace_image_in_dev( $attachment_id, $size = 'thumbnail', $icon = false) {

	return array('http://lorempixel.com/400/200/', 400, 200);

}

if(WP_ENV == 'dev') {
	add_filter('wp_get_attachment_image_src', 'cw_replace_image_in_dev', 3, 10);	
}
