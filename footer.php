<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cascadia_Floral
 */

// output ACF
$fields = get_fields(96, false);

if ($fields) {
?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<nav class="site-logo">
				<?php
				wp_nav_menu(array('menu' => 'Footer Menu', 'theme_location' => 'footer'));
				?>
			</nav>
			<nav class="footer-navigation">
				<h2>Menu</h2>
				<?php
				wp_nav_menu(array('theme_location' => 'footer'));
				?>
			</nav>
			<section class="open-hr">
				<h2><?php the_field('opening_hours'); ?></h2>
				<p><?php the_field('weekdays_opening_hours'); ?></p>
				<p><?php the_field('weekends_opening_hours'); ?></p>
			</section>
			<section class="contact-us">
				<h2>Contact Us</h2>
				<p><?php the_field('contact_email'); ?></p>
				<p><?php the_field('contact_phone'); ?></p>
				<p class="footer-address"><?php the_field('store_address'); ?></p>
			</section>
		</div>
		<div class="site-policy">
			<a href="<?php the_permalink(3); ?>"><?php echo esc_html(get_the_title(3)); ?></a>
			<span class="sep"> | </span>
			<a href="<?php the_permalink(497); ?>"><?php echo esc_html(get_the_title(497)); ?></a>

			<p>&#169; 2024 Emily He, Jean Lin, Kaia Sun, Nathalie Chang</p>
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'cascadia-floral')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'cascadia-floral'), 'WordPress');
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('Theme: %1$s by %2$s.', 'cascadia-floral'), 'cascadia-floral', '<a href="https://cascadiafloral.bcitwebdeveloper.ca/">FWD35</a>');
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>