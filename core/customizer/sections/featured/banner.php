<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize,
    'magazinenp_section_banner_options', array(
        'title' => esc_html__('Banner', 'magazinenp'),
        'panel' => MAGAZINENP_THEME_OPTION_PANEL,
        'section' => 'magazinenp_section_featured_options',
        'priority' => 10,
    )));


include_once 'banner/settings.php';
include_once 'banner/slider.php';
include_once 'banner/post-col-1.php';
include_once 'banner/post-col-2.php';

