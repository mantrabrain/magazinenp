<?php
$post_block_post_category = absint(magazinenp_get_option('post_block_post_category'));

$is_carousel = apply_filters('magazinenp_enable_post_block_carousel', false);

$total_post = $is_carousel ? 8 : 4;

$magazinenp_post_block_post_args = array(
	'posts_per_page' => $total_post,
	'post__not_in' => get_option('sticky_posts'),
	'post_type' => array(
		'post'
	),
);
if (magazinenp_get_option('post_block_post_from') == 'category') {
	$magazinenp_post_block_post_args['category__in'] = $post_block_post_category;
}

$magazinenp_post_block_post = new WP_Query($magazinenp_post_block_post_args);

$grid_class = $is_carousel ? 'post-col item' : 'col-sm-6 col-lg-3 post-col';
?>

<section class="related-posts">
	<?php magazinenp_title_html('h2', 'magazinenp-title', magazinenp_get_option('post_block_heading')); ?>
	<div class="row gutter-parent-10">
		<?php
		echo $is_carousel ? '<div class="owl-carousel mnp-owl-before">' : '';
		while ($magazinenp_post_block_post->have_posts()) {
			$magazinenp_post_block_post->the_post(); ?>
			<div class="<?php echo esc_attr($grid_class); ?>">
				<div class="mnp-post-boxed">
					<div class="mnp-post-image-wrap">
						<div class="featured-mnp-post-image">
							<a href="<?php the_permalink(); ?>" class="mnp-post-image"
							   style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></a>
						</div>
						<?php if ((boolean)magazinenp_get_option('show_post_block_post_category')) { ?>

							<div class="entry-meta category-meta">
								<?php magazinenp_category_list(); ?>
							</div>
						<?php } ?>
					</div>
					<div class="post-content">
						<?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
						<?php if ('post' === get_post_type() && (boolean)magazinenp_get_option('show_post_block_post_meta')) { ?>
							<div class="entry-meta">
								<?php magazinenp_posted_on(); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php }
		// Reset Post Data
		wp_reset_postdata(); ?>
		<?php
		echo $is_carousel ? '</div>' : '';
		?>
	</div>
</section>
