<?php
/**
 * MagazineNP_Miscellaneous_Hooks setup
 *
 * @package MagazineNP_Miscellaneous_Hooks
 * @since 1.0.0
 */

/**
 * Main MagazineNP_Miscellaneous_Hooks Class.
 *
 * @class MagazineNP_Miscellaneous_Hooks
 */
class MagazineNP_Miscellaneous_Hooks
{

    public function __construct()
    {
        add_action('wp_head', array($this, 'pingback_header'));

        add_filter('walker_nav_menu_start_el', array($this, 'menu_desc'), 10, 4);

        add_filter('body_class', array($this, 'body_class'));

    }

    public function pingback_header()
    {
        if (is_singular() && pings_open()) {
            echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
        }
    }

    function body_class($classes)
    {

        // Adds a class of group-blog to blogs with more than 1 published author.
        if (is_multi_author()) {
            $classes[] = 'group-blog';
        }

        $classes[] = 'title-' . magazinenp_get_option('title_style');
        $classes[] = 'magazinenp-image-hover-effect';
        $classes[] = esc_attr(magazinenp_base_sidebar_layout());
        $classes[] = esc_attr(magazinenp_get_option('content_layout'));
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        if (has_header_video() && has_header_image()) {
            if (is_front_page() && is_home()) {
                $classes[] = '';
            } elseif (is_front_page()) {
                $classes[] = '';
            } else {
                $classes[] = 'header-image';
            }
        } elseif (has_header_image()) {
            $classes[] = 'header-image';
        }

        return $classes;
    }

    function menu_desc($item_output, $item, $depth, $args)
    {
        return $item_output;
        if ('primary' == $args->theme_location && $item->description)
            $item_output = str_replace('</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output);

        return $item_output;
    }

}

new MagazineNP_Miscellaneous_Hooks();
