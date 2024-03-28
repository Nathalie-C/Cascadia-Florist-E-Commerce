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
				?>
	<section class="banner">
    <?php if (function_exists('get_field') && get_field('banner')) : ?>
        <div class="swiper banner-swiper">
            <div class="swiper-wrapper">
                <?php while (have_rows('banner')) : the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $view_all = get_sub_field('view_all');
										$image = get_sub_field('image');
                ?>
                    <div class="swiper-slide">
											<div class="content-background">
                        <?php if ($heading) : ?>
                            <h2><?php echo esc_html($heading); ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
												<?php if ($view_all && is_array($view_all) && isset($view_all['url'])) : ?>
                        <a href="<?php echo esc_url($view_all['url']); ?>">View All</a>
                        <?php endif; ?>
												</div>
												<?php if ($image) : 
														$image_id = $image['id']; 
														echo wp_get_attachment_image($image_id, 'full', false, array('alt' => esc_attr($image['alt'])));
												endif; ?>
                    </div>
                <?php endwhile; ?>
							</div>
							<div class="swiper-pagination"></div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
        </div>
      <?php endif; ?>
  </section>

      <section class="content">
			<h1 class="screen-reader-text"><?php the_title();?> </h1>
				<?php
				the_content();
				?>
			</section>
			<section class="testimonials">
				<h2><?php esc_html_e('What our customers say about us.');?></h2>
			
			<?php
			$args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => -1
		);
		
		$query = new WP_Query( $args );
		
		if ( $query -> have_posts() ):
			?>
			<div class="swiper testimonial-swiper">
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
