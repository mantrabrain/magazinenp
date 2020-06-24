<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_single_post_options', array(
    'title' => esc_html__('Single Post', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 700,
)));

include_once 'single-post/content.php';
//
include_once 'single-post/related-post.php';



