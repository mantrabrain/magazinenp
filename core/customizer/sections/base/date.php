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
	'type' => 'select',
	'choices' => array(
		'theme-default' => esc_html__('Theme Default (Created Date)', 'magazinenp'),
		'theme-default-updated' => esc_html__('Theme Default (Updated Date)', 'magazinenp'),
		'wp-default' => esc_html__('WordPress Default (Created Date)', 'magazinenp'),
		'wp-default-updated' => esc_html__('WordPress Default (Updated Date)', 'magazinenp')
	),
	'priority' => 20,


));


$wp_customize->add_setting(
	magazinenp_get_customizer_id('global_date_title'), array(
	'default' => $default['global_date_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
	magazinenp_get_customizer_id('global_date_title'), array(
	'label' => __('Date Title', 'magazinenp'),
	'section' => 'magazinenp_theme_base_date_time',
	'type' => 'select',
	'choices' => array(
		'post-title' => esc_html__('Post Title', 'magazinenp'),
		'none' => esc_html__('No Title', 'magazinenp'),
		'theme-default' => esc_html__('Theme Default (Created Date)', 'magazinenp'),
		'theme-default-updated' => esc_html__('Theme Default (Updated Date)', 'magazinenp'),
		'wp-default' => esc_html__('WordPress Default (Created Date)', 'magazinenp'),
		'wp-default-updated' => esc_html__('WordPress Default (Updated Date)', 'magazinenp'),
		'wp-default-datetime' => esc_html__('WordPress Default (Created Date Time)', 'magazinenp'),
		'wp-default-updated-datetime' => esc_html__('WordPress Default (Updated Date Time)', 'magazinenp')

	),
	'priority' => 40,


));
