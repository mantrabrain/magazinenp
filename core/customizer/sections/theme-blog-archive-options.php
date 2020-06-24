<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_blog_archive_options', array(
    'title' => esc_html__('Blog/Archive', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 600,
)));
include_once 'blog-archive/content.php';

include_once 'blog-archive/pagination.php';



