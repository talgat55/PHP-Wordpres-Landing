<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main-page" role="main" style="margin-top: 89px;">
			<div class="container">

			<div class="row padding-row" style="padding-bottom: 49px;">
				<h1 class="section-title"><?php the_title(); ?></h1>
			<?php
			while ( have_posts() ) : the_post();

				the_content();
			endwhile; // End of the loop.
			?>
			</div>
			</div>
		</main><!-- #main -->

	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
