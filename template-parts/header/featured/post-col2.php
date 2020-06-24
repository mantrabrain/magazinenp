<?php


$post_col_2_post_category = absint(magazinenp_get_option('post_col_2_post_category'));

$post_col_2_post_args = array(
    'posts_per_page' => 2,
    'post__not_in' => get_option('sticky_posts'),
    'post_type' => array(
        'post'
    ),
);
if (magazinenp_get_option('post_col_2_post_from') == 'category') {
    $post_col_2_post_args['category__in'] = $post_col_2_post_category;
}

$magazinenp_post_col_2_data = new WP_Query($post_col_2_post_args); ?>


<div class="featured-post">
    <div class="title-wrap">
        <?php if (magazinenp_get_option('post_col_2_heading') !== '') { ?>
            <?php magazinenp_title_html('h3', 'magazinenp-title', magazinenp_get_option('post_col_2_heading')); ?>
        <?php } ?>
    </div>
    <div class="row">
        <?php while ($magazinenp_post_col_2_data->have_posts()) {
            $magazinenp_post_col_2_data->the_post(); ?>
            <div class="col-12">
                <div class="post-item post-block">
                    <div class="mnp-post-image-wrap">
                        <a href="<?php the_permalink(); ?>"
                           class="mnp-post-image" <?php if (has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');" <?php } ?>></a>
                    </div>
                    <div class="entry-header">
                        <?php if ((boolean)magazinenp_get_option('show_post_col_2_post_category')) { ?>

                            <div class="entry-meta category-meta">
                                <?php magazinenp_category_list(); ?>
                            </div>
                        <?php }
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                        <?php if ('post' === get_post_type() && (boolean)magazinenp_get_option('show_post_col_2_post_meta')) { ?>
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
