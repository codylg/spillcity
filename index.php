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



			<section id="spill-city-splash">
				<div class="spill-city-splash-logo">
					<a href="#spill">
						<img src="/wp-content/themes/spillcity/media/spill-city-b@2x.png" alt="Spill City" />
					</a>
				</div>
				<video autoplay loop muted plays-inline>
				  <source src="/wp-content/themes/spillcity/media/spill-city-splash.mp4" type="video/mp4" />
				</video>
			</section>
			<h1 id="spill"></h1>



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
				?>
				<section id="spill-city-about">
					<div class="about-wrapper">
						<div class="about-inner-wrapper">
							<?php
							echo apply_filters('the_content', $page->post_content);
							?>
						</div>
						<div class="spill-01"></div>
						<div class="spill-02"></div>
						<div class="spill-03"></div>
					</div>
				</section>
				<?php
	    }

			// Fetch page content for next event
			$page_slug = 'next-event';
			$page_id = get_id_by_slug($page_slug);
			$page = get_post($page_id);

			if ( get_post_status ( $page_id ) == 'publish' ) {
				?>
				<section id="spill-city-next-event">
					<h5>
						Upcoming event —
						<?php if ( get_post_meta($page_id, 'event-date', true) ) {
							echo get_post_meta($page_id, 'event-date', true);
						} ?>
					</h5>
					<h1>
						<?php
						echo apply_filters('the_content', $page->post_title);
						?>
					</h1>
					<p class="event-buttons">
						<?php if ( get_post_meta($page_id, 'event-link', true) ) { ?>
						<a class="event-button event-link" href="<?php echo get_post_meta($page_id, 'event-link', true); ?>">
							View event &rarr;
						</a>
						<?php } ?>
						<?php if ( get_post_meta($page_id, 'ticket-link', true) ) { ?>
						<a class="event-button ticket-link" href="<?php echo get_post_meta($page_id, 'ticket-link', true); ?>">
							Get tickets &rarr;
						</a>
						<?php } ?>
					</p>
					<?php
					echo apply_filters('the_content', $page->post_content);
					?>
				</section>
				<?php
	    }


			?>
			<section id="spill-city-previously">
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					 ?>
					 <h5>Previous events</h5>
					 <?php
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
