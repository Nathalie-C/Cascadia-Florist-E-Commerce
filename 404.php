<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cascadia_Floral
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! Looks like you&rsquo;re lost in the garden.', 'cascadia-floral' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It seems like you&rsquo;ve wandered off the path, but don&rsquo;t worry, we&rsquo;ll help you find your way back to our blooming pages!', 'cascadia-floral' ); ?></p>

				<p><?php esc_html_e( 'Try searching for the name of the flowers you are looking for such as roses or sunflowers, service like a workshop or wedding and continue your floral journey.', 'cascadia-floral' ); ?></p>

					<?php
					get_search_form();
					?>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
