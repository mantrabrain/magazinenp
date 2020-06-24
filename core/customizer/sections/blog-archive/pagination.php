<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize, 'magazinenp_section_blog_archive_pagination_options', array(
    'title' => esc_html__('Pagination', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'section' => 'magazinenp_section_blog_archive_options',
    'priority' => 40,
)));

include_once 'pagination/main.php';

