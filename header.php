<?php

	/*
		@package strasbourgtheme
	*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo( 'name' ); wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>

		<?php
			$custom_css = esc_attr( get_option( 'stras_css' ) );
			if( !empty( $custom_css ) ):
				echo '<style>' . $custom_css . '</style>';
			endif;
		?>

	</head>

<body <?php body_class(); ?>>

	<div class="stras-sidebar sidebar-closed">

		<div class="stras-sidebar-container">

			<a class="js-toggleSidebar sidebar-close">
				<span class="stras-icon stras-close"></span>
			</a>

			<div class="sidebar-scroll">

				<?php get_sidebar(); ?>

			</div><!-- .sidebar-scroll -->

		</div><!-- .stras-sidebar-container -->

	</div><!-- .stras-sidebar -->

	<div class="sidebar-overlay js-toggleSidebar"></div>

	<div class="container-fluid">

		<div class="row">

			<header class="header-container background-image text-center" style="background-image: url(<?php header_image(); ?>);">

				<a class="js-toggleSidebar sidebar-open">
					<span class="stras-icon stras-menu"></span>
				</a>

				<div class="header-content table">
					<div class="table-cell">
						<h1 class="site-title stras-icon">
							<span class="stras-logo"></span>
							<span class="hide"><?php bloginfo( 'name' ); ?></span>
						</h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div><!-- .table-cell -->
				</div><!-- .header-content -->

				<div class="nav-container hidden-xs">

					<nav class="navbar navbar-stras">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav',
								'walker' => new Stras_Walker_Nav_Primary()
							) );
						?>
					</nav>

				</div><!-- .nav-container -->

			</header><!-- .header-container -->

		</div><!-- .row -->

	</div><!-- .container-fluid -->
