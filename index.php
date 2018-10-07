<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spillcity
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;



			// Function to get page ID by slug
			function get_id_by_slug($page_slug) {
				$page = get_page_by_path($page_slug);
				if ($page) {
					return $page->ID;
				} else {
					return null;
				}
			}

			// Fetch page content for about
			$page_slug = 'about';
			$page_id = get_id_by_slug($page_slug);
			$page = get_post($page_id);

			if ( get_post_status ( $page_id ) == 'publish' ) {
				echo apply_filters('the_content', $page->post_content);
	    }

			// Fetch page content for next event
			$page_slug = 'next-event';
			$page_id = get_id_by_slug($page_slug);
			$page = get_post($page_id);

			if ( get_post_status ( $page_id ) == 'publish' ) {
				echo apply_filters('the_content', $page->post_content);
	    }



			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
