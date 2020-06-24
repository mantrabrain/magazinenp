<?php

class MagazineNP_Grid_Post_Widget extends MagazineNP_Widget_Base
{

    function __construct()
    {
        $widget_ops = array(
            'classname' => 'magazinenp-grid-post-widget',
            'description' => __('Grid Post Widget', 'magazinenp')
        );
        parent::__construct(false, $name = __('MNP::Grid Post', 'magazinenp'), $widget_ops);
    }

    function widget_fields()
    {
        $fields = array(
            'widget_title' => array(
                'name' => 'widget_title',
                'title' => esc_html__('Title', 'magazinenp'),
                'type' => 'text',
                'default' => esc_html__('Grid Post', 'magazinenp'),

            ),
            'post_from' => array(
                'name' => 'post_from',
                'title' => esc_html__('Post From', 'magazinenp'),
                'type' => 'radio',
                'default' => 'latest',
                'choices' => array(
                    'latest' => esc_html__('Latest Post', 'magazinenp'),
                    'category' => esc_html__('Posts From Category', 'magazinenp'),
                )

            ),
            'category' => array(
                'name' => 'category',
                'title' => esc_html__('Category', 'magazinenp'),
                'type' => 'dropdown_categories'

            ),
            'layout' => array(
                'name' => 'layout',
                'title' => esc_html__('Layout', 'magazinenp'),
                'type' => 'select',
                'options' => array(
                    'layout1' => esc_html__('Layout 1', 'magazinenp'),
                    'layout2' => esc_html__('Layout 2', 'magazinenp'),
                )

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

        $category = isset($instance['category']) ? $instance['category'] : '';

        $post_from = empty($instance['post_from']) ? '' : $instance['post_from'];

        $widget_title = apply_filters('widget_title', $instance['widget_title'], $instance, $this->id_base);

        $layout = isset($instance['layout']) ? $instance['layout'] : 'layout1';

        $hide_category = isset($instance['hide_category']) ? (boolean)$instance['hide_category'] : false;

        $hide_post_meta = isset($instance['hide_post_meta']) ? (boolean)$instance['hide_post_meta'] : false;

        $mnp_query_args= array();

		$mnp_query_args = array(
            'posts_per_page' => 5,
            'post_type' => array('post'),
            'post__not_in' => get_option('sticky_posts'),
        );
        if ($post_from == 'category') {
            $mnp_query_args['category__in'] = $category;
        }

        $get_featured_posts = new WP_Query($mnp_query_args);

        echo $args['before_widget'];
        if (!empty($widget_title)) {
            echo $args['before_title'] . $widget_title . $args['after_title'];
        } ?>
        <div class="row gutter-parent-14<?php echo ($layout == 'layout1') ? ' post-vertical' : ' post-horizontal'; ?>">
            <div class="<?php echo ($layout == 'layout1') ? 'col-md-6 ' : 'col-12 '; ?>first-col">
                <?php
                $i = 1;
                while ($get_featured_posts->have_posts()):
                $get_featured_posts->the_post(); ?>
                <?php if ($i == 1) { ?>
                <div class="mnp-post-boxed main-post clearfix<?php echo ($layout == 'layout2') ? ' inlined' : ''; ?>">
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
                        <?php if (!$hide_post_meta) { ?>
                            <div class="entry-meta">
                                <?php magazinenp_posted_on(); ?>
                            </div>
                        <?php } ?>

                        <div class="entry-content">
                            <?php magazinenp_the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </div>
                </div><!-- mnp-post-boxed -->
            </div>
            <div class="<?php echo ($layout == 'layout1') ? 'col-md-6 ' : 'col-12 '; ?>second-col">
                <?php if ($layout == 'layout2') { ?>
                <div class="row">
                    <?php }
                    } else {
                        if ($layout == 'layout2') { ?>
                            <div class="col-md-6 post-col">
                        <?php } ?>
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

                                <?php if (!$hide_post_meta) { ?>

                                    <div class="entry-meta">
                                        <?php magazinenp_posted_on(); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div><!-- .mnp-post-boxed -->
                        <?php if ($layout == 'layout2') { ?>
                            </div><!-- .col-md-6 .post-col -->
                        <?php }
                    }
                    $i++;
                    endwhile;
                    // Reset Post Data
                    wp_reset_postdata(); ?>
                    <?php if ($layout == 'layout2') { ?>
                </div><!-- .row -->
            <?php } ?>
            </div>
        </div><!-- .row gutter-parent-14 -->

        <?php echo $args['after_widget'] . '<!-- .widget_featured_post -->';
    }

}
