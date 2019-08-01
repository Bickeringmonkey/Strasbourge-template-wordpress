<?php

/*

@package strasbourgtheme

*************************
		SHORTCODE OPTIONS
*************************
*/
function stras_tooltip( $atts, $content = null ) {

	//[tooltip placement="top" title="This is the title"]This is the content[/tooltip]

	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
		),
		$atts,
		'tooltip'
	);

	$title = ( $atts['title'] == '' ? $content : $atts['title'] );

	//return HTML
	return '<span class="stras-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';

}

add_shortcode( 'tooltip', 'stras_tooltip' );


function stras_popover( $atts, $content = null ) {

	//[popover title="Popover title" placement="top" trigger="click" content="This is the Popover content"]This is the clickable content[/popover]

	//get the attributes
	$atts = shortcode_atts(
		array(
			'placement' => 'top',
			'title' => '',
			'trigger' => 'click',
			'content' => '',
		),
		$atts,
		'popover'
	);

	//return HTML
	return '<span class="stras-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';

}

add_shortcode( 'popover', 'stras_popover' );

// Contact Form shortcode
function stras_contact_form( $atts, $content = null ) {

	//[contact_form]

	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);

	//return HTML
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();

}
add_shortcode( 'contact_form', 'stras_contact_form' );
