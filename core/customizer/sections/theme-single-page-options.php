<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_single_page_options', array(
    'title' => esc_html__('Single Page', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 800,
)));
include_once 'single-page/content.php';
