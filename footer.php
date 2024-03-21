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

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="site-logo">
			<?php
			wp_nav_menu(array('menu' => 'Footer Menu', 'theme_location' => 'footer'));
			?>
			<!-- <h4>Cascadia Floral Co.</h4> -->
		</div>
		<nav class="footer-navigation">
			<h4>Menu</h4>
			<?php
			wp_nav_menu(array('theme_location' => 'footer'));
			?>
		</nav>
		<div class="open-hr">
			<h4>Opening Hours</h4>
			<p class="open-hr-weekdays">Monday – Friday: 9AM – 9PM</p>
			<p class="open-hr-weekend">Weekend: 10AM – 5PM</p>
		</div>
		<div class="contact-us">
			<h4>Contact Us</h4>
			<p>hello@cascadiafloral.com</p>
			<p>(604) 777-1234</p>
			<p class="address-1">555 Seymour St, </p>
			<p class="address-2">Vancouver, BC V6B 3H6</p>
		</div>
	</div>
	<div class="site-policy">
		<p>&#169; 2024 Cascadia Floral Company</p>
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
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>