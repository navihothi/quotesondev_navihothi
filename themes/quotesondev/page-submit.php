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
      <div class = "submit-quote-section">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php endwhile; // End of the loop. ?>

       



        <?php if (is_user_logged_in()) { ?>
        <div class = "quote-form">
            <h2>Submit a Quote</h2>
            <form action="" method = "POST">
              <p>
                <label for = "author" >Author of Quote</label><br>
              </p>
                <input type = "text" name="author" id = "quote-author" style="width:50%"><br>
              <p>
                <label for ="quote">Quote</label><br>
              </p>
                <textarea rows="4" cols="50" name="quote" id="quote" style="width:100%"></textarea><br>
              <p>
                <label for ="quote-source">Where did you find this quote? (e.g. book name)</label><br>
              </p>
               <input type="text" name="quote-source" id = "quote-source" style="width:50%"><br>
              <p>
                <label for ="quote-url">Prove the URL of the quote source, if available.<label><br>
              </p>
                <input type="text" name="quote-url" id = "quote-url" style="width:50%"><br>

                <input type="submit" value="Submit Quote" class="submit-quote">
            </form>
        </div>
        <?php } else { // not logged in ?>
          <p>Sorry, you must be logged in to submit a quote!</p>
          <?php echo esc_url( home_url( '/wp-login.php' ) ); ?>
        <?php } ?> 
      </div>
  </div>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
