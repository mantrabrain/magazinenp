<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_header_media_options', array(
    'title' => esc_html__('Header Media', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_header_options',
    'priority' => 140,
)));
