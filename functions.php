<?php

/**
 * MagazineNP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mantrabrain
 * @subpackage MagazineNP
 * @since 1.0.0
 */

define('MAGAZINENP_THEME_VERSION', '1.0.9');
define('MAGAZINENP_THEME_SETTINGS', 'magazinenp');
define('MAGAZINENP_THEME_OPTION_PANEL', 'magazinenp_theme_option_panel');
define('MAGAZINENP_THEME_DIR', trailingslashit(get_template_directory()));
define('MAGAZINENP_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
// Theme Core file init

require_once MAGAZINENP_THEME_DIR . 'core/class-magazinenp-core.php';

function MagazineNP()
{
    return MagazineNP_Core::get_instance();

}

MagazineNP();


