<?php /*

@package strasbourgtheme

*/

if ( ! is_active_sidebar( 'stras-sidebar' ) ) {
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

  <div class="visible-xs">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav navbar-nav navbar-collapse',
        'walker' => new Stras_Walker_Nav_Primary()
      ) );
    ?>
  </div>

	<?php dynamic_sidebar( 'stras-sidebar' ); ?>

</aside>
