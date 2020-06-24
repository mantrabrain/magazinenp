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