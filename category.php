<?php
/**
 * The template for displaying category page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jmc87
 */

get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    endwhile;
    get_template_part( 'template-parts/pagination' );
else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', THEME_TEXTDOMAIN ); ?></p>
<?php endif;

//get_sidebar();

get_footer();
