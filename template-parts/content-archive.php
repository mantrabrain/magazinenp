<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineNP
 */
$archive_page_item_class = 'col-sm-6 ';
$archive_page_item_class .= 'fullwidth' == magazinenp_get_option('base_sidebar_layout') ? ' col-lg-4 ' : ' col-lg-6 ';
$archive_page_item_class .= ' post-col';
?>
<div
	class="<?php echo esc_attr(apply_filters('magazinenp_archive_loop_item_class', $archive_page_item_class)); ?>">

	<div <?php post_class(); ?>>

		<?php
		MagazineNP_Template_Helper::get_post_image();
		MagazineNP_Template_Helper::get_entry_header();
		$show_post_post_meta_on_blog_archive_page = (boolean)magazinenp_get_option('show_post_post_meta_on_blog_archive_page');
		if ($show_post_post_meta_on_blog_archive_page) {
			MagazineNP_Template_Helper::get_entry_meta();
		}
		$show_excerpt_on_blog_archive_page = (boolean)magazinenp_get_option('show_excerpt_on_blog_archive_page');
		if ($show_excerpt_on_blog_archive_page) {
			MagazineNP_Template_Helper::get_entry_content();
		}
		?>
	</div>

</div>
