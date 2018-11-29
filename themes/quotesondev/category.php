<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post();
				$quote_source = get_post_meta($post->ID, '_qod_quote_source', true);
				
				$quote_source_url = get_post_meta($post->ID, '_qod_quote_source_url', true);
				
				?>
			<article>
				<div class = "quotes-content">
					<?php the_content(); ?>
				</div>

				<div class = "quotes-meta">
					<h2 class = "quote-author">
						- <?php the_title();?>
					</h2>
					<span class = "quote-source">
					<?php if($quote_source) {
         					echo (($quote_source_url) ? ", <a href='" . $quote_source_url . "'>" . $quote_source . "</a>" : ", " . $quote_source); }?>
					</span>
				</div>
			</article>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>