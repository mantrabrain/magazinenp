<?php
$mid_header_class = 'mnp-mid-header';
$mid_header_class .= magazinenp_get_option('mid_header_background_image') !== '' ? ' mid-header-bg-enable mnp-dark-overlay' : '';
$mid_header_background = magazinenp_get_option('mid_header_background_image');
$mid_header_class = apply_filters('magazinenp_mid_header_class', $mid_header_class);
?>
<div class="<?php echo esc_attr($mid_header_class); ?>" <?php if ($mid_header_background !== '') { ?> style="background-image:url('<?php echo esc_url($mid_header_background); ?>');"<?php } ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mnp-branding-wrap">
                <div class="site-branding navbar-brand">
                    <?php
                    magazinenp_logo();

                    if (is_page_template('templates/front-page-template.php') || is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                        ?>
                        <h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h2>
                    <?php
                    endif;
                    $magazinenp_description = get_bloginfo('description', 'display');
                    if ($magazinenp_description || is_customize_preview()) :
                        ?>
                        <p class="site-description"><?php echo $magazinenp_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (magazinenp_get_option('mid_header_adv_image') !== '') { ?>
                <div class="col-lg-8 navbar-ad-section">
                    <?php if (magazinenp_get_option('mid_header_adv_link') !== '') { ?>
                    <a href="<?php echo esc_url(magazinenp_get_option('mid_header_adv_link')); ?>"
                       class="magazinenp-ad-728-90" target="_blank">
                        <?php } ?>
                        <img class="img-fluid"
                             src="<?php echo esc_url(magazinenp_get_option('mid_header_adv_image')); ?>"
                             alt="<?php esc_attr_e('Banner Add', 'magazinenp'); ?>">
                        <?php if (magazinenp_get_option('mid_header_adv_link') !== '') { ?>
                    </a>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
