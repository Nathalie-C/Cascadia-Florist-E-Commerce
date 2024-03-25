<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cascadia_Floral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->

	<?php cascadia_floral_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		// about page
		if (get_the_ID() === 96) {
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'cascadia-floral'),
					'after'  => '</div>',
				)
			); ?>
			<div class="about-second-section">
				<?php
				if (function_exists('get_field')) { ?>
					<div>
						<section class="store-info">
							<h2 class="store-information"><?php if (get_field('store_information')) {
																							the_field('store_information');
																						} ?></h2>
							<p><?php if (get_field('store_info_description')) {
										the_field('store_info_description');
									} ?></p>
							<p><?php if (get_field('contact_email')) {
										the_field('contact_email');
									} ?></p>
							<p><?php if (get_field('contact_phone')) {
										the_field('contact_phone');
									} ?></p>
							<p class="store-address"><?php if (get_field('store_address')) {
																					the_field('store_address');
																				} ?></p>
						</section>
						<section class="store-open-hr">
							<h2 class="open-hours"><?php if (get_field('opening_hours')) {
																				the_field('opening_hours');
																			} ?></h2>
							<p><?php if (get_field('opening_hours_description')) {
										the_field('opening_hours_description');
									} ?></p>
							<p><?php if (get_field('weekdays_opening_hours')) {
										the_field('weekdays_opening_hours');
									} ?></p>
							<p><?php if (get_field('weekends_opening_hours')) {
										the_field('weekends_opening_hours');
									} ?></p>
						</section>
					<?php } else { ?>
						<p>Please contact hello@cascadiafloral.com for more store information.</p>
					<?php } ?>
					</div> <!-- end of div wrapping the store-info -->
					<div class="store-info-image">
						<?php
						$image = get_field('about_store_image');
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if ($image) {
							echo wp_get_attachment_image($image, $size);
						} ?>
					</div>
			</div> <!-- end of about-second-section -->
		<?php
		} else {
			// other pages
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'cascadia-floral'),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'cascadia-floral'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->