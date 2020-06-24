<?php

if (!function_exists('magazinenp_sanitize_checkbox')) :

	/**
	 * Sanitize checkbox.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 * @since 1.0.0
	 *
	 */
	function magazinenp_sanitize_checkbox($checked)
	{

		return ((isset($checked) && true === $checked) ? true : false);

	}

endif;

if (!function_exists('magazinenp_sanitize_ordering')) :

	/**
	 * Sanitize magazinenp_sanitize_ordering.
	 *
	 * @param mixed $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 * @since 1.0.0
	 *
	 */
	function magazinenp_sanitize_ordering($input, $setting)
	{

		// Ensure input is clean.

		$content_order = $setting->default;

		$value_array = array();

		try {
			$value_array = is_string($input) ? json_decode($input, true) : $content_order;

		} catch (Exception $e) {

			$value_array = array();

		}
		$value_array = empty($value_array) ? $content_order
			: $value_array;

		$return_value_array = array();

		foreach ($value_array as $value_key => $value_val) {
			$value_key = sanitize_text_field($value_key);
			$return_value_array[$value_key]['disable'] = isset($value_val['disable']) ? absint($value_val['disable']) : 0;
			if (isset($value_val['title'])) {
				$return_value_array[$value_key]['title'] = isset($value_val['title']) ? sanitize_text_field($value_val['title']) : '';
			}
		}
		// If the input is a valid key, return it; otherwise, return the default.
		return json_encode($return_value_array);

	}

endif;

if (!function_exists('magazinenp_sanitize_slider')) :

	/**
	 * Sanitize slider.
	 *
	 * @param mixed $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 * @since 1.0.0
	 *
	 */
	function magazinenp_sanitize_slider($input, $setting)
	{

		// Ensure input is clean.
		$input = absint($input);

		// Get list of choices from the control associated with the setting.
		$input_attrs = $setting->manager->get_control($setting->id)->input_attrs;

		// If the input is a valid key, return it; otherwise, return the default.
		return ($input_attrs['min'] <= $input) && ($input <= $input_attrs['max']) ? $input : $setting->default;

	}

endif;
if (!function_exists('magazinenp_sanitize_select')) {
	/**
	 * Sanitization: text
	 *
	 * @param WP_Customize_Setting $setting Setting instance.
	 *
	 * @return string Sanitized content.
	 * @since 1.0.0
	 *
	 */
	function magazinenp_sanitize_select($input)
	{
		if ($input !== '') {
			return sanitize_text_field($input);
		} else {
			return '';
		}
	}
}

if (!function_exists('magazinenp_sanitize_choices')) {
	/**
	 * Sanitization: select
	 *
	 * @param WP_Customize_Setting $setting Setting instance.
	 *
	 * @return mixed Sanitized value.
	 * @since 1.0.0
	 *
	 */
	function magazinenp_sanitize_choices($input, $setting)
	{

		// Ensure input is a slug.
		$input = sanitize_key($input);

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control($setting->id)->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return (array_key_exists($input, $choices) ? $input : $setting->default);
	}
}

if (!function_exists('magazinenp_sanitize_integer')) {

	function magazinenp_sanitize_integer($input)
	{
		return $input == '' ? '' : absint($input);
	}
}

if (!function_exists('magazinenp_sanitize_copyright_text')) {

	function magazinenp_sanitize_copyright_text($input)
	{
		$allowed_tags = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target'=>array()
			)
		);

		return wp_kses($input, $allowed_tags);

	}
}
