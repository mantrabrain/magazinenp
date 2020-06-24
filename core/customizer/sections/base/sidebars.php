<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize,
	'magazinenp_theme_base_sidebar', array(
		'title' => esc_html__('Sidebar', 'magazinenp'),
		'panel' => MAGAZINENP_THEME_OPTION_PANEL,
		'section' => 'magazinenp_section_base_options',
		'priority' => 100,
	)));

// Setting show_breadcrumb.
$wp_customize->add_setting(magazinenp_get_customizer_id('enable_sidebar_sticky'),
	array(
		'default' => $default['enable_sidebar_sticky'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('enable_sidebar_sticky'),
		array(
			'label' => esc_html__('Enable/Disable Sticky Sidebar', 'magazinenp'),
			'section' => 'magazinenp_theme_base_sidebar',
			'priority' => 20,


		)
	)
);
