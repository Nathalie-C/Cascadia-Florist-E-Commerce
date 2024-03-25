<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
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

                <?php while (have_rows('banner')) : the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $view_all = get_sub_field('view_all');
										$image = get_sub_field('image');
                ?>
                    <div class="banner-content">
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
					            <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
	<?php

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
