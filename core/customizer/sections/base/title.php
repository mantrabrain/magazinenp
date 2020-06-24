<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_title_option', array(
    'title' => esc_html__('Title', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_base_options',
    'priority' => 60,
)));


$wp_customize->add_setting(
    magazinenp_get_customizer_id('title_style'), array(
    'default' => $default['title_style'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    magazinenp_get_customizer_id('title_style'), array(
    'label' => __('Title Layout', 'magazinenp'),
    'section' => 'magazinenp_theme_base_title_option',
    'active_callback' => 'magazinenp_is_ticker_enabled',
    'type' => 'select',
    'choices' => array(
        'style1' => esc_html__('Style 1', 'magazinenp'),
        'style2' => esc_html__('Style 2', 'magazinenp'),
        'style3' => esc_html__('Style 3', 'magazinenp'),
        'style4' => esc_html__('Style 4', 'magazinenp'),
        'style5' => esc_html__('Style 5', 'magazinenp')
    ),
    'priority' => 20,


));