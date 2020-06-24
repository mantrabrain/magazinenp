<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize, 'magazinenp_theme_base_category_color_option', array(
    'title' => esc_html__('Category Color', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_base_options',
    'priority' => 80,
)));


$priority = 20;

$categories = get_terms('category'); // Get all Categories

foreach ($categories as $category_list) {

    $wp_customize->add_setting(
        'magazinenp_category_color_' . esc_html(strtolower($category_list->term_id)),
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'magazinenp_category_color_' . esc_html(strtolower($category_list->term_id)),
            array(
                'label' => esc_html($category_list->name),
                'section' => 'magazinenp_theme_base_category_color_option',
                'priority' => absint($priority)
            )
        )
    );
    $priority++;
}