<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package JankHack-Hew
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function jhhew_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	add_theme_support( 'jetpack-responsive-videos' );
}

add_action( 'after_setup_theme', 'jhhew_jetpack_setup' );
