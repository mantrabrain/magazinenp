<?php
/**
 * MagazineNP_Compatibility setup
 *
 * @package MagazineNP_Compatibility
 * @since 1.0.0
 */

/**
 * Main MagazineNP_Compatibility Class.
 *
 * @class MagazineNP_Compatibility
 */
class MagazineNP_Compatibility
{

	/**
	 * The single instance of the class.
	 *
	 * @var MagazineNP_Compatibility
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	private $defaults;


	/**
	 * Main MagazineNP_Compatibility Instance.
	 *
	 * Ensures only one instance of MagazineNP_Compatibility is loaded or can be loaded.
	 *
	 * @return MagazineNP_Compatibility - Main instance.
	 * @since 1.0.0
	 * @static
	 */

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		self::$_instance->includes();
	}


	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes()
	{
		require_once MAGAZINENP_THEME_DIR . '/core/compatibility/class-magazinenp-woocommerce.php';


	}
}

MagazineNP_Compatibility::instance();
