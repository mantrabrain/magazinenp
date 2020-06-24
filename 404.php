<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MagazineNP
 */
get_header();

do_action('magazinenp_before_main_layout');

do_action('magazinenp_main_layout');

do_action('magazinenp_after_main_layout');

get_footer();