<?php


$wp_customize->add_setting(magazinenp_get_customizer_id('footer_background_image'), array(
	'sanitize_callback' => 'esc_url_raw',
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control(new WP_Customize_Image_Control ($wp_customize, magazinenp_get_customizer_id('footer_background_image'), array(
	'label' => __('Background Image', 'magazinenp'),
	'section' => 'magazinenp_section_footer_options',
	'priority' => 20,

)));


// Show/Hide Social Profiles
$wp_customize->add_setting(magazinenp_get_customizer_id('show_social_profile_on_footer'),
	array(
		'default' => $default['show_social_profile_on_footer'],
		'sanitize_callback' => 'magazinenp_sanitize_checkbox',

	)
);

$wp_customize->add_control(
	new MagazineNP_Customizer_Control_Switch(
		$wp_customize,
		magazinenp_get_customizer_id('show_social_profile_on_footer'),
		array(
			'label' => esc_html__('Show/Hide Social Profile', 'magazinenp'),
			'section' => 'magazinenp_section_footer_options',
			'priority' => 40,


		)
	)
);


$wp_customize->add_setting(magazinenp_get_customizer_id('bottom_footer_copyright_text'),
	array(
		'default' => $default['bottom_footer_copyright_text'],
		'sanitize_callback' => 'magazinenp_sanitize_copyright_text',
	)
);

$wp_customize->add_control(
	magazinenp_get_customizer_id('bottom_footer_copyright_text'), array(
	'label' => __('Copyright text', 'magazinenp'),
	'section' => 'magazinenp_section_footer_options',
	'type' => 'text',
	'priority' => 60,

));

