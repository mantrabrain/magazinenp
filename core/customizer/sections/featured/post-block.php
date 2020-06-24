<?php
$wp_customize->add_section(new MagazineNP_Customizer_Section($wp_customize,
    'magazinenp_section_post_block_options', array(
        'title' => esc_html__('Post Block', 'magazinenp'),
        'panel' => MAGAZINENP_THEME_OPTION_PANEL,
        'section' => 'magazinenp_section_featured_options',
        'priority' => 20,
    )));


include_once 'post-block/settings.php';

