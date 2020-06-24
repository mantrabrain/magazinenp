<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
    $wp_customize,
    'magazinenp_section_footer_options', array(
    'title' => esc_html__('Footer', 'magazinenp'),
    'panel' => MAGAZINENP_THEME_OPTION_PANEL,
    'priority' => 1000,
)));
include_once 'footer/footer.php';