<?php

/*

@package strasbourgtheme
******************
-- Link Post Format
******************
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'stras-format-link' ); ?>>

	<header class="entry-header text-center">

		<?php
			$link = stras_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="stras-icon stras-link"></span></div></a></h1>');
		?>

	</header>

</article>
