<?php
/**
 * MagazineNP_Hooks setup
 *
 * @package MagazineNP_Hooks
 * @since 1.0.0
 */

/**
 * Main MagazineNP_Hooks Class.
 *
 * @class MagazineNP_Hooks
 */
class MagazineNP_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var MagazineNP_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main MagazineNP_Hooks Instance.
     *
     * Ensures only one instance of MagazineNP_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return MagazineNP_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();

        return self::$_instance;
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes()
    {
        include_once MAGAZINENP_THEME_DIR . 'core/hooks/class-magazinenp-template-hooks.php';
        include_once MAGAZINENP_THEME_DIR . 'core/hooks/class-magazinenp-footer-hooks.php';
        include_once MAGAZINENP_THEME_DIR . 'core/hooks/class-magazinenp-misc-hooks.php';


    }


}

MagazineNP_Hooks::instance();