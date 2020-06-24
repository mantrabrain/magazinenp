<?php

// Setting show_breadcrumb.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_category_on_blog_archive_page'),
    array(
        'default' => $default['show_category_on_blog_archive_page'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_category_on_blog_archive_page'),
        array(
            'label' => esc_html__('Show Category', 'magazinenp'),
            'section' => 'magazinenp_section_blog_archive_page_content_options',
            'priority' => 20,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('show_post_post_meta_on_blog_archive_page'),
    array(
        'default' => $default['show_post_post_meta_on_blog_archive_page'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_post_post_meta_on_blog_archive_page'),
        array(
            'label' => esc_html__('Show Post Meta', 'magazinenp'),
            'section' => 'magazinenp_section_blog_archive_page_content_options',
            'priority' => 40,


        )
    )
);

$wp_customize->add_setting(magazinenp_get_customizer_id('show_excerpt_on_blog_archive_page'),
    array(
        'default' => $default['show_excerpt_on_blog_archive_page'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_excerpt_on_blog_archive_page'),
        array(
            'label' => esc_html__('Show Excerpt', 'magazinenp'),
            'section' => 'magazinenp_section_blog_archive_page_content_options',
            'priority' => 60,


        )
    )
);