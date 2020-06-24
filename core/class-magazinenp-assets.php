<?php

class MagazineNP_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'scripts'));

    }

    public function scripts()
    {

        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '4.0.0');
        wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.css');

        wp_register_style('magazinenp-google-fonts', '//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,400i,500,500i,700,700i');
        wp_enqueue_style('magazinenp-google-fonts');

        wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

        // Scripts for Slider
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.min.css', array(), '2.3.4');
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.min.js', array('jquery'), '2.3.4', true);
        // Script for Slider

        wp_enqueue_script('jquery-match-height', get_template_directory_uri() . '/assets/vendor/match-height/jquery.matchHeight-min.js', array('jquery'), '0.7.2', true);

        wp_enqueue_style('magazinenp-main-style', get_template_directory_uri() . '/assets/css/magazinenp.css');

        wp_enqueue_style('magazinenp-style', get_stylesheet_uri());

        wp_enqueue_script('magazinenp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }


        wp_enqueue_script('jquery-marquee', get_template_directory_uri() . '/assets/vendor/jquery.marquee/jquery.marquee.min.js', array('jquery'), false, true);

        wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/assets/vendor/sticky/jquery.sticky.js', array('jquery'), '1.0.4', true);

        wp_enqueue_script('magazinenp-scripts', get_template_directory_uri() . '/assets/js/magazinenp.js', array('jquery'), false, true);
    }


}

new MagazineNP_Assets();