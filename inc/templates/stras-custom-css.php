<h1>StrasCustom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="stras-general-form">
	<?php settings_fields( 'stras-custom-css-options' ); ?>
	<?php do_settings_sections( 'meadows_stras_css' ); ?>
	<?php submit_button(); ?>
</form>
