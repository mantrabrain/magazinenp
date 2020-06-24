<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_breadcrumbs', array(
    'title' => esc_html__('Breadcrumbs', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_base_options',
    'priority' => 20,
)));

// Setting show_breadcrumb.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_breadcrumb'),
    array(
        'default' => $default['show_breadcrumb'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_breadcrumb'),
        array(
            'label' => esc_html__('Show Breadcrumb', 'magazinenp'),
            'section' => 'magazinenp_theme_base_breadcrumbs',
            'priority' => 20,


        )
    )
);