<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_mid_header_options', array(
    'title' => esc_html__('Mid Bar', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 40,
)));

$wp_customize->add_setting(magazinenp_get_customizer_id('mid_header_background_image'), array(
    'sanitize_callback' => 'esc_url_raw',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new WP_Customize_Image_Control ($wp_customize, magazinenp_get_customizer_id('mid_header_background_image'), array(
    'label' => __('Background Image', 'magazinenp'),
    'section' => 'magazinenp_section_mid_header_options',
)));
$wp_customize->add_setting(magazinenp_get_customizer_id('mid_header_adv_image'), array(
    'sanitize_callback' => 'esc_url_raw',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new WP_Customize_Image_Control ($wp_customize, magazinenp_get_customizer_id('mid_header_adv_image'), array(
    'label' => __('Advertisement Image', 'magazinenp'),
    'section' => 'magazinenp_section_mid_header_options',
)));
$wp_customize->add_setting(magazinenp_get_customizer_id('mid_header_adv_link'), array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control(magazinenp_get_customizer_id('mid_header_adv_link'), array(
    'label' => __('Advertisement Image Url', 'magazinenp'),
    'section' => 'magazinenp_section_mid_header_options',
    'type' => 'text',
));
