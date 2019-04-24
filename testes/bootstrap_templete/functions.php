<?php

function meublog_scripts() {
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'style_css', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'meublog_scripts' );