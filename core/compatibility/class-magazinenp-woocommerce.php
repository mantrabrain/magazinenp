<?php

if (!class_exists('WooCommerce')) {
	return;
}

/**
 * MagazineNP WooCommerce Compatibility
 */
if (!class_exists('MagazineNP_Woocommerce')) :

	/**
	 * MagazineNP WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class MagazineNP_Woocommerce
	{

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		private $defaults;

		/**
		 * Initiator
		 */
		public static function get_instance()
		{
			if (!isset(self::$instance)) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct()
		{

			add_action('after_setup_theme', array($this, 'support'));

			remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
			remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

			// Add custom wrappers.
			add_action('woocommerce_before_main_content', array($this, 'output_content_wrapper'));
			add_action('woocommerce_after_main_content', array($this, 'output_content_wrapper_end'));

			remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);



		}

		public function support()
		{
			add_theme_support('woocommerce');
		}

		public function output_content_wrapper()
		{

			?>
			<div id="content"
				 class="site-content">
			<div class="container">
			<?php
			$mnp_row_class = 'row justify-content-center site-content-row';
			?>
		<div class="<?php echo esc_attr($mnp_row_class); ?>">
			<?php
			$class = apply_filters('magazinenp_primary_layout_class', 'content-area');

			echo '<!-- #start of primary div--><div id="primary" class="' . esc_attr($class) . '"> ';
			echo '<div class="post">';

		}

		public function output_content_wrapper_end()
		{
			$base_sidebar_layout = magazinenp_get_option('base_sidebar_layout');

			echo '</div></div><!-- primary div -->';
			switch ($base_sidebar_layout) {
				case "left":
					get_sidebar('left');
					break;
				case "right":
					get_sidebar();
					break;
				case "fullwidth":
				case "nosidebar":
					break;
			}
			echo '</div><!-- row -->
		</div><!-- .container -->
	</div><!-- #content .site-content-->';
		}

	}

endif;

if (apply_filters('magazinenp_enable_woocommerce_integration', true) && class_exists('WooCommerce')) {
	MagazineNP_Woocommerce::get_instance();
}
