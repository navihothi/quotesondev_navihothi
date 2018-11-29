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
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
				</header><!-- .page-header -->

				<div class = "author-archive">
					<h2>Quote Authors</h2>
					<ul>
						<li>
							<a href = ""></a>
						</li>
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
						$categories = get_the_tags( array(
								'orderby' => 'name',
								'order' => 'ASC',
						));
          	?>

            <?php 
              foreach($post_tags as $tag) {
                    $taglink = home_url('/') . $tag->name;
                 ?>
						<li>
							<a href = "<?php echo $taglink ?>"><?php echo $tag->name ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
