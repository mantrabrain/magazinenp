<section class="featured-section">
    <div class="container">
        <?php
        if (magazinenp_banner_display()) {
            ?>
            <div class="row gutter-parent-10">
                <?php
                $magazinenp_banner_ordering = magazinenp_banner_ordering('banner_ordering');
                foreach ($magazinenp_banner_ordering as $banner_order_key => $banner_order_args) {
                    $name = '';
                    $featured_wrap_class = '';
                    $disabled = isset($banner_order_args['disable']) ? (boolean)$banner_order_args['disable'] : false;
                    if (!$disabled) {
                        switch ($banner_order_key) {
                            case "slider":
                                $name = "slider";
                                $featured_wrap_class = magazinenp_banner_class('slider', $magazinenp_banner_ordering);
                                break;
                            case "post_col_1":
                                $name = "post-col1";
                                $featured_wrap_class = magazinenp_banner_class('post_col_1', $magazinenp_banner_ordering);
                                break;
                            case "post_col_2":
                                $name = "post-col2";
                                $featured_wrap_class = magazinenp_banner_class('post_col_2', $magazinenp_banner_ordering);
                                break;
                        }

                        ?>
                        <div class="<?php echo esc_attr($featured_wrap_class) ?>">
                            <?php
                            get_template_part('template-parts/header/featured/' . $name);
                            ?>
                        </div><!-- <?php echo $featured_wrap_class ?> -->
                    <?php }
                } ?>
            </div><!-- .row -->

            <?php
        }
        if (magazinenp_post_block_display()) {

            get_template_part('template-parts/header/featured/related');
        }
        ?>
    </div>
</section>