<?php
// Pagination


$wp_customize->add_setting(magazinenp_get_customizer_id('blog_archive_pagination_style'),
    array(
        'default' => $default['blog_archive_pagination_style'],
        'sanitize_callback' => 'magazinenp_sanitize_select',
    )
);

$wp_customize->add_control(magazinenp_get_customizer_id('blog_archive_pagination_style'),
    array(
        'label' => esc_html__('Pagination Style', 'magazinenp'),
        'section' => 'magazinenp_section_blog_archive_pagination_options',
        'type' => 'select',
        'priority' => 20,
        'choices' => array(
            'numeric' => esc_html__('Numeric', 'magazinenp')
        )
    )
);