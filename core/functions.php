<?php
/**
 * MagazineNP functions and definitions
 *
 * This file contains all the functions and it's defination that particularly can't be
 * in other files.
 *
 * @package MagazineNP
 */


if (!function_exists('magazinenp_get_customizer_id')) :

	function magazinenp_get_customizer_id($key = '')
	{
		return MAGAZINENP_THEME_SETTINGS . '_' . $key;
	}
endif;
if (!function_exists('magazinenp_global_layout_options')) :

	function magazinenp_global_layout_options()
	{


		$url = MAGAZINENP_THEME_URI . 'assets/images/icons/';

		return array(
			'right' =>
				array(
					'title' => esc_html__('RIGHT SIDEBAR', 'magazinenp'),
					'image' => $url . 'right-sidebar.png'
				),
			'left' =>
				array(
					'title' => esc_html__('LEFT SIDEBAR', 'magazinenp'),
					'image' => $url . 'left-sidebar.png'
				),
			'nosidebar' =>
				array(
					'title' => esc_html__('NO SIDEBAR', 'magazinenp'),
					'image' => $url . 'no-sidebar.png'
				),
			'fullwidth' =>
				array(
					'title' => esc_html__('FULL WIDTH', 'magazinenp'),
					'image' => $url . 'full-width.png'
				)
		);

	}
endif;

/**
 * Default Option
 */
function magazinenp_get_option($key)
{
	$option_key = MAGAZINENP_THEME_SETTINGS . '_' . $key;

	$default = magazinenp_get_default_options($key);

	$value = get_theme_mod($option_key, $default);

	return $value;

}


if (!function_exists('magazinenp_header_ordering')) {

	function magazinenp_header_ordering($key = '')
	{
		$default_orders = apply_filters(
			'magazinenp_header_ordering',
			array(

				'top_header' =>
					array(
						'title' => esc_html__('Top Bar', 'magazinenp'),
						'disable' => false

					),

				'mid_header' => array(
					'title' => esc_html__('Mid Bar', 'magazinenp'),
					'disable' => false

				),
				'bottom_header' => array(
					'title' => esc_html__('Main Header', 'magazinenp'),
					'disable' => false

				),
				'popular_tags' => array(
					'title' => esc_html__('Popular Tags', 'magazinenp'),
					'disable' => false

				),
				'news_ticker' => array(
					'title' => esc_html__('News Ticker', 'magazinenp'),
					'disable' => false

				),


			)
		);

		if (empty($key)) {

			return $default_orders;
		}

		$ordering = magazinenp_get_option($key);

		try {

			$ordering = !empty($ordering) && is_string($ordering) ? json_decode($ordering, true) : $default_orders;

		} catch (Exception $e) {

			$ordering = $default_orders;
		}

		return apply_filters('magazinenp_header_ordering', $ordering);
	}

}
if (!function_exists('magazinenp_banner_ordering')) {

	function magazinenp_banner_ordering($key = '')
	{
		$default_orders = apply_filters(
			'magazinenp_banner_ordering',
			array(

				'post_col_1' => array(
					'title' => esc_html__('Post Column 1', 'magazinenp'),
					'disable' => false

				),
				'slider' =>
					array(
						'title' => esc_html__('Slider', 'magazinenp'),
						'disable' => false

					),

				'post_col_2' => array(
					'title' => esc_html__('Post Column 2', 'magazinenp'),
					'disable' => false

				),


			)
		);

		if (empty($key)) {

			return $default_orders;
		}

		$ordering = magazinenp_get_option($key);

		try {

			$ordering = !empty($ordering) && is_string($ordering) ? json_decode($ordering, true) : $default_orders;

		} catch (Exception $e) {

			$ordering = $default_orders;
		}

		return apply_filters('magazinenp_banner_ordering', $ordering);
	}

}
if (!function_exists('magazinenp_post_content_ordering')) {

	function magazinenp_post_content_ordering($key = '')
	{
		$default_orders = apply_filters(
			'magazinenp_post_content_ordering',
			array(

				'thumbnail' =>
					array(
						'title' => esc_html__('Featured Image', 'magazinenp'),
						'disable' => false

					),
				'category' => array(
					'title' => esc_html__('Category', 'magazinenp'),
					'disable' => false

				),

				'post_title' => array(
					'title' => esc_html__('Post Title', 'magazinenp'),
					'disable' => false

				),
				'post_meta' => array(
					'title' => esc_html__('Post Meta', 'magazinenp'),
					'disable' => false

				),
				'excerpt' => array(
					'title' => esc_html__('Post Content', 'magazinenp'),
					'disable' => false

				),
				'tags' => array(
					'title' => esc_html__('Tags', 'magazinenp'),
					'disable' => false

				),


			)
		);

		if (empty($key)) {

			return $default_orders;
		}

		$ordering = magazinenp_get_option($key);

		try {

			$ordering = !empty($ordering) && is_string($ordering) ? json_decode($ordering, true) : $default_orders;

		} catch (Exception $e) {

			$ordering = $default_orders;
		}

		return apply_filters('magazinenp_post_content_ordering', $ordering);
	}

}


