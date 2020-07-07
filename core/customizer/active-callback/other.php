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
