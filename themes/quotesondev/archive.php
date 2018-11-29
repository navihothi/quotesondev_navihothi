<?php
/**
 * The template for displaying archive pages.
 * Template Name: Archive Template
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class = "site-container"> 
			

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
				</header><!-- .page-header -->

				<div class = "author-archive">
					<h2>Quote Authors</h2>
					<ul>
					<?php 
						$args = array(
							'posts_per_page'   => -1,
							'post_type'        => 'post',
						);
						$the_query = new WP_Query( $args );
          ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href = "<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				
				<div class = "category-archive">
					<h2>Categories</h2>
					<ul>
					<?php 
						$categories = get_categories( array(
								'orderby' => 'name',
								'order' => 'ASC',
						));
          	?>

            <?php 
              foreach($categories as $category) {
                    $categorylink = home_url('/category/') . $category->slug ;
                 ?>
						<li>
							<a href = "<?php echo $categorylink ?>"><?php echo $category->name ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>

				<div class = "tags-archive">
					<h2>Tags</h2>
					<ul>
					<?php 
						$tags = get_tags( array(
								'orderby' => 'name',
								'order' => 'ASC',
						));
          	?>

            <?php 
              foreach($tags as $tag) {
                    $taglink = home_url('/tag/') . $tag->slug;
                 ?>
						<li>
							<a href = "<?php echo $taglink ?>"><?php echo $tag->name ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>


	
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
