<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_section_social_options', array(
    'title' => esc_html__('Social', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_base_options',
    'priority' => 80,
)));

// FB
$priority = 20;


$wp_customize->add_setting(magazinenp_get_customizer_id('social_profile_style'), array(
    'default' => $default['social_profile_style'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',

));
$wp_customize->add_control(magazinenp_get_customizer_id('social_profile_style'), array(
    'label' => __(' Social Profile Style', 'magazinenp'),
    'section' => 'magazinenp_section_social_options',
    'type' => 'select',
    'choices' => array(
        'default' => esc_html__('Theme Default', 'magazinenp'),
        'official' => esc_html__('Official Social Color', 'magazinenp')
    ),
    'priority' => $priority


));
$magazinenp_social_profiles_config = magazinenp_social_profiles_config();

foreach ($magazinenp_social_profiles_config as $config_key => $config) {

    $priority = $priority + 20;
    $wp_customize->add_setting(magazinenp_get_customizer_id('social_profile_' . $config_key), array(
		'default' => $default['social_profile_' . $config_key],
		'sanitize_callback' => 'esc_url_raw',
        'capability' => 'edit_theme_options',

    ));
    $wp_customize->add_control(magazinenp_get_customizer_id('social_profile_' . $config_key), array(
        'label' => $config['title'] . __(' URL', 'magazinenp'),
        'section' => 'magazinenp_section_social_options',
        'type' => 'text',
        'priority' => $priority

    ));
}
