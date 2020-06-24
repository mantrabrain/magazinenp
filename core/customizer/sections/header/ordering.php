<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_header_ordering_options', array(
    'title' => esc_html__('Header Ordering', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 120,
)));

$wp_customize->add_setting(magazinenp_get_customizer_id('header_ordering'),
    array(
        'default' => $default['header_ordering'],
        'sanitize_callback' => 'magazinenp_sanitize_ordering',
    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Sortable(
        $wp_customize,
        magazinenp_get_customizer_id('header_ordering'),
        array(
            'label' => esc_html__('Header Ordering', 'magazinenp'),
            'section' => 'magazinenp_section_header_ordering_options',
            'priority' => 20,

        )
    )
);