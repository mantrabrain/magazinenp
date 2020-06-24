<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_top_header_options', array(
    'title' => esc_html__('Top Bar', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 20,
)));

// Setting show_date_on_topbar.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_date_on_topbar'),
    array(
        'default' => $default['show_date_on_topbar'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_date_on_topbar'),
        array(
            'label' => esc_html__('Show/Hide Date', 'magazinenp'),
            'section' => 'magazinenp_section_top_header_options',
            'priority' => 20,


        )
    )
);


// Show/Hide Social Profiles
$wp_customize->add_setting(magazinenp_get_customizer_id('show_social_profile_on_topbar'),
    array(
        'default' => $default['show_social_profile_on_topbar'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_social_profile_on_topbar'),
        array(
            'label' => esc_html__('Show/Hide Social Profile', 'magazinenp'),
            'section' => 'magazinenp_section_top_header_options',
            'priority' => 40,


        )
    )
);
