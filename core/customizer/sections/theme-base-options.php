<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section(
	$wp_customize,
	'magazinenp_section_base_options', array(
	'title' => esc_html__('Base (Global)', 'magazinenp'),
	'panel' => MAGAZINENP_THEME_OPTION_PANEL,
	'priority' => 100,
)));
include_once 'base/layouts.php';
include_once 'base/breadcrumb.php';
include_once 'base/date.php';
include_once 'base/title.php';
include_once 'base/mnp-cat-color.php';
include_once 'base/social.php';
include_once 'base/sidebars.php';



