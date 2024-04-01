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
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'banner');

    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="screen-reader-text"><?php the_title(); ?> </h1>
            </header>

            <?php cascadia_floral_post_thumbnail(); ?>

            <div class="entry-content">
                <?php

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
                                <p class="store-email"><?php if (get_field('contact_email')) {
                                                            the_field('contact_email');
                                                        } ?></p>
                                <p class="store-phone"><?php if (get_field('contact_phone')) {
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
                                <p class="open-hr-weekday"><?php if (get_field('weekdays_opening_hours')) {
                                                                the_field('weekdays_opening_hours');
                                                            } ?></p>
                                <p class="open-hr-weekend"><?php if (get_field('weekends_opening_hours')) {
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

            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->
    <?php

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
