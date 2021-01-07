<?php

function magazinenp_author_link()
{
	return sprintf(
		esc_html__('Theme by %s', 'magazinenp'),
		'<a href="' . esc_url('https://mantrabrain.com') . '" target="_blank" title="' . esc_attr__('Mantrabrain', 'magazinenp') . '" >' . esc_html__('Mantrabrain', 'magazinenp') . '</a>'
	);
}

function magazinenp_footer_text()
{
	$allowed_tags = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array(),
			'target' => array()
		)
	);

	$footer_text = magazinenp_get_option('bottom_footer_copyright_text') . ' | ' . magazinenp_author_link();

	echo wp_kses(apply_filters('magazinenp_footer_copyright_text', $footer_text), $allowed_tags);
}

function magazinenp_category_list($tag = 'div')
{

	global $post;

	$post_id = $post->ID;

	$categories_list = get_the_category($post_id);

	$tag = esc_attr($tag);
	echo '<' . $tag . ' class="cat-links">';

	if (!empty($categories_list)) {
		foreach ($categories_list as $cat_data) {
			$cat_name = $cat_data->name;
			$cat_id = $cat_data->term_id;
			$cat_link = get_category_link($cat_id);
			?>
			<a class="mnp-category-item mnp-cat-<?php echo esc_attr($cat_id); ?>"
			   href="<?php echo esc_url($cat_link); ?>" rel="category tag"><?php echo esc_html($cat_name); ?></a>

			<?php
		}
	}
	echo '</' . $tag . '>';
}

if (!function_exists('magazinenp_header_style')) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see magazinenp_custom_header_setup().
	 */
	function magazinenp_header_style()
	{
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style>
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;
if (!function_exists('magazinenp_author_box')):
	function magazinenp_author_box()
	{
		global $post;
		$author_id = $post->post_author;
		$author_avatar = get_avatar($author_id, '125');
		$author_nickname = get_the_author_meta('display_name');
		$show_author_box = (boolean)magazinenp_get_option('show_author_box');
		if (!$show_author_box) {
			return;
		}
		?>
		<div class="magazinenp-author-box clearfix">
			<div class="author-avatar">
				<a class="author-image"
				   href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo $author_avatar; ?></a>
			</div><!-- .author-avatar -->
			<div class="author-desc-wrapper">
				<a class="author-title"
				   href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
					<?php echo esc_html($author_nickname); ?></a>
				<div class="author-description"><p><?php echo get_the_author_meta('description'); ?></p></div>
				<a href="<?php echo esc_url(get_the_author_meta('user_url')); ?>"
				   target="_blank"><?php echo esc_url(get_the_author_meta('user_url')); ?></a>
			</div><!-- .author-desc-wrapper-->
		</div><!--magazinenp-author-wrapper-->
		<?php
	}
endif;

if (!function_exists('magazinenp_get_excerpt')) {
	function magazinenp_get_excerpt()
	{
		return apply_filters('magazinenp_excerpt', get_the_excerpt());
	}
}
if (!function_exists('magazinenp_the_excerpt')) {
	function magazinenp_the_excerpt()
	{
		echo magazinenp_get_excerpt();
	}
}
