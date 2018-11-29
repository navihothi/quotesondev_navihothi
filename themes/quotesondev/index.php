<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div class = "site-container">
<!-- STYLE ::BEFORE HERE IN SCSS-->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php 
						$args = array(
							'posts_per_page'   => 1,
							'orderby'					 => 'rand',
							'post_type'        => 'post',
						);
						$the_query = new WP_Query( $args );
          ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
			
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
					</span>
				</div>
			</article>
			<?php endwhile; ?>


			<button type = "button" class = "quotes-button">Show Me Another!</button>
		</main><!-- #main -->
	</div><!-- #primary -->

<!-- STYLE ::AFTER HERE IN SCSS -->
</div>

		<script>
			console.warn("Please work");
		</script>

<?php get_footer(); ?>