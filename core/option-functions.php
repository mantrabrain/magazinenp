<?php
// Customizer option function
if (!function_exists('magazinenp_base_sidebar_layout')) {
    function magazinenp_base_sidebar_layout()
    {
        global $post;

        if (isset($post->ID) && (is_single() || is_page())) {

            $base_sidebar_layout = get_post_meta($post->ID, 'magazinenp_base_sidebar_layout', true);

            $base_sidebar_layout = $base_sidebar_layout == '' || is_null($base_sidebar_layout) ? magazinenp_get_option('base_sidebar_layout') : $base_sidebar_layout;

        } else {


            $base_sidebar_layout = magazinenp_get_option('base_sidebar_layout');

        }

        return $base_sidebar_layout;
    }
}

if (!function_exists('magazinenp_page_sidebar')) {
    function magazinenp_page_sidebar($default)
    {
        global $post;

        if (isset($post->ID) && (is_single() || is_page())) {

            $sidebar = get_post_meta($post->ID, 'magazinenp_single_sidebar', true);

            global $wp_registered_sidebars;

            $all_sidebars = array_keys($wp_registered_sidebars);

            $sidebar = $sidebar == '' || is_null($sidebar) || !in_array($sidebar, $all_sidebars) ? $default : $sidebar;

        } else {
            $sidebar = $default;
        }


        return $sidebar;
    }
}
if (!function_exists('magazinenp_logo')) {
    function magazinenp_logo()
    {
        global $post;

        if (isset($post->ID) && (is_single() || is_page())) {

            $logo_id = absint(get_post_meta($post->ID, 'magazinenp_single_logo', true));

            if ($logo_id > 0) {
                $attachment_url = wp_get_attachment_url($logo_id);
                echo '<a href="' . esc_url(home_url()) . '" class="custom-logo-link" rel="home"><img src="' . esc_url($attachment_url) . '" class="custom-logo" alt="' . get_bloginfo() . '"></a>';
            } else {
                the_custom_logo();
            }


        } else {
            the_custom_logo();
        }
    }
}
if (!function_exists('magazinenp_bottom_header_background')) {
    function magazinenp_bottom_header_background($default)
    {
        global $post;

        if (isset($post->ID) && (is_single() || is_page())) {

            $color = get_post_meta($post->ID, 'magazinenp_bottom_header_background_color', true);

            $color = $color == '' || is_null($color) ? $default : $color;

        } else {
            $color = $default;
        }


        return $color;
    }
}

