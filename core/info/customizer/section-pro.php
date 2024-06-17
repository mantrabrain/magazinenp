<?php

class MagazineNP_Section_Pro_Customizer
{

	public function __construct()
	{
		add_action('customize_register', array($this, 'pro_customizer'));
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);


	}

	public function pro_customizer($manager)
	{

		require_once "control/section-pro.php";
		// Register custom section types.
		$manager->register_section_type('MagazineNP_Customizer_Control_Section_Pro');

		// Register sections.
		$manager->add_section(
			new MagazineNP_Customizer_Control_Section_Pro(
				$manager,
				'magazinenp-pro',
				array(
					'pro_text' => esc_html__('Get More Features in MagazineNP Pro', 'magazinenp'),
					'pro_url' => 'https://mantrabrain.com/themes/magazinenp-pro/?utm_source=magazinenp-customizer&utm_medium=view-pro&utm_campaign=upgrade',
					'priority' => 0
				)
			)
		);
	}


	public function enqueue_control_scripts()
	{
		$script_uri = MAGAZINENP_THEME_URI . 'core/info/customizer/control/';

		wp_enqueue_script('magazinenp-customizer-pro-control-js', $script_uri . 'pro.js', array('customize-controls'));
		wp_enqueue_style('magazinenp-customizer-pro-control-css', $script_uri . 'pro.css');

	}


}

if (!class_exists('MagazineNP_Pro')) {
	new MagazineNP_Section_Pro_Customizer();
}


