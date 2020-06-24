<?php

if (!function_exists('magazinenp_is_ticker_enabled')) {

	function magazinenp_is_ticker_enabled($control)
	{
		$header_ordering = magazinenp_header_ordering('header_ordering');

		$ticker = isset($header_ordering['news_ticker']) ? $header_ordering['news_ticker'] : array();

		$has_disabled = isset($ticker['disable']) ? (boolean)$ticker['disable'] : false;

		if (!$has_disabled) {
			return true;
		}
		return false;


	}
}


if (!function_exists('magazinenp_ticker_post_from_category')) {

	function magazinenp_ticker_post_from_category($control)
	{
		$post_from = magazinenp_get_option('news_ticker_post_from');

		if ('category' == $post_from) {

			return true;
		}
		return false;

	}
}

if (!function_exists('magazinenp_slider_post_from_category')) {

	function magazinenp_slider_post_from_category($control)
	{
		$post_from = magazinenp_get_option('banner_slider_post_from');

		if ('category' == $post_from) {

			return true;
		}
		return false;

	}
}


if (!function_exists('magazinenp_post_col_1_post_from_category')) {

	function magazinenp_post_col_1_post_from_category($control)
	{
		$post_from = magazinenp_get_option('post_col_1_post_from');

		if ('category' == $post_from) {

			return true;
		}
		return false;

	}
}

if (!function_exists('magazinenp_post_col_2_post_from_category')) {

	function magazinenp_post_col_2_post_from_category($control)
	{
		$post_from = magazinenp_get_option('post_col_2_post_from');

		if ('category' == $post_from) {

			return true;
		}
		return false;

	}
}


if (!function_exists('magazinenp_post_block_from_category')) {

	function magazinenp_post_block_from_category($control)
	{
		$post_from = magazinenp_get_option('post_block_post_from');

		if ('category' == $post_from) {

			return true;
		}
		return false;

	}
}



