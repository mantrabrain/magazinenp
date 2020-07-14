<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize,
	'magazinenp_theme_base_go_to_top', array(
		'title' => esc_html__('Go to Top', 'magazinenp'),
		'panel' => MAGAZINENP_THEME_OPTION_PANEL,
		'section' => 'magazinenp_section_base_options',
		'priority' => 100,
	)));

// Setting enable_go_to_top.
$wp_customize->add_setting(magazinenp_get_customizer_id('enable_go_to_top'),
	array(
		'default' => $default['enable_go_to_top'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('enable_go_to_top'),
		array(
			'label' => esc_html__('Enable/Disable Go to Top', 'magazinenp'),
			'section' => 'magazinenp_theme_base_go_to_top',
			'priority' => 20,


		)
	)
);
