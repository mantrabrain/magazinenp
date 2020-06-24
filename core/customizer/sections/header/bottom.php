<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
	$wp_customize, 'magazinenp_section_bottom_header_options', array(
	'title' => esc_html__('Main Header', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'section' => 'magazinenp_section_header_options',
	'priority' => 60,
)));

$wp_customize->add_setting(magazinenp_get_customizer_id('bottom_header_show_home_icon'),
	array(
		'default' => $default['bottom_header_show_home_icon'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('bottom_header_show_home_icon'),
		array(
			'label' => esc_html__('Show Home Icon', 'magazinenp'),
			'section' => 'magazinenp_section_bottom_header_options',
			'priority' => 20,


		)
	)
);

$wp_customize->add_setting(magazinenp_get_customizer_id('bottom_header_show_search_icon'),
	array(
		'default' => $default['bottom_header_show_search_icon'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('bottom_header_show_search_icon'),
		array(
			'label' => esc_html__('Show Search Icon', 'magazinenp'),
			'section' => 'magazinenp_section_bottom_header_options',
			'priority' => 40,


		)
	)
);


$wp_customize->add_setting(magazinenp_get_customizer_id('bottom_header_sticky_status'),
	array(
		'default' => $default['bottom_header_sticky_status'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('bottom_header_sticky_status'),
		array(
			'label' => esc_html__('Enable/Disable Sticky', 'magazinenp'),
			'section' => 'magazinenp_section_bottom_header_options',
			'priority' => 50,


		)
	)
);
