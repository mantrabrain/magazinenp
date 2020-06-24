<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_featured_options', array(
    'title' => esc_html__('Featured Section', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 300,
)));

include_once 'featured/banner.php';
include_once 'featured/post-block.php';
