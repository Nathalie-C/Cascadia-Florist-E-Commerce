<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays front page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cascadia_Floral
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			?>
			<section class="recent-news">
				<h2><?php esc_html_e('Cascadia Floral');?></h2>
			
			<?php
			$args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => -1
		);
		
		$query = new WP_Query( $args );
		
		if ( $query -> have_posts() ):
			?>
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php
						while ( $query -> have_posts() ) :
								$query -> the_post();
								?>
								<div class="swiper-slide">
									<?php the_content();?>
								</div>
								<?php
							 endwhile;
						wp_reset_postdata();
					 ?>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<?php
			endif;
		?>

    <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
