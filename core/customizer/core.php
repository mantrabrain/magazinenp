<?php
function magazinenp_get_default_options($key = '')
{

	$defaults = array();

	// Base

	$defaults['base_sidebar_layout'] = 'right';
	$defaults['content_layout'] = 'full_width_content_layout';

	// Breadccrumbs
	$defaults['show_breadcrumb'] = true;

	// Date
	$defaults['date_format'] = 'theme-default';
	$defaults['global_date_title'] = 'post-title';

	// Title Style
	$defaults['title_style'] = 'style4';

	// Image Effect
	$defaults['image_hover_effect'] = 'theme_default';

	// Social Links

	$defaults['social_profile_style'] = 'official';

	$magazinenp_social_profiles_config = magazinenp_social_profiles_config();

	foreach ($magazinenp_social_profiles_config as $config_key => $config) {
		$default_social = isset($config['default']) ? $config['default'] : '';
		$defaults['social_profile_' . $config_key] = $default_social;
	}
	$defaults['enable_sidebar_sticky'] = true;

	// Go to Top
	$defaults['enable_go_to_top'] = true;


	// Top Bar
	$defaults['show_date_on_topbar'] = true;
	$defaults['show_social_profile_on_topbar'] = false;


	// Mid Bar
	$defaults['mid_header_background_image'] = '';
	$defaults['mid_header_adv_image'] = '';
	$defaults['mid_header_adv_link'] = '';

	// Bottom Bar
	$defaults['bottom_header_show_home_icon'] = true;
	$defaults['bottom_header_show_search_icon'] = true;
	$defaults['bottom_header_sticky_status'] = true;
	$defaults['bottom_header_border_status'] = true;

	//  Popular Tags
	$defaults['popular_tags_heading'] = esc_html__('Popular Tags', 'magazinenp');
	$defaults['popular_tags_display'] = 'home';

	// news ticker
	$defaults['news_ticker_heading'] = esc_html__('News Flash', 'magazinenp');;

	$defaults['news_ticker_post_from'] = 'latest';

	$defaults['news_ticker_post_category'] = '';

	$defaults['news_ticker_display'] = 'home';

	$defaults['news_ticker_thumbnail_type'] = 'circle';

	// end of ticker

	$defaults['header_ordering'] = magazinenp_header_ordering();

	// Featured Section

	// Banner
	$defaults['show_banner_section'] = false;
	$defaults['banner_display'] = 'home';
	$defaults['banner_ordering'] = magazinenp_banner_ordering();
	$defaults['banner_slider_heading'] = '';
	$defaults['banner_slider_post_from'] = 'latest';
	$defaults['banner_slider_post_category'] = '';
	$defaults['show_banner_slider_post_category'] = true;
	$defaults['show_banner_slider_post_meta'] = true;

	// post col 1
	$defaults['post_col_1_heading'] = '';
	$defaults['post_col_1_post_from'] = 'latest';
	$defaults['post_col_1_post_category'] = '';
	$defaults['show_post_col_1_post_category'] = true;
	$defaults['show_post_col_1_post_meta'] = true;


	// post col 2
	$defaults['post_col_2_heading'] = '';
	$defaults['post_col_2_post_from'] = 'latest';
	$defaults['post_col_2_post_category'] = '';
	$defaults['show_post_col_2_post_category'] = true;
	$defaults['show_post_col_2_post_meta'] = true;

	// start of post block
	$defaults['show_post_block_section'] = false;
	$defaults['post_block_heading'] = esc_html__('Popular Stories', 'magazinenp');
	$defaults['post_block_display'] = 'home';
	$defaults['post_block_post_from'] = 'latest';
	$defaults['post_block_post_category'] = '';
	$defaults['show_post_block_post_category'] = true;
	$defaults['show_post_block_post_meta'] = true;

	// Blog Archive
	// Content & Meta
	$defaults['show_category_on_blog_archive_page'] = true;
	$defaults['show_post_post_meta_on_blog_archive_page'] = true;
	$defaults['show_excerpt_on_blog_archive_page'] = true;
	//Pagination
	$defaults['blog_archive_pagination_style'] = 'numeric';

	// Single Post
	$defaults['single_post_content_order'] = magazinenp_post_content_ordering();
	$defaults['single_post_date_format'] = 'global';
	$defaults['show_author_box'] = false;
	// Related Post
	$defaults['show_related_posts'] = true;
	$defaults['related_posts_heading'] = esc_html__('Related Posts', 'magazinenp');
	$defaults['related_posts_type'] = 'automatic';
	$defaults['automatic_related_posts_from'] = 'category';
	$defaults['related_posts_selected_category'] = '';
	$defaults['single_post_related_posts_count'] = 4;
	$defaults['single_post_related_posts_columns'] = 4;
	$defaults['related_posts_order_by'] = 'date';
	$defaults['related_posts_ordering_order'] = 'desc';

	// Single Page
	$defaults['show_page_feature_image'] = true;
	$defaults['show_page_title'] = true;

	// start of post block
	$defaults['show_you_missed_section'] = false;
	$defaults['you_missed_heading'] = esc_html__('You Missed', 'magazinenp');
	$defaults['you_missed_display'] = 'all';
	$defaults['you_missed_post_from'] = 'latest';
	$defaults['you_missed_post_category'] = '';
	$defaults['show_you_missed_post_category'] = true;
	$defaults['show_you_missed_post_meta'] = true;


	// Footer
	$defaults['bottom_footer_copyright_text'] = esc_html__('Copyright &copy; All rights reserved', 'magazinenp');
	$defaults['show_social_profile_on_footer'] = true;
	$defaults['footer_background_image'] = '';


	//HomePage
	$defaults['enable_theme_style_homepage'] = false;

	$defaults = apply_filters('magazinenp_customizer_defaults', $defaults);


	if ('' !== $key) {

		if (isset($defaults[$key])) {

			return $defaults[$key];
		}
		return '';
	}

	return $defaults;

}
