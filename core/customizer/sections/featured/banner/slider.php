<?php

$wp_customize->add_setting(
    'magazinenp_banner_slider_heading_option',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Heading(
        $wp_customize,
        'magazinenp_banner_slider_heading_option',
        array(
            'label' => esc_html__('Slider Options', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 201,


        )
    )
);

$wp_customize->add_setting(
    magazinenp_get_customizer_id('banner_slider_heading'), array(
    'default' => $default['banner_slider_heading'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    magazinenp_get_customizer_id('banner_slider_heading'), array(
    'label' => __('Slider Heading', 'magazinenp'),
    'section' => 'magazinenp_section_banner_options',
    'type' => 'text',
    'priority' => 220,

));

$wp_customize->add_setting(magazinenp_get_customizer_id('banner_slider_post_from'), array(
    'default' => $default['banner_slider_post_from'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('banner_slider_post_from'), array(
    'section' => 'magazinenp_section_banner_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'latest' => __('Show Latest Posts', 'magazinenp'),
        'category' => __('Show Posts from Category', 'magazinenp'),
    ),
    'priority' => 240,

));
$wp_customize->add_setting(magazinenp_get_customizer_id('banner_slider_post_category'), array(
    'default' => $default['banner_slider_post_category'],
    'sanitize_callback' => 'magazinenp_sanitize_select',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new MagazineNP_Customizer_Control_Dropdown_Category($wp_customize, magazinenp_get_customizer_id('banner_slider_post_category'), array(
    'label' => __('Choose Category', 'magazinenp'),
    'section' => 'magazinenp_section_banner_options',
    'priority' => 260,
	'active_callback' => 'magazinenp_slider_post_from_category',


)));

$wp_customize->add_setting(magazinenp_get_customizer_id('show_banner_slider_post_category'),
    array(
        'default' => $default['show_banner_slider_post_category'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_banner_slider_post_category'),
        array(
            'label' => esc_html__('Show Category', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 261,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('show_banner_slider_post_meta'),
    array(
        'default' => $default['show_banner_slider_post_meta'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_banner_slider_post_meta'),
        array(
            'label' => esc_html__('Show Post Meta', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 262,


        )
    )
);
