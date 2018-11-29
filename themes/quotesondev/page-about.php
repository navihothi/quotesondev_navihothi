<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class = "site-container">
			<div class = "about-page">
					<h2>About</h2>
						<p>Quotes on Dev is a project site for the RED Academy Web Developer Professional program. It’s used to experiment with Ajax, WP API, jQuery, and other cool things.
						<img draggable="false" class="emoji" alt="🙂" src="https://s.w.org/images/core/emoji/11/svg/1f642.svg">
						</p>
						<p>This site is heavily inspired by Chris Coyier’s
							<a class = "design-link" href="<?php echo esc_url( 'http://quotesondesign.com/' ); ?>">
								Quotes on Design
							</a>
						.</p>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
