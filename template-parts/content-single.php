<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineNP
 */

?>

<div <?php post_class(); ?>>

    <?php

    $inside_thumbnail = false;

    $content_order = magazinenp_post_content_ordering('single_post_content_order');

    foreach ($content_order as $order_key => $order_args) {

        $is_disable = isset($order_args['disable']) ? (boolean)$order_args['disable'] : false;
        if (!$is_disable) {
            switch ($order_key) {
                case "post_title":
                    MagazineNP_Template_Helper::get_entry_header();
                    break;
                case "thumbnail":
                    MagazineNP_Template_Helper::get_post_image();
                    break;
                case "post_meta":
                    MagazineNP_Template_Helper::get_entry_meta();
                    break;
                case "excerpt":
                    MagazineNP_Template_Helper::get_entry_content();
                    break;
                case "category":
                    MagazineNP_Template_Helper::get_category_meta();
                    break;
                case "tags":
                    MagazineNP_Template_Helper::get_tags_meta();

                    break;
            }
        }
    }
    ?>
</div>

