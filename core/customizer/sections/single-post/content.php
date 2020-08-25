<?php
// Archive Page Layout

$wp_customize->add_section(new MagazineNP_Customizer_Section(
	$wp_customize, 'magazinenp_section_single_post_content_options', array(
	'title' => esc_html__('Content & Metas', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'section' => 'magazinenp_section_single_post_options',
	'priority' => 40,
)));

$wp_customize->add_setting(magazinenp_get_customizer_id('single_post_content_order'),
	array(
		'default' => $default['single_post_content_order'],
		'sanitize_callback' => 'magazinenp_sanitize_ordering',
	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Sortable(
		$wp_customize,
		magazinenp_get_customizer_id('single_post_content_order'),
		array(
			'label' => esc_html__('Content  Ordering', 'magazinenp'),
			'section' => 'magazinenp_section_single_post_content_options',
			'priority' => 120,

		)
	)
);

$wp_customize->add_setting(
	magazinenp_get_customizer_id('single_post_date_format'), array(
	'default' => $default['single_post_date_format'],
	'sanitize_callback' => 'sanitize_text_field',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
	magazinenp_get_customizer_id('single_post_date_format'), array(
	'label' => __('Date Format', 'magazinenp'),
	'section' => 'magazinenp_section_single_post_content_options',
	'active_callback' => 'magazinenp_single_post_is_post_meta_enable',
	'type' => 'select',
	'choices' => array(
		'global' => esc_html__('From Global Setting', 'magazinenp'),
		'theme-default' => esc_html__('Theme Default (Created Date)', 'magazinenp'),
		'theme-default-updated' => esc_html__('Theme Default (Updated Date)', 'magazinenp'),
		'wp-default' => esc_html__('WordPress Default (Created Date)', 'magazinenp'),
		'wp-default-updated' => esc_html__('WordPress Default (Updated Date)', 'magazinenp'),
		'wp-default-datetime' => esc_html__('WordPress Default (Created Date Time)', 'magazinenp'),
		'wp-default-updated-datetime' => esc_html__('WordPress Default (Updated Date Time)', 'magazinenp')
	),
	'priority' => 130,


));
