<?php

class MagazineNP_Column_Post_Widget extends MagazineNP_Widget_Base
{
	function __construct()
	{
		$widget_ops = array(
			'classname' => 'magazinenp-column-post-widget',
			'description' => __('Column Posts', 'magazinenp')
		);
		parent::__construct(false, $name = __('MNP::Column Post', 'magazinenp'), $widget_ops);
	}

	function widget_fields()
	{
		$fields = array(
			'widget_title' => array(
				'name' => 'widget_title',
				'title' => esc_html__('Title', 'magazinenp'),
				'type' => 'text',
				'default' => esc_html__('Column Post', 'magazinenp'),

			),
			'number_of_post' => array(
				'name' => 'number_of_post',
				'title' => esc_html__('Number of posts', 'magazinenp'),
				'type' => 'number',
				'default' => 4,

			),
			'hide_category' => array(
				'name' => 'hide_category',
				'title' => esc_html__('Hide Category', 'magazinenp'),
				'type' => 'checkbox',
				'default' => false,

			),
			'hide_post_meta' => array(
				'name' => 'hide_post_meta',
				'title' => esc_html__('Hide Post Meta', 'magazinenp'),
				'type' => 'checkbox',
				'default' => false,

			)


		);

		return $fields;
	}

	function widget($args, $instance_arg)
	{

		$instance = MagazineNP_Widget_Validation::instance()->validate($instance_arg, $this->widget_fields());
		$widget_title = apply_filters('widget_title', $instance['widget_title'], $instance, $this->id_base);
		$number = isset($instance['number_of_post']) ? absint($instance['number_of_post']) : 4;
		$hide_category = isset($instance['hide_category']) ? (boolean)$instance['hide_category'] : false;
		$hide_post_meta = isset($instance['hide_post_meta']) ? (boolean)$instance['hide_post_meta'] : false;
		$get_featured_posts = new WP_Query(
			array(
				'posts_per_page' => $number,
				'post_type' => array('post'),
				'post__not_in' => get_option('sticky_posts'),
			)
		);

		echo $args['before_widget']; ?>

		<?php if (!empty($widget_title)) {
		echo $args['before_title'] . $widget_title . $args['after_title'];
	} ?>
		<div class="row gutter-parent-14">
			<?php if ($number > 0) {
				$i = 0;
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post(); ?>
					<div class="col-md-6 post-col">
						<div class="mnp-post-boxed inlined clearfix">
							<?php if (has_post_thumbnail()) { ?>
								<div class="mnp-post-image-wrap">
									<a href="<?php the_permalink(); ?>" class="mnp-post-image"
									   style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></a>
								</div>
							<?php } ?>
							<div class="post-content">
								<?php if (!$hide_category) { ?>
									<div class="entry-meta category-meta">
										<?php magazinenp_category_list(); ?>
									</div><!-- .entry-meta -->
								<?php } ?>
								<?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
								<?php
								if (!$hide_post_meta) { ?>

									<div class="entry-meta">
										<?php magazinenp_posted_on(); ?>
									</div>
								<?php } ?>

							</div>
						</div><!-- mnp-post-boxed -->
					</div><!-- col-md-6 -->
					<?php $i++;
				endwhile;
				// Reset Post Data
				wp_reset_postdata();
			} ?>
		</div><!-- .row .gutter-parent-14-->

		<?php echo $args['after_widget'] . '<!-- .widget_recent_post -->';
	}
}
