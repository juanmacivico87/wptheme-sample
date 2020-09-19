<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wptheme-sample
 */

get_header(); ?>

<h1><?php the_title() ?></h1>
<?php the_content();

comments_template();
get_sidebar();

get_footer();
