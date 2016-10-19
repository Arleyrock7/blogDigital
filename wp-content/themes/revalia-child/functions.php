<?php
/*
 * Revalia. Child Theme Function File
 * You can modify any function here. Simply copy any function from parent and paste here. It will override the parent's version.
 */

add_action( 'after_setup_theme', 'revalia_child_theme_scripts', 99 );

function revalia_child_theme_scripts() {

	add_action( 'wp_enqueue_scripts', 'revalia_enqueue_scripts_child', 99 );

}

/*
 * Enqueue Child Scripts & Styles
 */
function revalia_enqueue_scripts_child() {

	if ( ! is_admin() ) {
		wp_register_style( 'revalia-main-child', get_stylesheet_directory_uri().'/style.min.css', array(), 'all' );
		wp_enqueue_style( 'revalia-main-child' );

	}

}
