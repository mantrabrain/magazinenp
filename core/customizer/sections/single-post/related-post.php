<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_related_posts_options', array(
    'title' => esc_html__('Related Posts', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_single_post_options',
    'priority' => 60,
)));

// Setting show_date_on_topbar.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_related_posts'),
    array(
        'default' => $default['show_related_posts'],
        'sanitize_callback' => 'magazinenp_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Switch(
        $wp_customize,
        magazinenp_get_customizer_id('show_related_posts'),
        array(
            'label' => esc_html__('Show/Hide Related Posts', 'magazinenp'),
            'section' => 'magazinenp_section_related_posts_options',


        )
    )
);
$wp_customize->add_setting(magazinenp_get_customizer_id('related_posts_heading'), array(
    'default' => $default['related_posts_heading'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('related_posts_heading'), array(
    'label' => __('Related Posts Heading', 'magazinenp'),
    'section' => 'magazinenp_section_related_posts_options',
    'type' => 'text',
));
$wp_customize->add_setting(magazinenp_get_customizer_id('related_posts_type'), array(
    'default' => $default['related_posts_type'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('related_posts_type'), array(
    'section' => 'magazinenp_section_related_posts_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'automatic' => __('Show Automatic Posts', 'magazinenp'),
        'latest' => __('Show Latest Posts', 'magazinenp'),
        'category' => __('Show Posts from Category', 'magazinenp'),
    ),
));


$wp_customize->add_setting(magazinenp_get_customizer_id('automatic_related_posts_from'), array(
    'default' => $default['automatic_related_posts_from'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('automatic_related_posts_from'), array(
    'section' => 'magazinenp_section_related_posts_options',
    'label' => __('Related Posts Taxonomy', 'magazinenp'),
    'type' => 'select',
    'choices' => array(
        'category' => __('Category', 'magazinenp'),
        'tags' => __('Tags', 'magazinenp'),
    ),
));
$wp_customize->add_setting(magazinenp_get_customizer_id('related_posts_selected_category'), array(
    'default' => $default['related_posts_selected_category'],
    'sanitize_callback' => 'magazinenp_sanitize_select',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new MagazineNP_Customizer_Control_Dropdown_Category($wp_customize, magazinenp_get_customizer_id('related_posts_selected_category'), array(
    'label' => __('Choose Category', 'magazinenp'),
    'section' => 'magazinenp_section_related_posts_options',
 )));


//Related Posts Count
$wp_customize->add_setting(magazinenp_get_customizer_id('single_post_related_posts_columns'),
    array(
        'default' => $default['single_post_related_posts_columns'],
        'sanitize_callback' => 'magazinenp_sanitize_slider',
    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Slider(
        $wp_customize,
        magazinenp_get_customizer_id('single_post_related_posts_columns'),
        array(
            'label' => esc_html__('Related Posts Columns', 'magazinenp'),
            'section' => 'magazinenp_section_related_posts_options',
            'input_attrs' => array(
                'min' => 1,
                'max' => 4,
                'step' => 1
            ),
        )
    )
);


//Related Posts Count
$wp_customize->add_setting(magazinenp_get_customizer_id('single_post_related_posts_count'),
    array(
        'default' => $default['single_post_related_posts_count'],
        'sanitize_callback' => 'magazinenp_sanitize_slider',
    )
);

$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Slider(
        $wp_customize,
        magazinenp_get_customizer_id('single_post_related_posts_count'),
        array(
            'label' => esc_html__('Related Posts Count', 'magazinenp'),
            'section' => 'magazinenp_section_related_posts_options',
            'input_attrs' => array(
                'min' => 1,
                'max' => 50,
                'step' => 1
            ),
        )
    )
);


$wp_customize->add_setting(magazinenp_get_customizer_id('related_posts_order_by'), array(
    'default' => $default['related_posts_order_by'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('related_posts_order_by'), array(
    'section' => 'magazinenp_section_related_posts_options',
    'label' => __('Order by', 'magazinenp'),
    'type' => 'select',

    'choices' => array(
        'date' => __('ID', 'magazinenp'),
        'id' => __('Date', 'magazinenp'),
    ),
));

$wp_customize->add_setting(magazinenp_get_customizer_id('related_posts_ordering_order'), array(
    'default' => $default['related_posts_ordering_order'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('related_posts_ordering_order'), array(
    'section' => 'magazinenp_section_related_posts_options',
    'label' => __('Order', 'magazinenp'),
    'type' => 'select',

    'choices' => array(
        'asc' => __('Asc', 'magazinenp'),
        'desc' => __('Desc', 'magazinenp'),
    ),
));
