<?php

$wp_customize->add_section(new MagazineNP_Customizer_Section(
	$wp_customize,
	'magazinenp_section_you_missed_options', array(
	'title' => esc_html__('You Missed Section', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'priority' => 801,
)));
include_once 'missed/main.php';
