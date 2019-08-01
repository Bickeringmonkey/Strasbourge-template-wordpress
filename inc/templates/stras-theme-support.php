<h1>Stras Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="stras-general-form">
	<?php settings_fields( 'stras-theme-support' ); ?>
	<?php do_settings_sections( 'meadows_stras_theme' ); ?>
	<?php submit_button(); ?>
</form>
