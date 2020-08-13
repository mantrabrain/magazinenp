<?php
/**
 * MagazineNP_Footer_Hooks setup
 *
 * @package MagazineNP_Footer_Hooks
 * @since 1.0.0
 */

/**
 * Main MagazineNP_Footer_Hooks Class.
 *
 * @class MagazineNP_Footer_Hooks
 */
class MagazineNP_Footer_Hooks
{

	public function __construct()
	{

		add_action('magazinenp_footer', array($this, 'related_posts'), 15);
		add_action('magazinenp_footer', array($this, 'you_missed'), 16);
		add_action('magazinenp_footer', array($this, 'footer'), 20);
		add_action('magazinenp_footer', array($this, 'page_html_close'), 25);

	}


	public function related_posts()
	{
		if (is_singular('post')) {
			get_template_part('template-parts/footer/related-posts');
		}
	}

	public function you_missed()
	{
		if (magazinenp_you_missed_display()) {
			get_template_part('template-parts/footer/you-missed');
		}
	}

	public function page_html_close()
	{

		echo '</div><!-- #page -->';
	}

	public function footer()
	{
		get_template_part('template-parts/footer/footer');

	}


}

new MagazineNP_Footer_Hooks();
