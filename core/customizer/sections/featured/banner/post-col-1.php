<?php


$wp_customize->add_setting(
    'magazinenp_banner_featured_post1_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Heading(
        $wp_customize,
        'magazinenp_banner_featured_post1_heading',
        array(
            'label' => esc_html__('Post Column 1', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 300,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('post_col_1_heading'), array(
    'default' => $default['post_col_1_heading'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('post_col_1_heading'), array(
    'label' => __('Heading', 'magazinenp'),
    'section' => 'magazinenp_section_banner_options',
    'type' => 'text',
    'priority' => 340,

));
$wp_customize->add_setting(magazinenp_get_customizer_id('post_col_1_post_from'), array(
    'default' => $default['post_col_1_post_from'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('post_col_1_post_from'), array(
    'section' => 'magazinenp_section_banner_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'latest' => __('Show Latest Posts', 'magazinenp'),
        'category' => __('Show Posts from Category', 'magazinenp'),
    ),
    'priority' => 360,

));
$wp_customize->add_setting(magazinenp_get_customizer_id('post_col_1_post_category'), array(
    'default' => $default['post_col_1_post_category'],
    'sanitize_callback' => 'magazinenp_sanitize_select',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new MagazineNP_Customizer_Control_Dropdown_Category($wp_customize, magazinenp_get_customizer_id('post_col_1_post_category'), array(
    'label' => __('Choose Category', 'magazinenp'),
    'section' => 'magazinenp_section_banner_options',
    'priority' => 380,
	'active_callback' => 'magazinenp_post_col_1_post_from_category',


)));


$wp_customize->add_setting(magazinenp_get_customizer_id('show_post_col_1_post_category'),
    array(
        'default' => $default['show_post_col_1_post_category'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_post_col_1_post_category'),
        array(
            'label' => esc_html__('Show Category', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 381,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('show_post_col_1_post_meta'),
    array(
        'default' => $default['show_post_col_1_post_meta'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_post_col_1_post_meta'),
        array(
            'label' => esc_html__('Show Post Meta', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 382,


        )
    )
);
