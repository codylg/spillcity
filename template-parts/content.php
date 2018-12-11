<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spillcity
 */

?>

<div id="spill-city-event-page">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a class="event-spill-logo" href="/">
			<img src="/wp-content/themes/spillcity/media/spill-city-w@2x.png" alt="Spill City" />
		</a>

		<?php spillcity_post_thumbnail(); ?>

		<p class="event-buttons">
			<a class="event-button small-button" href="/">
				&larr; Home
			</a>
		</p>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<!-- <div class="entry-meta"> -->
					<?php
					// spillcity_posted_on();
					// spillcity_posted_by();
					?>
				<!-- </div> --><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'spillcity' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spillcity' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php // spillcity_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->

</div>
