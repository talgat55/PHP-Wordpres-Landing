<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<div   class="container" >

			<section class="error-404 not-found" style="padding: 220px 0;">
					<h1 class="page-title"><?php _e( 'Страница не найдена!!!', 'th' ); ?></h1>
				<div class="page-content">


				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
