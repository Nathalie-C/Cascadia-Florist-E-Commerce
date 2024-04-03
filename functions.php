<?php

/**
 * Cascadia Floral functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cascadia_Floral
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cascadia_floral_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cascadia Floral, use a find and replace
	 * to change 'cascadia-floral' to the name of your theme in all the template files.
	 */

	load_theme_textdomain('cascadia-floral', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header' => esc_html__('Primary', 'cascadia-floral'),
			'login-cart' => esc_html__('Secondary', 'cascadia-floral'),
			'footer' => esc_html__('Footer', 'cascadia-floral'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);

	// theme style for block editors (editor-style.css)
	add_editor_style();
	add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'cascadia_floral_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cascadia_floral_content_width()
{
	$GLOBALS['content_width'] = apply_filters('cascadia_floral_content_width', 640);
}
add_action('after_setup_theme', 'cascadia_floral_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function cascadia_floral_scripts()
{

	wp_enqueue_style(
		'cascadia-floral-googlefonts', //handle (a unique name)
		'https://fonts.googleapis.com/css2?family=Castoro+Titling&family=Outfit:wght@100..900&display=swap" rel="stylesheet',
		array(), //dependencies
		null // Set null if loading multiple Google Fonts from their CDN
	);

	wp_enqueue_style('cascadia-floral-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('cascadia-floral-style', 'rtl', 'replace');

	wp_enqueue_script('cascadia-floral-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	if (is_front_page()) {
		wp_enqueue_style(
			'swiper-styles',
			get_template_directory_uri() . '/swiper-bundle.css',
			array(),
			'11.0.5'
		);
		wp_enqueue_script(
			'swiper-scripts',
			get_template_directory_uri() . '/js/swiper-bundle.min.js',
			array(),
			'11.0.5',
			array('strategy' => 'defer')
		);
		wp_enqueue_script(
			'swiper-settings',
			get_template_directory_uri() . '/js/swiper-settings.js',
			array('swiper-scripts'),
			_S_VERSION,
			array('strategy' => 'defer')
		);
	}

	if (is_page('weddings')) {
		wp_enqueue_script('wedding-form-script', get_template_directory_uri() . '/js/wedding-form.js', array('jquery'), _S_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'cascadia_floral_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Custom Post Types & Taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// gravity forms
function wedding_form_toggle_shortcode($atts)
{
	$a = shortcode_atts(array(
		'form_id' => '1',
	), $atts);

	ob_start();
?>
	<div>
		<button class="toggleFormButton">Inquire for Packages</button>
		<div class="formContainer hidden">
			<?php echo do_shortcode("[gravityform id='{$a['form_id']}' title='true' ajax='true']"); ?>
			<button class="closeButton close-bottom">X</button>
		</div>
	</div>
<?php
	return ob_get_clean();
}
add_shortcode('wedding_form_toggle', 'wedding_form_toggle_shortcode');


// add ACF to header and footer
function header_footer_nav_menu_items($items, $args)
{
	// get menu
	$menu = wp_get_nav_menu_object($args->menu);

	// add ACF img to footer menu
	if ($args->menu == 'Footer Menu') {

		$logo = get_field('footer_logo', $menu);
		// prepend logo
		$html_logo = '<a href="' . home_url() . '"><img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" /></a>';
		// append html
		$items = $html_logo;
	}
	// add ACF img to header menu
	if ($args->menu == 'Header Right Menu') {

		$logo = get_field('header_logo', $menu);
		// prepend logo
		$html_logo = '<a href="' . home_url() . '"><img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" /></a>';
		// append html
		$items = $html_logo;
	}

	return $items;
}
add_filter('wp_nav_menu_items', 'header_footer_nav_menu_items', 10, 2);


// change testimonial title placeholder:
function wpb_change_title_text($title)
{
	$screen = get_current_screen();
	//inside if '' change to post type key
	if ('testimonial' == $screen->post_type) {
		$title = 'Add testimonial title here';
	}

	return $title;
}

add_filter('enter_title_here', 'wpb_change_title_text');

/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom()
{
	return 'low';
}
add_filter('wpseo_metabox_prio', 'yoast_to_bottom');

/**
 * WP Dashboard Setting
 */

// Remove admin menu links for non-Administrator accounts
function fwd_remove_admin_links()
{
	if (!current_user_can('manage_options')) {
		remove_menu_page('edit.php');           // Remove Posts link
		remove_menu_page('edit-comments.php');  // Remove Comments link
	}
}
add_action('admin_menu', 'fwd_remove_admin_links');

// function to declare to add the dasboard widget
function wpdocs_add_dashboard_widgets()
{
	wp_add_dashboard_widget("dashboard_widget_welcome", "Welcome To The Florist", "dashboard_welcome_widget_function");
	wp_add_dashboard_widget("dashboard_widget_tutorial", "Web Management Tutorial", "dashboard_widget_function");
	// function to add a dashboard widget
	// 1st paramater is the id you want to set
	//2nd parameter is the text or heading
	// 3rd parameter is the dashboard widget content that you wanna call so
	// you can actually add content to it
}
add_action('wp_dashboard_setup', 'wpdocs_add_dashboard_widgets');
// modify the wp_dashboard_setup and add call the function your using

// function to modify the content
function dashboard_widget_function()
{
	// some echos to output the content
	echo "<p>Please see the document below for how to maintain the website and update the content.</p>";
	echo "<a href='" . esc_url('https://cascadiafloral.bcitwebdeveloper.ca/wp-content/uploads/2024/04/web-management-tutorial.pdf') . "'><img width='400' height='315' src='" . esc_url('https://cascadiafloral.bcitwebdeveloper.ca/wp-content/uploads/2024/03/parking-map-1.webp') . "' ></img></a>";
}

function dashboard_welcome_widget_function()
{
	// some echos to output the content
	echo "<h1>Welcome to Cascadia Florist!</h1>";
}

// function to setup the remove dashboard setup
function remove_dashboard_widgets()
{
	remove_meta_box("dashboard_primary", "dashboard", "side");
	remove_meta_box("wpseo-wincher-dashboard-overview", "dashboard", "side");
	remove_meta_box("dashboard_quick_press", "dashboard", "side");
	remove_meta_box("dashboard_activity", "dashboard", "side");
	// function to remove from the dashboard
	// 1st argument is to declare the id of the widget
	// 2nd is the place your removing it from hence dashboard
	// 3rd argument is either main or side but most widgets which are
	// accordions are side which is what they are on the dashbaord
}

add_action("wp_dashboard_setup", "remove_dashboard_widgets");
// function to modify the dashboard setup and call your function

/* 
Log In Customization
*/

function cascadia_floral_login_stylesheet()
{

	wp_enqueue_style(
		'custom-login',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		_S_VERSION,
	);
}
add_action('login_enqueue_scripts', 'cascadia_floral_login_stylesheet');

// Custom logo URL
function cascadia_floral_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'cascadia_floral_login_logo_url');

// Custom title
function cascadia_floral_login_logo_url_title()
{
	return 'Cascadia Floral | Wonderful flowers for all occasions.';
}
add_filter('login_headertext', 'cascadia_floral_login_logo_url_title');