if (!function_exists('magazinenp_social_profiles')) {
	/**
	 * Functions for Social Profiles.
	 */
	function magazinenp_social_profiles()
	{

		?>

		<ul class="clearfix">
			<?php

			$magazinenp_social_profiles_config = magazinenp_social_profiles_config();

			foreach ($magazinenp_social_profiles_config as $config_key => $config) {
				$social_link = magazinenp_get_option('social_profile_' . $config_key);
				if (!empty($social_link) && '' !== $social_link) {
					?>
					<li><a target="_blank" href="<?php echo esc_url(trim($social_link)); ?>"
						   class="<?php echo esc_attr($config['icon']); ?>"></a></li>
				<?php }
			} ?>
		</ul>
	<?php }
}


if (!function_exists('magazinenp_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function magazinenp_posted_on($mnp_post_from = '')
	{


		$date_format = magazinenp_get_option('date_format');

		if ($mnp_post_from == 'single') {

			$date_format_single = magazinenp_get_option('single_post_date_format');

			$date_format = $date_format_single == '' || $date_format_single == null || $date_format_single == 'global' ? $date_format : $date_format_single;
		}

		$mnp_date_class = 'date';

		if ($date_format == 'theme-default') {

			$mnp_date_class .= ' created-date';

			$time_string = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'magazinenp');

		} else if ($date_format == 'theme-default-updated') {

			$mnp_date_class .= ' updated-date';

			$time_string = human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ' . __('ago', 'magazinenp');

		} else if ($date_format == 'wp-default-updated') {

			$mnp_date_class .= ' updated-date';

			$time_string = get_the_modified_date(get_option('date_format'));

		} else if ($date_format == 'wp-default-datetime') {

			$mnp_date_class .= ' created-date';

			$time_string = get_the_time(get_option('date_format')) . ' ' . get_the_time(get_option('time_format'));

		} else if ($date_format == 'wp-default-updated-datetime') {

			$mnp_date_class .= ' updated-date';

			$time_string = get_the_modified_date(get_option('date_format')) . ' ' . get_the_modified_time(get_option('time_format'));

		} else {

			$mnp_date_class .= ' created-date';

			$time_string = get_the_time(get_option('date_format'));

		}


		$title_string = the_title_attribute('echo=0');

		$title_string_type = magazinenp_get_option('global_date_title');

		if ($title_string_type == 'theme-default') {

			$title_string = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'magazinenp');

		} else if ($title_string_type == 'theme-default-updated') {

			$title_string = human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ' . __('ago', 'magazinenp');

		} else if ($title_string_type == 'wp-default') {

			$title_string = get_the_time(get_option('date_format'));

		} else if ($title_string_type == 'wp-default-updated') {

			$title_string = get_the_modified_date(get_option('date_format'));

		} else if ($title_string_type == 'wp-default-datetime') {

			$title_string = get_the_time(get_option('date_format')) . ' ' . get_the_time(get_option('time_format'));

		} else if ($title_string_type == 'wp-default-updated-datetime') {

			$title_string = get_the_modified_date(get_option('date_format')) . ' ' . get_the_modified_time(get_option('time_format'));

		} else if ($title_string_type == 'none') {

			$title_string = '';

		} else {

			$title_string = the_title_attribute('echo=0');


		}


		$posted_on = '<a href="' . esc_url(get_permalink()) . '"';

		if ('' != $title_string) {

			$posted_on .= ' title="' . esc_attr($title_string) . '"';
		}
		$posted_on .= '><i class="mnp-icon fa fa-clock"></i>' . esc_html($time_string) . '</a> ';

		$byline = '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="mnp-icon fa fa-user-circle"></i>' . esc_html(get_the_author()) . '</a> ';

		echo '<div class="' . esc_attr($mnp_date_class) . '">' . $posted_on . '</div> <div class="by-author vcard author">' . $byline . '</div>'; // WPCS: XSS OK.

	}
