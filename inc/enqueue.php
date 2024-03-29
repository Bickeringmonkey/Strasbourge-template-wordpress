<?php

/*

@package strasbourgtheme
********************************
		ADMIN ENQUEUE FUNCTIONS
********************************
*/

function stras_load_admin_scripts( $hook ){
	//echo $hook;

	//register css admin section
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	wp_register_style( 'stras_admin', get_template_directory_uri() . '/css/stras.admin.css', array(), '1.0.0', 'all' );

	//register js admin section
	wp_register_script( 'stras-admin-script', get_template_directory_uri() . '/js/stras.admin.js', array('jquery'), '1.0.0', true );

	$pages_array = array(
		'toplevel_page_meadows_stras',
		'stras_page_meadows_stras_theme',
		'stras_page_meadows_stras_theme_contact',
		'stras_page_meadows_stras_css'
	);

	//PHP 7

	if( in_array( $hook, $pages_array ) ){

		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'stras_admin' );

	}

	if( 'toplevel_page_meadows_stras' == $hook ){

		wp_enqueue_media();

		wp_enqueue_script( 'stras-admin-script' );

	}

	if ( 'stras_page_meadows_stras_css' == $hook ){

		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/stras.ace.css', array(), '1.0.0', 'all' );

		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'stras-custom-css-script', get_template_directory_uri() . '/js/stras.custom_css.js', array('jquery'), '1.0.0', true );

	}

}
add_action( 'admin_enqueue_scripts', 'stras_load_admin_scripts' );

/*
*************************************
		FRONT-END ENQUEUE FUNCTIONS
*************************************
*/

function stras_load_scripts(){

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'stras', get_template_directory_uri() . '/css/stras.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'stras', get_template_directory_uri() . '/js/stras.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'stras_load_scripts' );
