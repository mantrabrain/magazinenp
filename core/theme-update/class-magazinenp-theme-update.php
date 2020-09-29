<?php

class MagazineNP_Theme_Update
{
	public function __construct()
	{
		require MAGAZINENP_THEME_DIR . '/core/theme-update/update-functions.php';

		add_action('after_setup_theme', array($this, 'update'));

	}

	public static $db_updates = array(
		'1.0.0' => array()
	);

	public function update()
	{

		$theme = wp_get_theme();

		if (is_child_theme()) {
			$theme = $theme->parent();
		}

		$version = $theme->get('Version');

		$saved_version = self::version_from_db();

		// If equals then return.
		if (version_compare($saved_version, $version, '=')) {
			return;
		}
		if (false === $saved_version || is_null($saved_version) || '' == $saved_version) {
			magazinenp_update_v_1_1_1();
		}
		foreach (self::$db_updates as $db_version => $callback) {

			if (version_compare($saved_version, $db_version, '<')) {
				//
			}

		}
		self::update_version_db();

	}

	public static function version_from_db()
	{
		$theme_version = get_theme_mod('magazinenp_theme_version_from_db', null);

		return $theme_version;
	}

	public static function update_version_db()
	{
		remove_theme_mod('magazinenp_theme_version_from_db');

		set_theme_mod('magazinenp_theme_version_from_db', MAGAZINENP_THEME_VERSION);

	}


}

new MagazineNP_Theme_Update();
