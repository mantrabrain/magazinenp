<?php
/**
 * MagazineNP_Customizer setup
 *
 * @package MagazineNP_Customizer
 * @since 1.0.0
 */

/**
 * Main MagazineNP_Customizer Class.
 *
 * @class MagazineNP_Customizer
 */
class MagazineNP_Customizer
{

    /**
     * The single instance of the class.
     *
     * @var MagazineNP_Customizer
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main MagazineNP_Customizer Instance.
     *
     * Ensures only one instance of MagazineNP_Customizer is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return MagazineNP_Customizer - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();
        self::$_instance->hooks();

        return self::$_instance;
    }

    public function hooks()
    {

        add_action('customize_register', array($this, 'register_panel'));
        add_action('customize_register', array($this, 'register_control'));
        add_action('customize_register', array($this, 'customize_options'));
        add_action('customize_register', array($this, 'move_default_options'));

        add_action('customize_preview_init', array($this, 'customize_enqueue'));


        add_action('customize_register', array($this, 'sections'));
        add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);


    }

    public function sections($manager)
    {

    }

    public function enqueue_control_scripts()
    {


        wp_enqueue_script('magazinenp-theme-extend-customizer-js', get_template_directory_uri() . '/core/customizer/assets/js/extend-customizer.js', array(), '', true);
        wp_enqueue_style('magazinenp-theme-extend-customizer-css', get_template_directory_uri() . '/core/customizer/assets/css/extend-customizer.css', array(), MAGAZINENP_THEME_VERSION);
    }

    /**
     * Register custom controls
     *
     * @param WP_Customize_Manager $wp_customize Manager instance.
     */
    public function register_panel($wp_customize)
    {
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/class-magazinenp-customizer-panel.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/class-magazinenp-customizer-section.php';

        $wp_customize->register_panel_type('MagazineNP_Customizer_Panel');
        $wp_customize->register_section_type('MagazineNP_Customizer_Section');

    }

    public function register_control($wp_customize)
    {
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-buttonset.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-switch.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-sortable.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-radio.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-dropdown-category.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-slider.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/controls/class-magazinenp-customizer-control-heading.php';

        $wp_customize->register_control_type('MagazineNP_Customizer_Control_Buttonset');
        $wp_customize->register_control_type('MagazineNP_Customizer_Control_Switch');
        //$wp_customize->register_control_type('MagazineNP_Customizer_Control_Sortable');
        $wp_customize->register_control_type('MagazineNP_Customizer_Control_Radio');
        $wp_customize->register_control_type('MagazineNP_Customizer_Control_Dropdown_Category');
        $wp_customize->register_control_type('MagazineNP_Customizer_Control_Slider');
    }

    public function customize_enqueue()
    {
        $options = array();

        $options = apply_filters('magazinenp_customizer_preview_localize_object', $options);

    }

    public function move_default_options($wp_customize)
    {

        $wp_customize->get_control('header_image')->section = 'magazinenp_section_header_media_options';

        $wp_customize->get_section('static_front_page')->priority = 10;


    }

    public function customize_options($wp_customize)
    {

        $default = magazinenp_get_default_options();

        // Theme Panel
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/panels/theme-panel.php';

        // Sections

        // Top Header Options

        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-base-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-header-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-featured-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-home-page-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-blog-archive-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-single-post-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-single-page-options.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sections/theme-footer-options.php';


    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes()
    {
        require_once MAGAZINENP_THEME_DIR . '/core/customizer/core.php';


        require_once MAGAZINENP_THEME_DIR . 'core/customizer/active-callback.php';
        require_once MAGAZINENP_THEME_DIR . 'core/customizer/sanitization.php';


    }


}

MagazineNP_Customizer::instance();