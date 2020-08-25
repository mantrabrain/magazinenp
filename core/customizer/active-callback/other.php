<?php
if (!function_exists('magazinenp_related_posts_is_from_automatic')) {
	function magazinenp_related_posts_is_from_automatic($control)
	{
		$related_posts_type = magazinenp_get_option('related_posts_type');
		if ($related_posts_type == 'automatic') {
			return true;
		}
		return false;


	}
}

if (!function_exists('magazinenp_related_posts_is_from_category')) {
	function magazinenp_related_posts_is_from_category($control)
	{
		$related_posts_type = magazinenp_get_option('related_posts_type');
		if ($related_posts_type == 'category') {
			return true;
		}
		return false;


	}
}


if (!function_exists('magazinenp_you_missed_from_category')) {
	function magazinenp_you_missed_from_category($control)
	{
		$post_form = magazinenp_get_option('you_missed_post_from');
		if ($post_form == 'category') {
			return true;
		}
		return false;


	}
}

if (!function_exists('magazinenp_single_post_is_post_meta_enable')) {
	function magazinenp_single_post_is_post_meta_enable()
	{
		$content_order = magazinenp_post_content_ordering('single_post_content_order');

		$post_meta = isset($content_order['post_meta']) ? $content_order['post_meta'] : array();

		$status = isset($post_meta['disable']) && $post_meta['disable'] ? false : true;

		return $status;


	}
}
