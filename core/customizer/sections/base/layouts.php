<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_layouts', array(
    'title' => esc_html__('Layouts', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_base_options',
    'priority' => 10,
)));


$wp_customize->add_setting(magazinenp_get_customizer_id('base_sidebar_layout'),
    array(
        'default' => $default['base_sidebar_layout'],
        'sanitize_callback' => 'magazinenp_sanitize_select',
    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Radio(
        $wp_customize,
        magazinenp_get_customizer_id('base_sidebar_layout'),
        array(
            'label' => esc_html__('Sidebar Layout', 'magazinenp'),
            'section' => 'magazinenp_theme_base_layouts',
            'priority' => 40,
            'choices' => magazinenp_global_layout_options(),
            'has_images' => true,

        )
    )
);


// Setting Main Layout
$wp_customize->add_setting(magazinenp_get_customizer_id('content_layout'),
    array(
        'default' => $default['content_layout'],
        'sanitize_callback' => 'magazinenp_sanitize_select',

    )
);

$wp_customize->add_control(new MagazineNP_Customizer_Control_Buttonset(
        $wp_customize, magazinenp_get_customizer_id('content_layout'),
        array(
            'label' => esc_html__('Layout Style', 'magazinenp'),
            'section' => 'magazinenp_theme_base_layouts',
            'settings' => magazinenp_get_customizer_id('content_layout'),
            'priority' => 60,
            'choices' => array(
                'boxed_content_layout' => esc_html__('Boxed', 'magazinenp'),
                'full_width_content_layout' => esc_html__('Full Width ', 'magazinenp'),
            ),
        )
    )
);
