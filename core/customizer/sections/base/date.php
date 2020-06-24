<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_date_time', array(
	'title' => esc_html__('Date', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'section' => 'magazinenp_section_base_options',
	'priority' => 40,
)));


$wp_customize->add_setting(
	magazinenp_get_customizer_id('date_format'), array(
	'default' => $default['date_format'],
	'sanitize_callback' => 'sanitize_text_field',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
	magazinenp_get_customizer_id('date_format'), array(
	'label' => __('Date Format', 'magazinenp'),
	'section' => 'magazinenp_theme_base_date_time',
	'active_callback' => 'magazinenp_is_ticker_enabled',
	'type' => 'select',
	'choices' => array(
		'theme-default' => esc_html__('Theme Default', 'magazinenp'),
		'wp-default' => esc_html__('WordPress Default', 'magazinenp')
	),
	'priority' => 20,


));
