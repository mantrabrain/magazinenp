<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MagazineNP
 */

$right_sidebar = magazinenp_page_sidebar('magazinenp_right_sidebar');

if (!is_active_sidebar($right_sidebar)) {
    return;
}
$enable_sidebar_sticky = (boolean)magazinenp_get_option('enable_sidebar_sticky');

$sidebar_inner_class = $enable_sidebar_sticky ? 'sticky-sidebar' : 'no-sticky-sidebar';

?>

<aside id="secondary" class="col-lg-4 widget-area" role="complementary">
    <div class="<?php echo esc_attr($sidebar_inner_class); ?>>">
        <?php dynamic_sidebar($right_sidebar); ?>
    </div>
</aside>
