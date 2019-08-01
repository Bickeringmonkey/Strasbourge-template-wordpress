<?php

/*

@package strasbourgtheme

*******************
		ADMIN PAGE
*******************
*/

function stras_add_admin_page() {

	//Generate Stras Admin Page
	add_menu_page( 'Stras Theme Options', 'Stras', 'manage_options', 'meadows_stras', 'stras_theme_create_page', get_template_directory_uri() . '/img/stras-icon.png', 110 );

	//Generate Stras Admin Sub Pages
	add_submenu_page( 'meadows_stras', 'Stras Sidebar Options', 'Sidebar', 'manage_options', 'meadows_stras', 'stras_theme_create_page' );
	add_submenu_page( 'meadows_stras', 'Stras Theme Options', 'Theme Options', 'manage_options', 'meadows_stras_theme', 'stras_theme_support_page' );
	add_submenu_page( 'meadows_stras', 'Stras Contact Form', 'Contact Form', 'manage_options', 'meadows_stras_theme_contact', 'stras_contact_form_page' );
	add_submenu_page( 'meadows_stras', 'Stras CSS Options', 'Custom CSS', 'manage_options', 'meadows_stras_css', 'stras_theme_settings_page');

}
add_action( 'admin_menu', 'stras_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'stras_custom_settings' );

function stras_custom_settings() {
	//Sidebar Options
	register_setting( 'stras-settings-group', 'profile_picture' );
	register_setting( 'stras-settings-group', 'first_name' );
	register_setting( 'stras-settings-group', 'last_name' );
	register_setting( 'stras-settings-group', 'user_description' );
	register_setting( 'stras-settings-group', 'twitter_handler', 'stras_sanitize_twitter_handler' );
	register_setting( 'stras-settings-group', 'facebook_handler' );
	register_setting( 'stras-settings-group', 'gplus_handler' );

	add_settings_section( 'stras-sidebar-options', 'Sidebar Option', 'stras_sidebar_options', 'meadows_stras');

	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'stras_sidebar_profile', 'meadows_stras', 'stras-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'stras_sidebar_name', 'meadows_stras', 'stras-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'stras_sidebar_description', 'meadows_stras', 'stras-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'stras_sidebar_twitter', 'meadows_stras', 'stras-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'stras_sidebar_facebook', 'meadows_stras', 'stras-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'stras_sidebar_gplus', 'meadows_stras', 'stras-sidebar-options');

	//Theme Support Options
	register_setting( 'stras-theme-support', 'post_formats' );
	register_setting( 'stras-theme-support', 'custom_header' );
	register_setting( 'stras-theme-support', 'custom_background' );

	add_settings_section( 'stras-theme-options', 'Theme Options', 'stras_theme_options', 'meadows_stras_theme' );

	add_settings_field( 'post-formats', 'Post Formats', 'stras_post_formats', 'meadows_stras_theme', 'stras-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'stras_custom_header', 'meadows_stras_theme', 'stras-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'stras_custom_background', 'meadows_stras_theme', 'stras-theme-options' );

	//Contact Form Options
	register_setting( 'stras-contact-options', 'activate_contact' );

	add_settings_section( 'stras-contact-section', 'Contact Form', 'stras_contact_section', 'meadows_stras_theme_contact');

	add_settings_field( 'activate-form', 'Activate Contact Form', 'stras_activate_contact', 'meadows_stras_theme_contact', 'stras-contact-section' );

	//Custom CSS Options
	register_setting( 'stras-custom-css-options', 'stras_css', 'stras_sanitize_custom_css' );

	add_settings_section( 'stras-custom-css-section', 'Custom CSS', 'stras_custom_css_section_callback', 'meadows_stras_css' );

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'stras_custom_css_callback', 'meadows_stras_css', 'stras-custom-css-section' );

}

function stras_custom_css_section_callback() {
	echo 'Customize Stras Theme with your own CSS';
}

function stras_custom_css_callback() {
	$css = get_option( 'stras_css' );
	$css = ( empty($css) ? '/* Stras Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="stras_css" name="stras_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

function stras_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function stras_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function stras_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function stras_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function stras_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function stras_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

// Sidebar Options Functions
function stras_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function stras_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="stras-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="stras-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="stras-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}

}
function stras_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function stras_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function stras_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function stras_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function stras_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function stras_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function stras_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

//Template submenu functions
function stras_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/stras-admin.php' );
}

function stras_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/stras-theme-support.php' );
}

function stras_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/stras-contact-form.php' );
}

function stras_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/stras-custom-css.php' );
}
