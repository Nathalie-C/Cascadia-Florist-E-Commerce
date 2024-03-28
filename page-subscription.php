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
            get_template_part('template-parts/content', 'banner');
			get_template_part( 'template-parts/content', 'page' );
        ?>

        <section class="instruction-section">
            
            <?php
            // Check rows exists.
            if( have_rows('how_it_works') ):

                // Loop through rows.
                while( have_rows('how_it_works') ) : the_row();?>
                
            
                    <article class="instrcution-article">
                        <h2 class="instrction-number-heading">
                            <span class="steps-number"><?php the_sub_field('instruction_number');?>
                            </span>

                            <span class="steps-title"><?php the_sub_field('instruction_heading');?>
                            </span>
                        </h2>
                            <p class="steps-text"><?php the_sub_field('instruction_text');?></p>
                    </article>
                

            <?php endwhile; 
            else :
            endif;
            ?>
        
        </section>

        <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();