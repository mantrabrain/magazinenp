<?php

$news_ticker_post_category = absint(magazinenp_get_option('news_ticker_post_category'));

$magazinenp_ticker_args = array(
    'posts_per_page' => 5,
    'post__not_in' => get_option('sticky_posts'),
    'post_type' => array(
        'post'
    ),
);
if (magazinenp_get_option('news_ticker_post_from') == 'category') {
    $magazinenp_ticker_args['category__in'] = $news_ticker_post_category;
}

$magazinenp_ticker_data = new WP_Query($magazinenp_ticker_args); ?>

    <div class="mnp-news-ticker">
        <div class="container">
            <div class="row mnp-news-ticker-box clearfix">
                <div class="col-sm-auto">
                    <div class="mnp-news-ticker-label">
                        <div class="mnp-news-ticker-label-wrap">
                            <span class="ticker-label animate">
										<?php echo esc_html(magazinenp_get_option('news_ticker_heading')); ?>
							</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm mnp-ticker-posts">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mnp-news-ticker-slide">
                                <?php while ($magazinenp_ticker_data->have_posts()) {
                                    $magazinenp_ticker_data->the_post();
                                    $thumbnail = get_the_post_thumbnail_url();
                                    $thumb = '<span class="ticker-image rounded-circle" style="background-image: url(\'' . $thumbnail . '\');"></span><span class="news-ticker-title">';
                                    $after = '</span></a></div>';
                                    $before = '<div class="mnp-ticker-item"><a class="mnp-ticker-link" href="' . esc_url(get_permalink()) . '">' . $thumb;
                                    the_title($before, $after);
                                }
                                // Reset Post Data
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
