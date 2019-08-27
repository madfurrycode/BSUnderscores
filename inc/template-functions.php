<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package BSUnderscores
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bsunderscores_body_classes( $classes ) {
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
add_filter( 'body_class', 'bsunderscores_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bsunderscores_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bsunderscores_pingback_header' );

/**
* Add classes to navigation buttons
*/
add_filter( 'next_posts_link_attributes', 'bsunderscores_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'bsunderscores_posts_link_attributes' );
add_filter( 'next_comments_link_attributes', 'bsunderscores_comments_link_attributes' );
add_filter( 'previous_comments_link_attributes', 'bsunderscores_comments_link_attributes' );

function bsunderscores_posts_link_attributes() {
    return 'class="btn btn-outline-primary"';
}

function bsunderscores_comments_link_attributes() {
    return 'class="btn btn-outline-primary"';
}
