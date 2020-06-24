<?php


// Setting show_breadcrumb.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_banner_section'),
    array(
        'default' => $default['show_banner_section'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_banner_section'),
        array(
            'label' => esc_html__('Show Banner Section', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 20,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('banner_display'), array(
    'default' => $default['banner_display'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('banner_display'), array(
    'label' => __('Display Option', 'magazinenp'),
    'section' => 'magazinenp_section_banner_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'home' => __('Show on Homepage only', 'magazinenp'),
        'home-blog' => __('Show on Homepage & Blog Page', 'magazinenp'),
    ),
    'priority' => 40
));


$wp_customize->add_setting(
    'magazinenp_banner_ordering_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Heading(
        $wp_customize,
        'magazinenp_banner_ordering_heading',
        array(
            'label' => esc_html__('Banner Ordering', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 60

        )
    )
);


$wp_customize->add_setting(magazinenp_get_customizer_id('banner_ordering'),
    array(
        'default' => $default['banner_ordering'],
        'sanitize_callback' => 'magazinenp_sanitize_ordering',
    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Sortable(
        $wp_customize,
        magazinenp_get_customizer_id('banner_ordering'),
        array(
            'label' => esc_html__('Banner Ordering', 'magazinenp'),
            'section' => 'magazinenp_section_banner_options',
            'priority' => 80,
            'hide_disable_option' => true

        )
    )
);
