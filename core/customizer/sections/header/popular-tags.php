<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_popular_tags_options', array(
    'title' => esc_html__('Popular Tags', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 80,
)));

$wp_customize->add_setting(
    magazinenp_get_customizer_id('popular_tags_heading'), array(
    'default' => $default['popular_tags_heading'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    magazinenp_get_customizer_id('popular_tags_heading'), array(
    'label' => __('Popular Tags Heading', 'magazinenp'),
    'section' => 'magazinenp_section_popular_tags_options',
    'type' => 'text',
    'priority' => 20,

));

$wp_customize->add_setting(magazinenp_get_customizer_id('popular_tags_display'), array(
    'default' => $default['popular_tags_display'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('popular_tags_display'), array(
    'label' => __('Display Option', 'magazinenp'),
    'section' => 'magazinenp_section_popular_tags_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'home' => __('Show on Homepage only', 'magazinenp'),
        'home-blog' => __('Show on Homepage & Blog Page', 'magazinenp'),
        'all' => __('Show on all pages', 'magazinenp'),
    ),
    'priority' => 40
));