endif;

if (!function_exists('magazinenp_breadcrumbs')) :
	/**
	 * Simple Breadcrumbs.
	 *
	 * @since 1.0.0
	 */
	function magazinenp_breadcrumbs()
	{
		if (!function_exists('breadcrumb_trail')) {
			require_once MAGAZINENP_THEME_DIR . '/core/vendor/breadcrumbs/breadcrumbs.php';
		}
		$args = array(
			'container' => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail($args);
	}

endif;


if (!function_exists('magazinenp_banner_class')) {
	function magazinenp_banner_class($type, $magazinenp_banner_ordering)
	{
		$wrap_class = 'col-lg-5 col-xl-6';

		$enabled_items = array();

		foreach ($magazinenp_banner_ordering as $magazinenp_order_key => $magazinenp_order_args) {

			if (isset($magazinenp_order_args['disable']) && !$magazinenp_order_args['disable']) {

				array_push($enabled_items, $magazinenp_order_key);
			}
		}

		if (count($enabled_items) == 3) {

			if ($enabled_items[1] == "slider" && $type != "slider") {

				$wrap_class = 'col-sm-12 col-lg-3pt5 col-xl-3';

			} else if ($enabled_items[1] == "slider" && $type == "slider") {

				$wrap_class = 'col-lg-5 col-xl-6';

			} else if ($type == "slider") {

				$wrap_class = 'col-lg-5 col-xl-6';

			} else {
				$wrap_class = 'col-sm-6 col-lg-3pt5 col-xl-3';

			}
		}
		return $wrap_class;


	}
}

if (!function_exists('magazinenp_banner_display')) :

	function magazinenp_banner_display()
	{
		$show_banner = (boolean)magazinenp_get_option('show_banner_section');

		if ($show_banner) {

			$banner_display = magazinenp_get_option('banner_display');

			if (is_front_page() || ($banner_display == "home-blog" && is_home())) {

				return true;

			}
			return false;

		}
		return false;


	}
endif;
if (!function_exists('magazinenp_post_block_display')) :

	function magazinenp_post_block_display()
	{
		$show = (boolean)magazinenp_get_option('show_post_block_section');

		if ($show) {

			$display = magazinenp_get_option('post_block_display');

			if (is_front_page() || ($display == "home-blog" && is_home())) {

				return true;

			}
			return false;

		}
		return false;


	}
endif;

if (!function_exists('magazinenp_you_missed_display')) :

	function magazinenp_you_missed_display()
	{
		$show = (boolean)magazinenp_get_option('show_you_missed_section');

		if ($show) {

			$display = magazinenp_get_option('you_missed_display');

			if ('all' == $display) {
				return true;
			}

			if (is_front_page() || ($display == "home-blog" && is_home())) {

				return true;

			}
			return false;

		}
		return false;


	}
endif;
if (!function_exists('magazinenp_news_ticker_display')) :

	function magazinenp_news_ticker_display()
	{
		$display = magazinenp_get_option('news_ticker_display');

		if (is_front_page() || ($display == "home-blog" && is_home()) || $display == "all") {

			return true;

		}
		return false;


	}
endif;

if (!function_exists('magazinenp_popular_tags_display')) :

	function magazinenp_popular_tags_display()
	{
		$magazinenp_has_tags = magazinenp_has_tags();
		if (!$magazinenp_has_tags) {
			return false;
		}
		$display = magazinenp_get_option('popular_tags_display');

		if (is_front_page() || ($display == "home-blog" && is_home()) || $display == "all") {

			return true;

		}
		return false;


	}
endif;

if (!function_exists('magazinenp_social_profiles_config')) :

	function magazinenp_social_profiles_config($keyonly = false)
	{

		$social = array(
			'facebook' => array(
				'title' => __('Facebook', 'magazinenp'),
				'icon' => 'fab fa-facebook-f',
				'default' => 'facebook.com'

			),
			'twitter' => array(
				'title' => __('Twitter', 'magazinenp'),
				'icon' => 'fab fa-twitter',
				'default' => 'twitter.com'


			),
			'linkedin' => array(
				'title' => __('Linkedin', 'magazinenp'),
				'icon' => 'fab fa-linkedin',
				'default' => 'linkedin.com'


			),
			'instagram' => array(
				'title' => __('Instagram', 'magazinenp'),
				'icon' => 'fab fa-instagram',
				'default' => 'instagram.com'


			),
			'youtube' => array(
				'title' => __('Youtube', 'magazinenp'),
				'icon' => 'fab fa-youtube',
				'default' => 'youtube.com'


			),
			'pinterest' => array(
				'title' => __('Pinterest', 'magazinenp'),
				'icon' => 'fab fa-pinterest',
				'default' => 'pinterest.com'


			)
		);
		if ($keyonly) {
			return array_keys($social);
		}
		return $social;


	}
endif;

if (!function_exists('magazinenp_has_tags')) {
	function magazinenp_has_tags($taxonomy = 'post_tag', $number = 5)
	{
		$popular_taxonomies = get_terms(array(
			'taxonomy' => $taxonomy,
			'number' => absint($number),
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
		));
		if (isset($popular_taxonomies) && !empty($popular_taxonomies)):
			return true;
		endif;
		return false;
	}
}

if (!function_exists('magazinenp_list_popular_taxonomies')) {
	function magazinenp_list_popular_taxonomies($taxonomy = 'post_tag', $title = '', $number = 5)
	{
		$popular_taxonomies = get_terms(array(
			'taxonomy' => $taxonomy,
			'number' => absint($number),
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
		));

		$html = '';

		if (isset($popular_taxonomies) && !empty($popular_taxonomies)):
			$html .= '<div class="mnp-popular-taxonomy-list clearfix">';
			$html .= '<div class="popular-tags-title-wrap  clearfix">';

			if (!empty($title)):
				$html .= '<strong class="popular-tags-title ">';
				$html .= esc_html($title);
				$html .= '</strong>';
			endif;
			$html .= '</div>';
			$html .= '<div class="popular-tags-tag-items clearfix">';

			$html .= '<ul class="tags-list">';
			foreach ($popular_taxonomies as $tax_term):
				$html .= '<li>';
				$html .= '<a href="' . esc_url(get_term_link($tax_term)) . '">#';
				$html .= $tax_term->name;
				$html .= '</a>';
				$html .= '</li>';
			endforeach;
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '</div>';
		endif;

		echo $html;

	}
}
if (!function_exists('magazinenp_title_html')) {
	function magazinenp_title_html($tag, $class, $title)
	{
		echo '<div class="widget-title-wrapper">';
		echo '<' . esc_attr($tag) . ' class="' . esc_attr($class) . '">';
		echo esc_html($title);
		echo '</' . esc_attr($tag) . '>';
		echo '</div>';

	}
}


if (!function_exists('magazinenp_minify_css')) {

	function magazinenp_minify_css($css = '')
	{

		// Return if no CSS
		if (!$css) return;

		// Normalize whitespace
		$css = preg_replace('/\s+/', ' ', $css);

		// Remove ; before }
		$css = preg_replace('/;(?=\s*})/', '', $css);

		// Remove space after , : ; { } */ >
		$css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);

		// Remove space before , ; { }
		$css = preg_replace('/ (,|;|\{|})/', '$1', $css);

		// Strips leading 0 on decimal values (converts 0.5px into .5px)
		$css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);

		// Strips units if value is 0 (converts 0px to 0)
		$css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);

		// Trim
		$css = trim($css);

		// Return minified CSS
		return $css;

	}
}

if (!function_exists('magazinenp_hover_color')) :
	function magazinenp_hover_color($hex, $steps)
	{
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max(-255, min(255, $steps));

		// Normalize into a six character long hex string
		$hex = str_replace('#', '', $hex);
		if (strlen($hex) == 3) {
			$hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
		}

		// Split into three parts: R, G and B
		$color_parts = str_split($hex, 2);
		$return = '#';

		foreach ($color_parts as $color) {
			$color = hexdec($color); // Convert to decimal
			$color = max(0, min(255, $color + $steps)); // Adjust color
			$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
		}

		return $return;
	}
endif;

if (!function_exists('magazinenp_get_recommanded_plugins')) {

	function magazinenp_get_recommanded_plugins()
	{
		$plugins = array(

			array(
				'name' => esc_html__('Mantra Brain Starter Sites', 'magazinenp'),
				'slug' => 'mantrabrain-starter-sites',
				'required' => false,
			),

		);

		return apply_filters('magazinenp_get_recommanded_plugins', $plugins);
	}
}

if (!function_exists('magazinenp_show_page_title')) {
	function magazinenp_show_page_title()
	{
		$status = (boolean)magazinenp_get_option('show_page_title');

		return $status ? true : false;
	}
}
