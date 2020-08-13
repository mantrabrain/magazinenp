<?php


// Setting show_breadcrumb.
$wp_customize->add_setting(magazinenp_get_customizer_id('show_you_missed_section'),
	array(
		'default' => $default['show_you_missed_section'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_you_missed_section'),
		array(
			'label' => esc_html__('Show you missed section', 'magazinenp'),
			'section' => 'magazinenp_section_you_missed_options',
			'priority' => 20,


		)
	)
);


$wp_customize->add_setting(magazinenp_get_customizer_id('you_missed_display'), array(
	'default' => $default['you_missed_display'],
	'sanitize_callback' => 'magazinenp_sanitize_choices',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('you_missed_display'), array(
	'label' => __('Display Option', 'magazinenp'),
	'section' => 'magazinenp_section_you_missed_options',
	'type' => 'radio',
	'checked' => 'checked',
	'choices' => array(
		'home' => __('Show on Homepage only', 'magazinenp'),
		'home-blog' => __('Show on Homepage & Blog Page', 'magazinenp'),
		'all' => __('Show on All Pages', 'magazinenp'),
	),
	'priority' => 40
));


$wp_customize->add_setting(
	magazinenp_get_customizer_id('you_missed_heading'), array(
	'default' => $default['you_missed_heading'],
	'sanitize_callback' => 'sanitize_text_field',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(
	magazinenp_get_customizer_id('you_missed_heading'), array(
	'label' => __('Heading', 'magazinenp'),
	'section' => 'magazinenp_section_you_missed_options',
	'type' => 'text',
	'priority' => 60,

));

$wp_customize->add_setting(magazinenp_get_customizer_id('you_missed_post_from'), array(
	'default' => $default['you_missed_post_from'],
	'sanitize_callback' => 'magazinenp_sanitize_choices',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(magazinenp_get_customizer_id('you_missed_post_from'), array(
	'section' => 'magazinenp_section_you_missed_options',
	'type' => 'radio',
	'checked' => 'checked',
	'choices' => array(
		'latest' => __('Show Latest Posts', 'magazinenp'),
		'category' => __('Show Posts from Category', 'magazinenp'),
	),
	'priority' => 80,

));
$wp_customize->add_setting(magazinenp_get_customizer_id('you_missed_post_category'), array(
	'default' => $default['you_missed_post_category'],
	'sanitize_callback' => 'magazinenp_sanitize_select',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new MagazineNP_Customizer_Control_Dropdown_Category($wp_customize, magazinenp_get_customizer_id('you_missed_post_category'), array(
	'label' => __('Choose Category', 'magazinenp'),
	'section' => 'magazinenp_section_you_missed_options',
	'priority' => 100,
	'active_callback' => 'magazinenp_you_missed_from_category',


)));

$wp_customize->add_setting(magazinenp_get_customizer_id('show_you_missed_post_category'),
	array(
		'default' => $default['show_you_missed_post_category'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_you_missed_post_category'),
		array(
			'label' => esc_html__('Show Category', 'magazinenp'),
			'section' => 'magazinenp_section_you_missed_options',
			'priority' => 100,


		)
	)
);

$wp_customize->add_setting(magazinenp_get_customizer_id('show_you_missed_post_meta'),
	array(
		'default' => $default['show_you_missed_post_meta'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_you_missed_post_meta'),
		array(
			'label' => esc_html__('Show Post Meta', 'magazinenp'),
			'section' => 'magazinenp_section_you_missed_options',
			'priority' => 120,


		)
	)
);
