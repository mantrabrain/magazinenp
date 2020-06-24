<?php
if (!function_exists('magazinenp_get_color_css')) {

    function magazinenp_get_color_css()
    {
        $css = '';

        $get_categories = get_terms('category', array('hide_empty' => false));

        foreach ($get_categories as $category) {

            $cat_color = esc_attr(get_theme_mod('magazinenp_category_color_' . strtolower($category->term_id), ''));


            $cat_id = esc_attr($category->term_id);

            if (!empty($cat_color)) {

                $cat_hover_color = esc_attr(magazinenp_hover_color($cat_color, '-50'));

                $css .= '.mnp-category-item.mnp-cat-' . $cat_id . '{background-color:' . $cat_color . '!important;} ';

                $css .= '.mnp-category-item.mnp-cat-' . $cat_id . ':hover{background-color:' . $cat_hover_color . '!important;} ';

            }
        }

        $bottom_header_background_color = magazinenp_bottom_header_background('#202f5b');

        if ($bottom_header_background_color != '#202f5b') {

            $css .= '.mnp-bottom-header .navigation-bar-top, .mnp-bottom-header .navigation-bar{background:' . esc_attr($bottom_header_background_color) . '!important} ';

        }
        return $css;


    }
}
if (!function_exists('magazinenp_get_all_dynamic_css')) :

    function magazinenp_get_all_dynamic_css()
    {
        $all_dynamic_css = magazinenp_get_color_css();

        $all_dynamic_css = apply_filters('magazinenp_all_dynamic_css', $all_dynamic_css);

        $all_dynamic_css_min = magazinenp_minify_css($all_dynamic_css);

        return $all_dynamic_css_min;
    }


endif;
if (!function_exists('magazinenp_dynamic_css')) :

    function magazinenp_dynamic_css()
    {
        $all_dynamic_css = magazinenp_get_all_dynamic_css();
        ?>

        <style type="text/css" class="magazinenp-dynamic-css">

            <?php echo $all_dynamic_css ; ?>

        </style>

        <?php
    }

endif;

$load_dynamic_css = apply_filters('magazinenp_theme_dynamic_css_enable', true);

if ($load_dynamic_css) {
    add_action('wp_head', 'magazinenp_dynamic_css', 10);
}

