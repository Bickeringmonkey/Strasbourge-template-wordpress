<h1>Stras Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="stras-general-form">
	<?php settings_fields( 'stras-contact-options' ); ?>
	<?php do_settings_sections( 'meadows_stras_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>
