<?php

// Setting enable_theme_style_homepage.
$wp_customize->add_setting(magazinenp_get_customizer_id('enable_theme_style_homepage'),
    array(
        'default' => $default['enable_theme_style_homepage'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('enable_theme_style_homepage'),
        array(
            'label' => esc_html__('Theme Style Homepage', 'magazinenp'),
            'section' => 'static_front_page',
            'priority' => 1,


        )
    )
);
