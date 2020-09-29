<?php
function magazinenp_set_option($key, $value)
{
	$option_key = MAGAZINENP_THEME_SETTINGS . '_' . $key;

	$all_defaults = magazinenp_get_default_options();

	if (!isset($all_defaults[$key])) {

		return false;
	}

	set_theme_mod($option_key, $value);

	return $value;

}

function magazinenp_update_v_1_1_1()
{
	$ordering = magazinenp_header_ordering('header_ordering');

	if (is_array($ordering) && !isset($ordering['header_media'])) {

		$ordering = array_merge(array('header_media' =>
			array(
				'title' => esc_html__('Header Media', 'magazinenp'),
				'disable' => 0

			)), $ordering);
	}
	$ordering = is_string($ordering) ? $ordering : json_encode($ordering);
	
	magazinenp_set_option('header_ordering', $ordering);
}
