<?php


$wp_customize->add_setting(magazinenp_get_customizer_id('show_page_feature_image'),
	array(
		'default' => $default['show_page_feature_image'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_page_feature_image'),
		array(
			'label' => esc_html__('Show Feature Image', 'magazinenp'),
			'section' => 'magazinenp_section_single_page_options',
			'priority' => 40,


		)
	)
);
// Show/Hide Page Title
$wp_customize->add_setting(magazinenp_get_customizer_id('show_page_title'),
	array(
		'default' => $default['show_page_title'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_page_title'),
		array(
			'label' => esc_html__('Show Page Title', 'magazinenp'),
			'section' => 'magazinenp_section_single_page_options',
			'priority' => 45,


		)
	)
);
