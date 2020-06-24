<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MagazineNP
 */
get_header();

do_action('magazinenp_before_main_layout');

do_action('magazinenp_main_layout');

do_action('magazinenp_after_main_layout');

get_footer();
