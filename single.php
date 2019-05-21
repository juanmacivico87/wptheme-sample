<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jmc87
 */

get_header();

$post_type = get_post_type();
switch( $post_type ) {
	case 'post':
		get_template_part( 'template-parts/singles/single', $post_type );
		break;
	default:
		_e( 'This content type is not defined', THEME_TEXTDOMAIN );
		break;
}

//get_sidebar();

get_footer();