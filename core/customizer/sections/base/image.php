<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_image_option', array(
	'title' => esc_html__('Image', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'section' => 'magazinenp_section_base_options',
	'priority' => 61,
)));


$wp_customize->add_setting(
	magazinenp_get_customizer_id('image_hover_effect'), array(
	'default' => $default['image_hover_effect'],
	'sanitize_callback' => 'sanitize_text_field',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
	magazinenp_get_customizer_id('image_hover_effect'), array(
	'label' => __('Image Hover Effect', 'magazinenp'),
	'section' => 'magazinenp_theme_base_image_option',
	'type' => 'select',
	'choices' => array(
		'none' => esc_html__('None', 'magazinenp'),
		'theme_default' => esc_html__('Theme Default', 'magazinenp'),
	),
	'priority' => 20,


));
