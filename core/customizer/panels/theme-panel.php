<?php

$wp_customize->add_panel(new MagazineNP_Customizer_Panel($wp_customize, MAGAZINENP_THEME_OPTION_PANEL, array(
    'priority' => 10,
    'title' => esc_html__('Theme Options', 'magazinenp'),
    'capabitity' => 'edit_theme_options',
)));