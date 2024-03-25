<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cascadia_Floral
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- for screen reader -->
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e('Skip to content', 'cascadia-floral'); ?>
		</a>
		<header id="masthead" class="site-header">
			<div class="first-layer">
				<div class="site-logo">
					<?php
					wp_nav_menu(
						array(
							'menu' => 'Header Right Menu',
							'theme_location' => 'login-cart',

						)
					);
					?>
				</div>
				<nav class="main-navigation login-cart-menu">
					<!-- right(login/cart) -->
					<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
						<?php esc_html_e('Secondary Menu', 'cascadia-floral'); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'login-cart',
							'menu_id' => 'secondary-menu',
						)
					);
					?>
				</nav>
			</div>

			<nav id="site-navigation" class="main-navigation second-layer">
				<!-- left(menu) -->
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
						<path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" fill="#000000"></path>
					</svg>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header',
						'menu_id' => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->