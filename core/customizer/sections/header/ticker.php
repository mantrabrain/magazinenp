<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_news_ticker_options', array(
    'title' => esc_html__('News Ticker', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 100,
)));

$wp_customize->add_setting(
    magazinenp_get_customizer_id('news_ticker_heading'), array(
    'default' => $default['news_ticker_heading'],
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    magazinenp_get_customizer_id('news_ticker_heading'), array(
    'label' => __('News Ticker Heading', 'magazinenp'),
    'section' => 'magazinenp_section_news_ticker_options',
    'type' => 'text',
    'priority' => 20,

));
$wp_customize->add_setting(
    magazinenp_get_customizer_id('news_ticker_post_from'), array(
    'default' => $default['news_ticker_post_from'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    magazinenp_get_customizer_id('news_ticker_post_from'), array(
    'section' => 'magazinenp_section_news_ticker_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'latest' => __('Show Latest Posts', 'magazinenp'),
        'category' => __('Show Posts from Category', 'magazinenp'),
    ),
    'priority' => 40,

));
$wp_customize->add_setting(
    magazinenp_get_customizer_id('news_ticker_post_category'), array(
    'default' => $default['news_ticker_post_category'],
    'sanitize_callback' => 'magazinenp_sanitize_select',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
    new MagazineNP_Customizer_Control_Dropdown_Category($wp_customize, magazinenp_get_customizer_id('news_ticker_post_category'), array(
        'label' => __('Choose Category', 'magazinenp'),
        'section' => 'magazinenp_section_news_ticker_options',
        'priority' => 60,
		'active_callback' => 'magazinenp_ticker_post_from_category',
	)));


$wp_customize->add_setting(magazinenp_get_customizer_id('news_ticker_display'), array(
    'default' => $default['news_ticker_display'],
    'sanitize_callback' => 'magazinenp_sanitize_choices',
    'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('news_ticker_display'), array(
    'label' => __('Display Option', 'magazinenp'),
    'section' => 'magazinenp_section_news_ticker_options',
    'type' => 'radio',
    'checked' => 'checked',
    'choices' => array(
        'home' => __('Show on Homepage only', 'magazinenp'),
        'home-blog' => __('Show on Homepage & Blog Page', 'magazinenp'),
        'all' => __('Show on all pages', 'magazinenp'),
    ),
    'priority' => 80
));
