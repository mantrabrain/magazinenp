<?php
$slider_post_category = absint(magazinenp_get_option('banner_slider_post_category'));

$magazinenp_slider_args = array(
    'posts_per_page' => 5,
    'post__not_in' => get_option('sticky_posts'),
    'post_type' => array(
        'post'
    ),
);
if (magazinenp_get_option('banner_slider_post_from') == 'category') {
    $magazinenp_slider_args['category__in'] = $slider_post_category;
}

$magazinenp_slider_data = new WP_Query($magazinenp_slider_args); ?>

<div class="featured-slider post-slider <?php echo (magazinenp_get_option('banner_slider_heading') === '') ? " slider-no-title" : ""; ?>">
    <div class="post-slider-header title-wrap">
        <?php if (magazinenp_get_option('banner_slider_heading') !== '') { ?>
            <?php magazinenp_title_html('h3', 'magazinenp-title', magazinenp_get_option('banner_slider_heading')); ?>

        <?php } ?>
    </div>
    <div class="owl-carousel mnp-owl-before">
        <?php while ($magazinenp_slider_data->have_posts()) {
            $magazinenp_slider_data->the_post(); ?>
            <div class="item">
                <div class="post-item post-block">
                    <div class="mnp-post-image-wrap">
                        <a href="<?php the_permalink(); ?>"
                           class="mnp-post-image" <?php if (has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');" <?php } ?>></a>
                    </div>
                    <div class="entry-header">
                        <?php if ((boolean)magazinenp_get_option('show_banner_slider_post_category')) { ?>
                            <div class="entry-meta category-meta">
                                <?php magazinenp_category_list(); ?>
                            </div>
                        <?php } ?>

                        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                        <?php if ('post' === get_post_type() && (boolean)magazinenp_get_option('show_banner_slider_post_meta')) { ?>
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
</div>