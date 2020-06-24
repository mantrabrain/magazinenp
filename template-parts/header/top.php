<div class="mnp-top-header<?php echo (has_nav_menu('top-bar-nav')) ? ' mnp-top-header-nav-on' : ''; ?>">
    <div class="container">
        <div class="row gutter-10">
            <?php
            $enable_date = (boolean)magazinenp_get_option('show_date_on_topbar');
            if ($enable_date) {
                ?>
                <div class="col col-sm mnp-date-section">
                    <div class="date">
                        <ul>
                            <li>
                                <i class="mnp-icon fa fa-clock"></i>&nbsp;&nbsp;<?php echo esc_html(date_i18n("l, F j, Y")); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <?php if ((boolean)magazinenp_get_option('show_social_profile_on_topbar')) {

                $social_class = magazinenp_get_option('social_profile_style') == 'official' ? 'official' : '';
                ?>
                <div class="col-auto mnp-social-profiles <?php echo esc_attr($social_class); ?>">
                    <?php magazinenp_social_profiles(); ?>
                </div>
            <?php }

            if (has_nav_menu('top-bar-nav')) { ?>
                <div class="col-md-auto mnp-top-header-nav order-md-2">
                    <button class="mnp-top-header-nav-menu-toggle"><?php esc_html_e('Responsive Menu', 'magazinenp'); ?></button>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'top-bar-nav',
                        'container' => '',
                        'depth' => 1,
                        'items_wrap' => '<ul class="clearfix">%3$s</ul>',
                    )); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>