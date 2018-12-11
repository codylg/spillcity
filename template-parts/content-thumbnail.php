<?php
/**
 * Template part for displaying post thumbnails
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spillcity
 */

?>

<!-- style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');" -->
<article id="post-<?php the_ID(); ?>" class="content-thumbnail">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<p class="event-buttons">
		<a class="event-button" href="<?php echo get_permalink(); ?>">
			Read review &rarr;
		</a>
	</p>

	<a href="<?php echo get_permalink(); ?>">
		<?php spillcity_post_thumbnail(); ?>
	</a>

</article><!-- #post-<?php the_ID(); ?> -->
