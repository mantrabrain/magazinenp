<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_header_options', array(
    'title' => esc_html__('Header', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 200,
)));
include_once 'header/top.php';
include_once 'header/mid.php';
include_once 'header/bottom.php';
include_once 'header/popular-tags.php';
include_once 'header/ticker.php';
include_once 'header/ordering.php';
include_once 'header/media.php';



