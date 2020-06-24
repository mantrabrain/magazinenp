<?php
class MagazineNP_Customizer_Control_Section_Pro extends WP_Customize_Section
{

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'magazinenp-pro';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @return void
	 * @since  1.0.0
	 * @access public
	 */
	public function json()
	{
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url'] = esc_url_raw($this->pro_url);

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @return void
	 * @since  1.0.0
	 * @access public
	 */
	protected function render_template()
	{ ?>
		<li id="accordion-section-{{ data.id }}"
			class="accordion-section control-section control-section-{{ data.type }} cannot-expand control-section-default"
			aria-owns="sub-accordion-section-magazinenp-pro">
			<h3 class="wp-ui-highlight">
				<a href="{{ data.pro_url }}" class="wp-ui-text-highlight" target="_blank" rel="noopener">{{
					data.pro_text }}</a>
			</h3>
		</li>
		<?php
	}
}
