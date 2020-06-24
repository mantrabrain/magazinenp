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
 * @package MagazineNP
 */

get_header();

do_action('magazinenp_before_main_layout');

do_action('magazinenp_main_layout');

do_action('magazinenp_after_main_layout');

get_footer();