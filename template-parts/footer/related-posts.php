<?php
if ((boolean)magazinenp_get_option('show_related_posts') && is_single() && !is_page()) {

	$related_posts_type = magazinenp_get_option('related_posts_type');

	global $post;

	$number_of_related_posts = magazinenp_get_option('single_post_related_posts_count');

	$magazinenp_single_post_id = $post->ID;

	$related_posts_order_by = magazinenp_get_option('related_posts_order_by');

	$related_posts_ordering_order = magazinenp_get_option('related_posts_ordering_order');

	$order_field = in_array($related_posts_order_by, array('id', 'date')) ? sanitize_text_field($related_posts_order_by) : 'date';

	$mnp_order = in_array($related_posts_ordering_order, array('asc', 'desc')) ? sanitize_text_field($related_posts_ordering_order) : 'desc';

	$related_args = array(
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'ignore_sticky_posts' => 1,
		'post__not_in' => array($magazinenp_single_post_id),
		'posts_per_page' => absint($number_of_related_posts),
		'post_type' => array(
			'post'
		),
		'order' => $mnp_order,
		'orderby' => $order_field,

	);
	if ($related_posts_type === 'automatic') {

		$automatic_related_posts_from = magazinenp_get_option('automatic_related_posts_from');

		if ($automatic_related_posts_from == 'tag') {

			$tags = wp_get_post_tags($magazinenp_single_post_id);
			if ($tags) {
				$tag_ids = array();
				foreach ($tags as $tag_ed) {
					$tag_ids[] = $tag_ed->term_id;
				}
				$related_args['tag__in'] = $tag_ids;
			}
		} else {
			$categories = get_the_category($magazinenp_single_post_id);
			if ($categories) {
				$category_ids = array();
				foreach ($categories as $category_ed) {
					$category_ids[] = $category_ed->term_id;
				}
				$related_args['category__in'] = $category_ids;
			}
		}
	} else if ($related_posts_type == 'category') {

		$related_posts_category = absint(magazinenp_get_option('related_posts_selected_category'));

		if ($related_posts_category > 0) {
			$related_args['category__in'] = $related_posts_category;
		}


	}
	$magazinenp_related_post_query = new WP_Query($related_args);

	$columns = absint(magazinenp_get_option('single_post_related_posts_columns'));

	$col_class = 'col-lg-3';

	switch ($columns) {
		case 1:
			$col_class = 'col-lg-12';
			break;
		case 2:
			$col_class = 'col-lg-6';
			break;
		case 3:
			$col_class = 'col-lg-4';
			break;
		case 4:
			$col_class = 'col-lg-3';
			break;
		default:
			$col_class = 'col-lg-3';
			break;

	}

	if ($magazinenp_related_post_query->have_posts()):

		?>

		<div class="mnp-related-posts">
			<div class="container">
				<section class="related-posts">
					<?php magazinenp_title_html('h2', 'magazinenp-title', magazinenp_get_option('related_posts_heading')); ?>
					<div class="row gutter-parent-14">
						<?php while ($magazinenp_related_post_query->have_posts()) {
							$magazinenp_related_post_query->the_post(); ?>
							<div class="col-sm-6 <?php echo esc_attr($col_class) ?>">
								<div class="mnp-post-boxed">

									<div class="mnp-post-image-wrap">
										<div class="featured-mnp-post-image">
											<a href="<?php the_permalink(); ?>" class="mnp-post-image"
											   style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></a>
										</div>
										<div class="entry-meta category-meta">
											<?php magazinenp_category_list(); ?>
										</div>
									</div>

									<div class="post-content">
										<?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
										<?php if ('post' === get_post_type()) { ?>
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
					</div>
				</section>
			</div>
		</div>
	<?php endif;
}

