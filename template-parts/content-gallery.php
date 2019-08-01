<?php

global $detect;

/*

@package strasbourgtheme
********************
-- Gallery Post Format
********************
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'stras-format-gallery' ); ?>>
	<header class="entry-header text-center">

		<?php if( stras_get_attachment() && !$detect->isMobile() && !$detect->isTablet() ): ?>

			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide stras-carousel-thumb" data-ride="carousel">

				<div class="carousel-inner" role="listbox">

					<?php

						$attachments = stras_get_bs_slides( stras_get_attachment(7) );
						foreach( $attachments as $attachment ):
					?>

						<div class="item<?php echo $attachment['class']; ?> background-image standard-featured" style="background-image: url( <?php echo $attachment['url']; ?> );">

							<div class="hide next-image-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>
							<div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>

							<div class="entry-excerpt image-caption">
								<p><?php echo $attachment['caption']; ?></p>
							</div>

						</div>

					<?php endforeach; ?>

				</div><!-- .carousel-inner -->

				<a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<div class="table">
						<div class="table-cell">

							<div class="preview-container">
								<span class="thumbnail-container background-image"></span>
								<span class="stras-icon stras-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</div><!-- .preview-container -->

						</div><!-- .table-cell -->
					</div><!-- .table -->
				</a>
				<a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<div class="table">
						<div class="table-cell">

							<div class="preview-container">
								<span class="thumbnail-container background-image"></span>
								<span class="stras-icon stras-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</div><!-- .preview-container -->

						</div><!-- .table-cell -->
					</div><!-- .table -->
				</a>

			</div><!-- .carousel -->

		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo stras_posted_meta(); ?>
		</div>

	</header>

	<div class="entry-content">

		<?php if( stras_get_attachment() && ( $detect->isMobile() || $detect->isTablet() ) ): ?>

			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<div class="standard-featured background-image" style="background-image: url(<?php echo stras_get_attachment(); ?>);"></div>
			</a>

		<?php endif; ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-stras"><?php _e( 'Read More' ); ?></a>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo stras_posted_footer(); ?>
	</footer>

</article>
