<?php


class MagazineNP_Widgets
{
    public function __construct()
    {
        $this->includes();
        add_action('widgets_init', array($this, 'register_sidebar'));
        add_action('widgets_init', array($this, 'init_widgets'));


    }

    public function register_sidebar()
    {
        register_sidebar(array(
            'name' => __('Right Sidebar', 'magazinenp'),
            'id' => 'magazinenp_right_sidebar',
            'description' => __('Shows widgets at Right Side.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));

        // Registering Left Sidebar
        register_sidebar(array(
            'name' => __('Left Sidebar', 'magazinenp'),
            'id' => 'magazinenp_left_sidebar',
            'description' => __('Shows widgets at Left Side.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));

        // Registering Front Page Template Content Section
        register_sidebar(array(
            'name' => __('Home Page Content Area', 'magazinenp'),
            'id' => 'magazinenp_front_page_content_section',
            'description' => __('Shows widgets on Home Page Template Content Area.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h2 class="widget-title">',
            'after_title' => '</h2></div>',
        ));

        // Registering Front Page Template Sidebar Section
        register_sidebar(array(
            'name' => __('Home Page Sidebar Area', 'magazinenp'),
            'id' => 'magazinenp_front_page_sidebar_section',
            'description' => __('Shows widgets on Home Page Template Sidebar Area.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h2 class="widget-title">',
            'after_title' => '</h2></div>',
        ));

        // Registering Footer Sidebar 1
        register_sidebar(array(
            'name' => __('Footer Widget Area 1', 'magazinenp'),
            'id' => 'magazinenp_footer_sidebar_1',
            'description' => __('Shows widgets at Footer Widget Area 1.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));

        // Registering Footer Sidebar 2
        register_sidebar(array(
            'name' => __('Footer Widget Area 2', 'magazinenp'),
            'id' => 'magazinenp_footer_sidebar_2',
            'description' => __('Shows widgets at Footer Widgets area 2.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));

        // Registering Footer Sidebar 3
        register_sidebar(array(
            'name' => __('Footer Widget Area 3', 'magazinenp'),
            'id' => 'magazinenp_footer_sidebar_3',
            'description' => __('Shows widgets at Footer Widget Area 3.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));

        // Registering Footer Sidebar 4
        register_sidebar(array(
            'name' => __('Footer Widget Area 4', 'magazinenp'),
            'id' => 'magazinenp_footer_sidebar_4',
            'description' => __('Shows widgets at Footer Widget Area 4.', 'magazinenp'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<div class="widget-title-wrapper"><h3 class="widget-title">',
            'after_title' => '</h3></div>',
        ));
    }

    public function init_widgets()
    {

        // Latest news.
        register_widget('MagazineNP_Block_Post_Widget');
        register_widget('MagazineNP_Grid_Post_Widget');
        register_widget('MagazineNP_Column_Post_Widget');


    }

    public function includes()
    {

        require MAGAZINENP_THEME_DIR . '/core/widgets/class-magazinenp-widget-validation.php';

        require MAGAZINENP_THEME_DIR . '/core/widgets/class-magazinenp-widget-base.php';

        // Widgets

        require MAGAZINENP_THEME_DIR . '/core/widgets/magazinenp-block-post-widget.php';
        require MAGAZINENP_THEME_DIR . '/core/widgets/magazinenp-grid-post-widget.php';
        require MAGAZINENP_THEME_DIR . '/core/widgets/magazinenp-column-post-widget.php';


    }

}

new MagazineNP_Widgets();
